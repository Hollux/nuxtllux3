<script setup lang="ts">
const year = new Date().getFullYear()
</script>

<template>
  <footer class="site-footer">
    <nav class="footer-nav" aria-label="Liens de pied de page">
      <NuxtLink to="/">Accueil</NuxtLink>
      <NuxtLink to="/mentions-legales">Mentions légales</NuxtLink>
    </nav>
    <p>Copyright {{ year }} Adrien Marchand - Tous droits réservés.</p>
  </footer>
</template>

<style scoped>
.site-footer {
  margin-top: 1.5rem;
  text-align: center;
}

.footer-nav {
  display: flex;
  flex-wrap: wrap;
  justify-content: center;
  gap: 10px 80px;
  padding: 10px 0 8px;
  margin-bottom: 10px;
  background: var(--c-ink);
}

.footer-nav a {
  color: var(--c-on-ink);
  font-style: normal;
}

p {
  margin-bottom: 10px;
}
</style>
