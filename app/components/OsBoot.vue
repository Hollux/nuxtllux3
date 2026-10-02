<script setup lang="ts">
// Console de démarrage, à l'ouverture du site en mode sombre : la page reste masquée, une grande
// console tape « chargement du hollux/os », remplit sa barre et fait défiler des lignes
// d'installation, puis se retire et la page se décode. 3 s au total ; Échap passe à la fin.
// Lancée seulement si le script de tête a posé html.os-boot (thème sombre, animations permises).
const COMMAND = 'chargement du hollux/os'
const TYPE_MS = 300
const LOAD_MS = 2400
// Lignes gardées à l'écran : les plus anciennes sortent par le haut
const MAX_LINES = 80

const { $endIntro } = useNuxtApp()

const open = ref(false)
const typed = ref('')
const step = ref<'type' | 'load' | 'done'>('type')
const progress = ref(0)
const lines = shallowRef<string[]>([])

let run = 0
let frame = 0
const wait = (ms: number) => new Promise((resolve) => setTimeout(resolve, ms))

// Générateur de lignes façon installation de système
const pick = <T,>(list: T[]) => list[(Math.random() * list.length) | 0]!
const hex = (n: number) => Array.from({ length: n }, () => ((Math.random() * 16) | 0).toString(16)).join('')
const num = (max: number) => (Math.random() * max) | 0
const version = () => `${num(9)}.${num(20)}.${num(30)}`
const PACKAGES = ['nuxt', 'vue', 'symfony', 'react', 'doctrine', 'vite', 'nitro', 'twig', 'composer', 'pinia', 'webpack', 'node', 'php', 'mysql', 'redis', 'nginx', 'docker', 'typescript', 'sass', 'phpunit']
const SERVICES = ['network', 'display', 'neon-shader', 'glitch-daemon', 'cyberdeck', 'netrunner', 'portfolio', 'decoder', 'firewall', 'synthwave', 'cv-index', 'skills-db']
const DIRS = ['/sys/core', '/usr/lib/hollux', '/var/cache/neon', '/opt/realisations', '/etc/hollux.d', '/home/hollux/projets']
const PATTERNS: (() => string)[] = [
  () => `[  OK  ] Started ${pick(SERVICES)}.service`,
  () => `[  OK  ] Mounted ${pick(DIRS)}`,
  () => `installing ${pick(PACKAGES)}@${version()} ... done`,
  () => `fetch registry.hollux.os/${pick(PACKAGES)}-${version()}.tgz  ${num(9000) + 12} KB`,
  () => `unpacking ${pick(PACKAGES)} (${version()}) ...`,
  () => `compiling ${pick(PACKAGES)}/${hex(6)}.o -> 0x${hex(8)}`,
  () => `loading kernel module ${pick(SERVICES).replace('-', '_')}.ko`,
  () => `checksum ${hex(32)} OK`,
  () => `linking ${pick(DIRS)}/${pick(PACKAGES)}.so`,
  () => `[ ${(Math.random() * 4).toFixed(6)} ] ${pick(SERVICES)}: init 0x${hex(4)} ready`,
  () => `resolving dependencies: ${num(400) + 3} packages`,
  () => `writing sector 0x${hex(6)} ... ${num(100)}%`,
]

function newLines(count: number) {
  const added = Array.from({ length: count }, () => pick(PATTERNS)())
  lines.value = [...lines.value, ...added].slice(-MAX_LINES)
}

async function finish(id: number) {
  if (id !== run) return
  run++
  cancelAnimationFrame(frame)
  open.value = false
  // Laisse la console disparaître avant de révéler la page
  await wait(300)
  $endIntro()
}

/** Barre et défilement synchronisés sur le temps écoulé, à chaque frame. */
function load(id: number) {
  return new Promise<void>((resolve) => {
    const start = performance.now()
    const tick = (now: number) => {
      if (id !== run) return resolve()
      const ratio = Math.min(1, (now - start) / LOAD_MS)
      // Progression par à-coups, sans jamais reculer
      if (Math.random() < 0.35) progress.value = Math.max(progress.value, Math.floor(ratio * 100 - Math.random() * 6))
      newLines(1 + num(4))
      if (ratio < 1) frame = requestAnimationFrame(tick)
      else {
        progress.value = 100
        resolve()
      }
    }
    frame = requestAnimationFrame(tick)
  })
}

async function start() {
  const id = ++run
  open.value = true

  const key = TYPE_MS / COMMAND.length
  for (const char of COMMAND) {
    if (id !== run) return
    typed.value += char
    await wait(key)
  }
  if (id !== run) return

  step.value = 'load'
  await load(id)
  if (id !== run) return

  step.value = 'done'
  newLines(1)
  await wait(300)
  finish(id)
}

function onKey(e: KeyboardEvent) {
  if (e.key === 'Escape' && open.value) finish(run)
}

onMounted(() => {
  if (!document.documentElement.classList.contains('os-boot')) return
  window.addEventListener('keydown', onKey)
  start()
})
onBeforeUnmount(() => {
  run++
  cancelAnimationFrame(frame)
  window.removeEventListener('keydown', onKey)
})
</script>

<template>
  <Transition name="os">
    <div v-if="open" class="os" role="status" data-no-decode>
      <span class="visually-hidden">Chargement du site…</span>
      <div class="os-bar" aria-hidden="true">
        <span>HOLLUX/OS</span>
        <span>SESSION 01 · ÉCHAP POUR PASSER</span>
      </div>
      <div class="os-screen" aria-hidden="true">
        <p class="command">
          <span class="dim">===&gt;</span> {{ typed }}<i v-if="step === 'type'" class="cursor" />
        </p>
        <div v-if="step !== 'type'" class="progress">
          <div class="track"><div class="fill" :style="{ width: `${progress}%` }" /></div>
          <span>{{ String(progress).padStart(3, ' ') }} %</span>
        </div>
        <div class="log">
          <div>
            <p v-for="(line, i) in lines" :key="i">{{ line }}</p>
            <p v-if="step === 'done'" class="ok">OK. hollux/os prêt.<i class="cursor" /></p>
          </div>
        </div>
      </div>
    </div>
  </Transition>
</template>

<style scoped>
/* Vert sur noir, comme la console du passage au mode sombre (DarkBoot.vue) */
.os {
  --green: #33ff66;
  position: fixed;
  top: 50%;
  left: 50%;
  z-index: 300;
  display: flex;
  flex-direction: column;
  width: min(960px, calc(100% - 32px));
  height: min(720px, calc(100vh - 32px));
  height: min(720px, calc(100dvh - 32px));
  transform: translate(-50%, -50%);
  color: var(--green);
  background: #020403;
  border: 1px solid var(--green);
  box-shadow:
    0 0 0 1px #000,
    0 0 40px rgb(51 255 102 / 0.25),
    10px 10px 0 #000;
  font-family: var(--f-body);
  font-size: 0.95rem;
  text-shadow: 0 0 6px rgb(51 255 102 / 0.6);
}

/* Lignes de balayage du vieux moniteur */
.os::after {
  content: '';
  position: absolute;
  inset: 0;
  pointer-events: none;
  background: repeating-linear-gradient(to bottom, transparent 0 2px, rgb(0 0 0 / 0.35) 2px 3px);
}

.os-bar {
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

.os-screen {
  display: flex;
  flex: 1;
  flex-direction: column;
  min-height: 0;
  padding: 18px 20px 20px;
}

.os-screen p {
  margin: 0;
  font-size: inherit;
  white-space: pre;
}

.os-screen .command {
  margin-bottom: 12px;
  font-size: 1.15rem;
  font-weight: 700;
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
  margin-bottom: 14px;
}

.track {
  flex: 1;
  height: 16px;
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

/* Défilement : les nouvelles lignes arrivent en bas, les anciennes sortent par le haut */
.log {
  display: flex;
  flex: 1;
  flex-direction: column;
  justify-content: flex-end;
  min-height: 0;
  overflow: hidden;
  font-size: 0.78rem;
  line-height: 1.35;
  opacity: 0.85;
  mask-image: linear-gradient(to bottom, transparent, #000 25%);
}

.log p {
  overflow: hidden;
  text-overflow: ellipsis;
}

.log .ok {
  font-size: 0.95rem;
  font-weight: 700;
  opacity: 1;
}

.os-enter-active,
.os-leave-active {
  transition: opacity 0.3s, transform 0.3s;
}

.os-enter-from,
.os-leave-to {
  opacity: 0;
  transform: translate(-50%, -50%) scale(0.97);
}

@media (max-width: 575px) {
  .os {
    font-size: 0.85rem;
  }

  .os-screen .command {
    font-size: 1rem;
  }

  .log {
    font-size: 0.7rem;
  }

  .os-bar span:last-child {
    display: none;
  }
}
</style>
