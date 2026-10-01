<script setup lang="ts">
const props = defineProps<{
  to: string
  label: string
}>()

const external = computed(() => /^https?:\/\//.test(props.to))
</script>

<template>
  <div class="button-trait">
    <a v-if="external" :href="to" target="_blank" rel="noopener">{{ label }}</a>
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
  color: #fff;
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
  background: #333;
}

@media (max-width: 575px) {
  a {
    margin: 5px 12px;
    padding: 11px 18px;
  }
}
</style>
