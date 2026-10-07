<script setup lang="ts">
const links = [
  { to: '/', label: 'Accueil' },
  { to: '/competences', label: 'Compétences' },
  { to: '/realisations', label: 'Réalisations' },
  { to: '/cv', label: 'CV' },
  { to: '/ensavoirplus', label: 'En savoir plus' },
]

const theme = useState<'light' | 'dark'>('theme', () => 'dark')
const { $setTheme } = useNuxtApp()
const booting = useState('themeBoot', () => false)
const dark = computed(() => theme.value === 'dark')
</script>

<template>
  <header class="site-header">
    <button type="button" class="theme-toggle" :aria-pressed="dark" :disabled="booting" @click="$setTheme(dark ? 'light' : 'dark')">
      <span aria-hidden="true" />{{ dark ? 'light mode' : 'dark mode' }}
    </button>
    <NuxtLink to="/" class="logo" aria-label="Hollux, retour à l'accueil">
      <NuxtImg format="webp" src="/img/base/logo.png" alt="Logo Hollux" width="85" height="80" />
    </NuxtLink>
    <nav aria-label="Navigation principale">
      <ul>
        <li v-for="link in links" :key="link.to">
          <NuxtLink :to="link.to">{{ link.label }}</NuxtLink>
        </li>
      </ul>
    </nav>
  </header>
</template>

<style scoped>
.site-header {
  position: relative;
  margin-bottom: 50px;
  text-align: center;
}

/* Bascule de thème, en haut à droite */
.theme-toggle {
  position: absolute;
  top: 14px;
  right: var(--gutter);
  display: flex;
  align-items: center;
  gap: 8px;
  padding: 6px 12px;
  color: var(--c-ink);
  background: none;
  border: 1px solid currentColor;
  font-family: var(--f-body);
  font-size: 0.95rem;
  font-weight: 700;
  cursor: pointer;
  transition: color 0.2s, border-color 0.2s, box-shadow 0.2s;
}

.theme-toggle:disabled {
  cursor: wait;
}

.theme-toggle:hover {
  color: var(--c-ink-hover);
  border-color: currentColor;
}

.theme-toggle span {
  width: 12px;
  height: 12px;
  border: 1px solid currentColor;
  background: linear-gradient(90deg, currentColor 50%, transparent 50%);
}

.logo {
  display: inline-block;
  margin: 55px 0 45px;
}

.logo img {
  display: block;
  width: 85px;
  height: auto;
}

nav ul {
  display: flex;
  flex-wrap: wrap;
  justify-content: center;
  list-style: none;
  margin: 0;
  padding: 0;
  border-bottom: 1px solid var(--c-line);
}

nav li {
  margin: 0 0 -1px;
}

nav a {
  display: block;
  padding: 0.5rem 1rem;
  border: 1px solid transparent;
  border-radius: 0.25rem 0.25rem 0 0;
  font-family: var(--f-body);
  font-style: normal;
  text-decoration: none;
}

nav a:hover {
  border-color: var(--c-line-soft) var(--c-line-soft) var(--c-line);
}

nav a.router-link-exact-active {
  color: var(--c-text);
  background: var(--c-bg);
  border-color: var(--c-line) var(--c-line) var(--c-bg);
}

@media print {
  .theme-toggle {
    display: none;
  }
}

@media (max-width: 890px) {
  .logo {
    margin: 25px 0 20px;
  }

  .logo img {
    width: 55px;
  }
}

@media (max-width: 575px) {
  nav ul {
    border-bottom: 0;
  }

  nav a.router-link-exact-active {
    border-color: var(--c-line);
    border-radius: 0.25rem;
  }
}
</style>
