// Effet « traduction machine » du mode sombre : les textes visibles s'affichent en glyphes
// aléatoires, puis chaque lettre est traduite une à une, de gauche à droite.
// Glyphes ASCII uniquement : même chasse que Courier Prime, le texte ne saute pas.
const GLYPHS = '0123456789ABCDEF#$%&*+<>=/\\|{}[]:;~^'

const glyph = () => GLYPHS[(Math.random() * GLYPHS.length) | 0]
const noise = (chars: string[]) => chars.map((c) => (/\s/.test(c) ? c : glyph()))

interface Item {
  node: Text
  chars: string[]
  noise: string[]
  /** Début de la traduction (ms), puis durée accordée à chaque lettre. */
  start: number
  perChar: number
  /** Dernière valeur écrite : si Vue a modifié le nœud entre-temps, on le laisse tranquille. */
  last: string
}

// Avant de traduire, une ligne reste brièvement illisible
const HOLD = 180
// Rythme de renouvellement des glyphes
const TICK = 45

/** Lance l'effet sur les textes visibles de `root` ; renvoie une fonction qui l'annule. */
export function decodeText(root: Element, duration = 1600): () => void {
  const vh = window.innerHeight
  const items: Item[] = []
  const range = document.createRange()
  const walker = document.createTreeWalker(root, NodeFilter.SHOW_TEXT, {
    acceptNode: (n) => {
      const parent = n.parentElement
      if (!(n as Text).data.trim() || !parent || parent.closest('script, style, noscript, [data-no-decode]'))
        return NodeFilter.FILTER_REJECT
      return NodeFilter.FILTER_ACCEPT
    },
  })

  for (let node = walker.nextNode() as Text | null; node; node = walker.nextNode() as Text | null) {
    range.selectNodeContents(node)
    const r = range.getBoundingClientRect()
    // Seul ce qui est à l'écran vaut la peine d'être animé
    if (!r.width || r.bottom < 0 || r.top > vh) continue
    const chars = Array.from(node.data)
    // Balayage de haut en bas, avec un peu de désordre
    const start = Math.max(0, r.top / vh) * duration * 0.3 + Math.random() * 120
    items.push({
      node,
      chars,
      noise: noise(chars),
      start,
      perChar: Math.min(28, (duration - start - HOLD) / chars.length),
      last: '',
    })
  }

  if (!items.length) return () => {}

  const t0 = performance.now()
  let lastTick = t0
  let frame = 0
  let active = items

  const render = (now: number) => {
    const t = now - t0
    const tick = now - lastTick >= TICK
    if (tick) lastTick = now

    active = active.filter((item) => {
      const { node } = item
      if (!node.isConnected || (item.last && node.data !== item.last)) return false
      const done = Math.floor((t - item.start - HOLD) / item.perChar) + 1
      if (done >= item.chars.length) {
        node.data = item.chars.join('')
        return false
      }
      if (tick) item.noise = noise(item.chars)
      const k = Math.max(0, done)
      const text = item.chars.slice(0, k).join('') + item.noise.slice(k).join('')
      if (text !== node.data) node.data = text
      item.last = node.data
      return true
    })

    if (active.length) frame = requestAnimationFrame(render)
    else root.removeAttribute('aria-busy')
  }

  root.setAttribute('aria-busy', 'true')
  // Premier rendu immédiat : le texte en clair n'est jamais peint
  render(t0)

  return () => {
    cancelAnimationFrame(frame)
    for (const item of active) if (item.node.data === item.last) item.node.data = item.chars.join('')
    active = []
    root.removeAttribute('aria-busy')
  }
}
