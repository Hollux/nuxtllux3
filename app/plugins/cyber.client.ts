// Mode sombre « cyberpunk » : décodage des textes à chaque page et glitchs de temps à autre.
// Le thème est posé sur <html data-theme> par un script en tête de page (nuxt.config) avant
// le premier rendu, pour éviter tout flash du thème clair.
export type Theme = 'light' | 'dark'

const STORAGE_KEY = 'theme'
// Éléments susceptibles de glitcher
const GLITCH_TARGETS = 'h1, h2, h3, img, .tag, nav a, .button-trait a'

export default defineNuxtPlugin((nuxtApp) => {
  const html = document.documentElement
  const theme = useState<Theme>('theme', () => 'light')
  // Séquence d'activation en cours (terminal de DarkBoot.vue)
  const booting = useState('themeBoot', () => false)
  const reduced = window.matchMedia('(prefers-reduced-motion: reduce)')
  const animated = () => html.dataset.theme === 'dark' && !reduced.matches

  let cancelDecode = () => {}
  let glitchTimer: ReturnType<typeof setTimeout> | undefined

  function decode(root: Element | null) {
    cancelDecode()
    cancelDecode = () => {}
    if (root && animated()) cancelDecode = decodeText(root)
    html.classList.remove('cp-boot')
  }

  function pulse(el: Element, className: string, ms: number) {
    el.classList.add(className)
    setTimeout(() => el.classList.remove(className), ms)
  }

  // Bande de distorsion qui traverse l'écran
  function screenGlitch() {
    html.style.setProperty('--cp-bar-top', `${Math.round(Math.random() * 80)}vh`)
    pulse(html, 'cp-screen-glitch', 260)
  }

  function glitchSomething() {
    if (document.hidden || !animated()) return
    if (Math.random() < 0.25) return screenGlitch()
    const visible = [...document.querySelectorAll(GLITCH_TARGETS)].filter((el) => {
      const r = el.getBoundingClientRect()
      return r.width && r.bottom > 0 && r.top < window.innerHeight
    })
    const el = visible[(Math.random() * visible.length) | 0]
    if (el) pulse(el, el.tagName === 'IMG' ? 'cp-glitch-img' : 'cp-glitch', 400)
  }

  function scheduleGlitch() {
    clearTimeout(glitchTimer)
    if (!animated()) return
    glitchTimer = setTimeout(() => {
      glitchSomething()
      scheduleGlitch()
    }, 2500 + Math.random() * 4500)
  }

  function applyTheme(value: Theme) {
    theme.value = value
    try {
      localStorage.setItem(STORAGE_KEY, value)
    } catch {}
    if (value === 'dark') {
      html.dataset.theme = 'dark'
      if (animated()) screenGlitch()
      decode(document.querySelector('.layout'))
    } else {
      cancelDecode()
      delete html.dataset.theme
    }
    scheduleGlitch()
  }

  // Passage en sombre : d'abord la séquence du terminal, qui appelle applyTheme à la fin
  function setTheme(value: Theme) {
    if (booting.value) return
    if (value === 'dark' && !reduced.matches) booting.value = true
    else applyTheme(value)
  }

  // Thème posé par le script de tête ; l'état n'est synchronisé qu'une fois toute la page
  // hydratée (le HTML pré-rendu porte toujours le bouton du thème clair)
  nuxtApp.hook('app:suspense:resolve', () => {
    theme.value = html.dataset.theme === 'dark' ? 'dark' : 'light'
    scheduleGlitch()
  })

  let firstPage = true
  nuxtApp.hook('page:finish', () => {
    // Une frame plus tard : le routeur a remis la page en haut, on sait ce qui est visible
    requestAnimationFrame(() => {
      decode(document.querySelector(firstPage ? '.layout' : '.content'))
      firstPage = false
    })
  })

  return { provide: { setTheme, applyTheme } }
})
