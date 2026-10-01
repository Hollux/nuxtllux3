<script setup lang="ts">
import type { Tool } from '~/components/ToolGrid.vue'

useSeoMeta({
  title: 'Compétences',
  description: 'Langages, frameworks, outils, systèmes et CMS utilisés par Hollux pour le développement web.',
})

const img = (file: string) => `/img/competences/${file}`

const groups: { title: string; tools: Tool[] }[] = [
  {
    title: 'Langages',
    tools: [
      { img: img('html5.png'), title: 'HTML' },
      { img: img('css3.png'), title: 'CSS' },
      { img: img('php.png'), title: 'PHP' },
      { img: img('js.png'), title: 'JavaScript' },
      { img: img('sql.jpeg'), title: 'SQL' },
      { img: img('less.png'), title: 'Less' },
    ],
  },
  {
    title: 'Frameworks',
    tools: [
      { img: img('vuejs.png'), title: 'Vue.js' },
      { img: img('symfony.png'), title: 'Symfony' },
      { img: img('bootstrap.jpg'), title: 'Bootstrap' },
      { img: img('laravel.png'), title: 'Laravel' },
      { img: img('react.svg'), title: 'React' },
      { img: img('jquery.png'), title: 'jQuery' },
    ],
  },
  {
    title: 'Autres outils de développement',
    tools: [
      { img: img('docker.png'), title: 'Docker' },
      { img: img('github.png'), title: 'GitHub' },
      { img: img('mySQL.png'), title: 'MySQL' },
      { img: img('githubcopilot.png'), title: 'GitHub Copilot' },
      { img: img('mammouthai.png'), title: 'Mammouth AI' },
      { img: img('apache.jpg'), title: 'Apache' },
      { img: img('xampp.png'), title: 'XAMPP' },
      { img: img('easyphp.png'), title: 'EasyPHP' },
      { img: img('filezilla.png'), title: 'FileZilla' },
      { img: img('ovh.png'), title: 'OVH' },
    ],
  },
  {
    title: "Systèmes d'exploitation",
    tools: [
      { img: img('linux.png'), title: 'Linux' },
      { img: img('apple.png'), title: 'macOS' },
      { img: img('windows.png'), title: 'Windows' },
    ],
  },
  {
    title: 'CMS',
    tools: [
      { img: img('wp.png'), title: 'WordPress' },
      { img: img('prestashop.png'), title: 'PrestaShop' },
    ],
  },
]
</script>

<template>
  <div>
    <div class="container">
      <h1>Compétences : langages et outils utilisés pour le développement web</h1>
    </div>
    <template v-for="(group, i) in groups" :key="group.title">
      <div v-if="i > 0" class="trait" />
      <ToolGrid :title="group.title" :tools="group.tools" />
    </template>
  </div>
</template>
