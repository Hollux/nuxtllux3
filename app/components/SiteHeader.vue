<script setup lang="ts">
const links = [
  { to: '/', label: 'Accueil' },
  { to: '/competences', label: 'Compétences' },
  { to: '/realisations', label: 'Réalisations' },
  { to: '/cv', label: 'CV' },
  { to: '/ensavoirplus', label: 'En savoir plus' },
  { to: '/contact', label: 'Contact' },
]
</script>

<template>
  <header class="site-header">
    <NuxtLink to="/" class="logo" aria-label="Hollux, retour à l'accueil">
      <NuxtImg format="webp" src="/img/base/logo.png" alt="Logo Hollux" width="85" height="85" />
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
  margin-bottom: 50px;
  text-align: center;
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
  border-bottom: 1px solid #dee2e6;
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
  border-color: #e9ecef #e9ecef #dee2e6;
}

nav a.router-link-exact-active {
  color: #495057;
  background: var(--c-bg);
  border-color: #dee2e6 #dee2e6 var(--c-bg);
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
    border-color: #dee2e6;
    border-radius: 0.25rem;
  }
}
</style>
