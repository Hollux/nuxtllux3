<script setup lang="ts">
export interface Project {
  title: string
  img: string
  /** Lien vers le projet ; absent si le site n'est plus en ligne. */
  url?: string
}

defineProps<Project>()
</script>

<template>
  <article class="project-card">
    <a v-if="url" :href="url" target="_blank" rel="noopener" :aria-label="`${title} (nouvel onglet)`">
      <NuxtImg format="webp" :src="img" :alt="title" width="400" sizes="sm:100vw md:50vw lg:400px" loading="lazy" />
    </a>
    <NuxtImg format="webp" v-else :src="img" :alt="title" width="400" sizes="sm:100vw md:50vw lg:400px" loading="lazy" />
    <h3>{{ title }}</h3>
    <div class="project-text">
      <slot />
    </div>
  </article>
</template>

<style scoped>
img {
  display: block;
  width: 100%;
  aspect-ratio: 4 / 3;
  object-fit: cover;
  object-position: top;
}
</style>
