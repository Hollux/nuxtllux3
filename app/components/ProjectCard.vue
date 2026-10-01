<script setup lang="ts">
export interface Project {
  title: string
  img: string
  /** Lien vers le projet ; absent si le site n'est plus en ligne. */
  url?: string
  /** Technos affichées en étiquette en bas de carte. */
  stack?: string
}

defineProps<Project>()
</script>

<template>
  <article class="project-card">
    <a v-if="url" :href="url" target="_blank" rel="noopener" :aria-label="`${title} (nouvel onglet)`">
      <NuxtImg format="webp" :src="img" alt="" width="400" sizes="sm:100vw md:50vw lg:400px" loading="lazy" />
    </a>
    <NuxtImg format="webp" v-else :src="img" :alt="title" width="400" sizes="sm:100vw md:50vw lg:400px" loading="lazy" />
    <div class="project-body">
      <h3>{{ title }}</h3>
      <slot />
      <div v-if="stack" class="project-foot"><span class="tag">{{ stack }}</span></div>
    </div>
  </article>
</template>

<style scoped>
.project-card {
  display: flex;
  flex-direction: column;
  text-align: left;
  border: 1px solid var(--c-ink);
  box-shadow: 6px 6px 0 var(--c-shadow);
  transition: transform 0.15s, box-shadow 0.15s;
}

.project-card:hover {
  transform: translate(-2px, -2px);
  box-shadow: 8px 8px 0 var(--c-shadow);
}

img {
  display: block;
  width: 100%;
  aspect-ratio: 4 / 3;
  object-fit: cover;
  object-position: top;
  border-bottom: 1px solid var(--c-ink);
}

.project-body {
  display: flex;
  flex-direction: column;
  flex: 1;
  padding: 16px 20px 20px;
}

.project-body h3 {
  margin: 0 0 8px;
}

.project-body :deep(p) {
  font-size: 0.9rem;
}

.project-body :deep(p:last-of-type) {
  margin-bottom: 0;
}

.project-foot {
  margin: auto 0 0;
  padding-top: 1rem;
}

.tag {
  padding: 2px 8px;
  background: var(--c-ink);
  color: var(--c-on-ink);
  font-size: 0.75rem;
}

@media (prefers-reduced-motion: reduce) {
  .project-card {
    transition: none;
  }
}
</style>
