<script setup lang="ts">
export interface Tool {
  img: string
  title: string
}

defineProps<{
  title: string
  tools: Tool[]
}>()
</script>

<template>
  <section class="container tool-grid">
    <h2>{{ title }}</h2>
    <ul>
      <li v-for="tool in tools" :key="tool.title">
        <NuxtImg :format="tool.img.endsWith('.svg') ? undefined : 'webp'" :src="tool.img" :alt="tool.title" height="90" densities="x1 x2" loading="lazy" />
        <span>{{ tool.title }}</span>
      </li>
    </ul>
  </section>
</template>

<style scoped>
ul {
  display: grid;
  grid-template-columns: repeat(auto-fit, minmax(110px, 150px));
  justify-content: center;
  gap: 20px 30px;
  list-style: none;
  margin: 0 0 1rem;
  padding: 0;
  text-align: center;
}

li {
  display: flex;
  flex-direction: column;
  align-items: center;
  justify-content: flex-end;
}

img {
  width: auto;
  max-width: 100%;
  height: 90px;
  object-fit: contain;
  margin-bottom: 15px;
}
</style>
