<script setup lang="ts">
const route = useRoute()
const { siteUrl } = useRuntimeConfig().public
const url = computed(() => siteUrl + route.path)

useHead({
  titleTemplate: (title?: string) => (title ? `${title} · Hollux` : 'Hollux, développeur web fullstack en Alsace'),
  link: [{ rel: 'canonical', href: url }],
})
useSeoMeta({ ogUrl: url, ogImage: `${siteUrl}/icon.png`, twitterImage: `${siteUrl}/icon.png` })
</script>

<template>
  <NuxtLayout>
    <NuxtPage />
  </NuxtLayout>
  <OsBoot />
</template>
