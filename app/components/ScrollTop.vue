<script setup lang="ts">
const visible = ref(false)

const update = () => (visible.value = window.scrollY > 400)

let frame = 0

// easeInOutCubic : départ et arrivée en douceur
const ease = (t: number) => (t < 0.5 ? 4 * t * t * t : 1 - (-2 * t + 2) ** 3 / 2)

function stop() {
  cancelAnimationFrame(frame)
  frame = 0
  window.removeEventListener('wheel', stop)
  window.removeEventListener('touchstart', stop)
  window.removeEventListener('keydown', stop)
}

function toTop() {
  stop()
  const start = window.scrollY
  if (start <= 0) return
  // Durée proportionnelle à la distance, bornée entre 700 et 1400 ms
  const duration = Math.min(1400, Math.max(700, start * 0.4))
  const t0 = performance.now()

  // Toute action de l'utilisateur interrompt l'animation
  window.addEventListener('wheel', stop, { passive: true })
  window.addEventListener('touchstart', stop, { passive: true })
  window.addEventListener('keydown', stop)

  const step = (now: number) => {
    const p = Math.min(1, (now - t0) / duration)
    window.scrollTo(0, start * (1 - ease(p)))
    if (p < 1) frame = requestAnimationFrame(step)
    else stop()
  }
  frame = requestAnimationFrame(step)
}

onMounted(() => {
  update()
  window.addEventListener('scroll', update, { passive: true })
})
onBeforeUnmount(() => {
  stop()
  window.removeEventListener('scroll', update)
})
</script>

<template>
  <button
    type="button"
    class="scroll-top"
    :class="{ visible }"
    :tabindex="visible ? 0 : -1"
    :aria-hidden="!visible"
    aria-label="Revenir en haut de la page"
    @click="toTop"
  >
    <span aria-hidden="true" />
  </button>
</template>

<style scoped>
.scroll-top {
  position: fixed;
  right: 32px;
  bottom: 32px;
  z-index: 20;
  display: grid;
  place-items: center;
  width: 46px;
  height: 46px;
  padding: 0;
  background: var(--c-ink);
  border: 1px solid var(--c-on-ink);
  cursor: pointer;
  opacity: 0;
  visibility: hidden;
  transform: translateY(10px);
  transition: opacity 0.3s, transform 0.3s, visibility 0.3s, background 0.2s, box-shadow 0.3s;
}

.scroll-top.visible {
  opacity: 1;
  visibility: visible;
  transform: none;
}

.scroll-top.visible:hover {
  background: var(--c-ink-hover);
  transform: translate(-2px, -2px);
  box-shadow: 4px 4px 0 var(--c-muted);
}

/* Flèche simple : chevron vers le haut */
.scroll-top span {
  width: 12px;
  height: 12px;
  margin-top: 5px;
  border-top: 2px solid var(--c-on-ink);
  border-left: 2px solid var(--c-on-ink);
  transform: rotate(45deg);
}

/* Au survol, la flèche s'élance vers le haut en boucle */
.scroll-top:hover span,
.scroll-top:focus-visible span {
  animation: nudge 0.9s ease-in-out infinite;
}

@keyframes nudge {
  0%,
  100% {
    transform: translateY(0) rotate(45deg);
  }
  45% {
    transform: translateY(-5px) rotate(45deg);
  }
  60% {
    transform: translateY(-3px) rotate(45deg);
  }
}

@media (max-width: 575px) {
  .scroll-top {
    right: 18px;
    bottom: 18px;
  }
}

@media (prefers-reduced-motion: reduce) {
  .scroll-top {
    transition: none;
  }

  .scroll-top:hover span,
  .scroll-top:focus-visible span {
    animation: none;
  }
}

@media print {
  .scroll-top {
    display: none;
  }
}
</style>
