<script setup lang="ts">
// Séquence d'activation du mode sombre : un terminal descend en haut de l'écran, on y voit
// taper la commande, une barre de chargement se remplit, puis le terminal se retire et le
// thème sombre s'applique. Environ 6,7 s au total ; Échap passe directement à la fin.
const COMMAND = 'dark mode on'
const TYPE_MS = 1400
const LOAD_MS = 3200

const booting = useState('themeBoot', () => false)
const { $applyTheme } = useNuxtApp()

const open = ref(false)
const typed = ref('')
const step = ref<'type' | 'load' | 'done'>('type')
const progress = ref(0)

// Chaque lancement a son numéro : une séquence interrompue s'arrête d'elle-même
let run = 0
const wait = (ms: number) => new Promise((resolve) => setTimeout(resolve, ms))

/** Délais irréguliers dont la somme fait exactement `total` : rythme vivant, durée maîtrisée. */
function rhythm(count: number, total: number, weight: () => number) {
  const weights = Array.from({ length: count }, weight)
  const sum = weights.reduce((a, b) => a + b, 0)
  return weights.map((w) => (w / sum) * total)
}

async function finish(id: number) {
  if (id !== run) return
  run++
  open.value = false
  // Laisse le terminal disparaître avant de basculer le site
  await wait(350)
  $applyTheme('dark')
  booting.value = false
}

async function start() {
  const id = ++run
  typed.value = ''
  progress.value = 0
  step.value = 'type'
  open.value = true

  await wait(600)
  // Frappe humaine : rythme irrégulier
  const keys = rhythm(COMMAND.length, TYPE_MS, () => 0.6 + Math.random())
  for (const [i, char] of [...COMMAND].entries()) {
    if (id !== run) return
    typed.value += char
    await wait(keys[i]!)
  }
  await wait(400)
  if (id !== run) return

  step.value = 'load'
  // Progression par à-coups, avec de rares temps morts
  const levels: number[] = []
  for (let p = 0; p < 100; ) levels.push((p = Math.min(100, p + 1 + Math.floor(Math.random() * 7))))
  const pauses = rhythm(levels.length, LOAD_MS, () => (Math.random() < 0.08 ? 4 : 0.5 + Math.random()))
  for (const [i, level] of levels.entries()) {
    await wait(pauses[i]!)
    if (id !== run) return
    progress.value = level
  }

  step.value = 'done'
  await wait(700)
  finish(id)
}

function onKey(e: KeyboardEvent) {
  if (e.key === 'Escape' && booting.value) finish(run)
}

watch(booting, (value) => value && start())

onMounted(() => window.addEventListener('keydown', onKey))
onBeforeUnmount(() => {
  run++
  window.removeEventListener('keydown', onKey)
})
</script>

<template>
  <Transition name="boot">
    <div v-if="open" class="boot" role="status" data-no-decode>
      <span class="visually-hidden">Activation du mode sombre…</span>
      <div class="boot-bar" aria-hidden="true">
        <span>HOLLUX/OS</span>
        <span>SESSION 01 · ÉCHAP POUR PASSER</span>
      </div>
      <div class="boot-screen" aria-hidden="true">
        <p>
          <span class="dim">===&gt;</span> {{ typed }}<i v-if="step === 'type'" class="cursor" />
        </p>
        <template v-if="step !== 'type'">
          <p class="dim">Chargement du module…</p>
          <div class="progress">
            <div class="track"><div class="fill" :style="{ width: `${progress}%` }" /></div>
            <span>{{ String(progress).padStart(3, ' ') }} %</span>
          </div>
        </template>
        <p v-if="step === 'done'">OK. Mode sombre activé.<i class="cursor" /></p>
      </div>
    </div>
  </Transition>
</template>

<style scoped>
/* Toujours vert sur noir, quel que soit le thème */
.boot {
  --green: #33ff66;
  position: fixed;
  top: 16px;
  left: 50%;
  z-index: 200;
  width: min(560px, calc(100% - 32px));
  transform: translateX(-50%);
  color: var(--green);
  background: #020403;
  border: 1px solid var(--green);
  box-shadow:
    0 0 0 1px #000,
    0 0 30px rgb(51 255 102 / 0.25),
    8px 8px 0 #000;
  font-family: var(--f-body);
  font-size: 0.95rem;
  text-shadow: 0 0 6px rgb(51 255 102 / 0.6);
}

/* Lignes de balayage du vieux moniteur */
.boot::after {
  content: '';
  position: absolute;
  inset: 0;
  pointer-events: none;
  background: repeating-linear-gradient(to bottom, transparent 0 2px, rgb(0 0 0 / 0.35) 2px 3px);
}

.boot-bar {
  display: flex;
  justify-content: space-between;
  gap: 12px;
  padding: 4px 12px;
  color: #020403;
  background: var(--green);
  font-size: 0.7rem;
  font-weight: 700;
  text-shadow: none;
}

.boot-screen {
  min-height: 132px;
  padding: 16px 18px 18px;
}

.boot-screen p {
  margin: 0 0 8px;
  font-size: inherit;
  white-space: pre;
}

.dim {
  opacity: 0.6;
}

.cursor {
  display: inline-block;
  width: 0.6em;
  height: 1.05em;
  margin-left: 2px;
  vertical-align: text-bottom;
  background: var(--green);
  animation: cursor 0.9s steps(1) infinite;
}

@keyframes cursor {
  50% {
    opacity: 0;
  }
}

.progress {
  display: flex;
  align-items: center;
  gap: 12px;
  margin-bottom: 8px;
}

.track {
  flex: 1;
  height: 14px;
  padding: 2px;
  border: 1px solid var(--green);
}

/* Barre en segments, façon terminal */
.fill {
  height: 100%;
  background: repeating-linear-gradient(90deg, var(--green) 0 8px, transparent 8px 10px);
  box-shadow: 0 0 8px rgb(51 255 102 / 0.5);
}

.progress span {
  white-space: pre;
}

.boot-enter-active,
.boot-leave-active {
  transition: opacity 0.3s, transform 0.3s;
}

.boot-enter-from,
.boot-leave-to {
  opacity: 0;
  transform: translate(-50%, -24px);
}

@media (max-width: 575px) {
  .boot {
    font-size: 0.85rem;
  }

  .boot-bar span:last-child {
    display: none;
  }
}
</style>
