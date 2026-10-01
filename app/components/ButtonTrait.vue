<script setup lang="ts">
const props = defineProps<{
  to: string
  label: string
  /** Nom du fichier proposé : le lien télécharge le fichier au lieu de l'ouvrir. */
  download?: string
}>()

const external = computed(() => /^https?:\/\//.test(props.to))
const mail = computed(() => props.to.startsWith('mailto:'))
</script>

<template>
  <div class="button-trait">
    <a v-if="download" :href="to" :download="download">{{ label }}</a>
    <a v-else-if="mail" :href="to">{{ label }}</a>
    <a v-else-if="external" :href="to" target="_blank" rel="noopener">{{ label }}</a>
    <NuxtLink v-else :to="to">{{ label }}</NuxtLink>
  </div>
</template>

<style scoped>
.button-trait {
  display: flex;
  align-items: center;
  margin: 35px 0;
}

.button-trait::before,
.button-trait::after {
  content: '';
  flex: 1;
  border-top: 1px solid var(--c-ink);
}

a {
  margin: 5px 45px;
  padding: 11px 35px;
  color: var(--c-on-ink);
  background: var(--c-ink);
  font-family: var(--f-title);
  font-size: 0.85rem;
  font-style: normal;
  font-weight: 700;
  text-align: center;
  text-decoration: none;
  text-transform: uppercase;
}

a:hover {
  background: var(--c-ink-hover);
}

@media (max-width: 575px) {
  a {
    margin: 5px 12px;
    padding: 11px 18px;
  }
}
</style>
