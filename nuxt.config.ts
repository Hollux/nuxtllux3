const siteUrl = 'https://hollux.fr'
const description =
  "Hollux (Adrien Marchand), lead développeur web fullstack en Alsace : Symfony, Vue.js, React. Compétences, réalisations et CV."

export default defineNuxtConfig({
  compatibilityDate: '2026-10-01',
  devtools: { enabled: false },

  modules: ['@nuxt/fonts', '@nuxt/image'],

  css: ['~/assets/css/main.css', '~/assets/css/cyber.css'],

  app: {
    head: {
      htmlAttrs: { lang: 'fr' },
      meta: [
        { name: 'description', content: description },
        { name: 'theme-color', content: '#000000' },
        { property: 'og:type', content: 'website' },
        { property: 'og:site_name', content: 'Hollux' },
        { property: 'og:locale', content: 'fr_FR' },
        { property: 'og:image', content: `${siteUrl}/icon.png` },
        { name: 'twitter:card', content: 'summary' },
      ],
      link: [
        { rel: 'icon', type: 'image/x-icon', href: '/favicon.ico' },
        { rel: 'apple-touch-icon', href: '/icon.png' },
      ],
      // Thème sombre par défaut, posé avant le premier rendu (pas de flash du thème clair) ;
      // cp-boot masque la page jusqu'au lancement de l'effet de décodage, os-boot jusqu'à la
      // fin de la console de démarrage (OsBoot.vue), sauf si l'animation est réduite
      script: [
        {
          innerHTML:
            "(function(){var t;try{t=localStorage.getItem('theme')}catch(e){}if(t==='light')return;var d=document.documentElement;d.dataset.theme='dark';d.classList.add('cp-boot');if(!matchMedia('(prefers-reduced-motion: reduce)').matches)d.classList.add('os-boot')})()",
        },
      ],
    },
  },

  runtimeConfig: {
    public: { siteUrl },
  },

  fonts: {
    families: [
      { name: 'Raleway', weights: [700], provider: 'google', global: true },
      { name: 'Courier Prime', weights: [400, 700], styles: ['normal', 'italic'], provider: 'google', global: true },
    ],
  },

  image: {
    quality: 80,
  },

  // Site 100 % statique (auto-hébergé sur serveur Debian) : toutes les pages sont pré-rendues.
  routeRules: {
    '/**': { prerender: true },
    // Anciennes URL. /enSavoirPlus est une page statique dans public/ : une règle ici
    // bouclerait côté client, le routeur comparant les chemins sans tenir compte de la casse.
    '/miniquizz': { redirect: 'https://cinequizz.hollux.fr/cinequizz' },
    '/miniquizzend': { redirect: 'https://cinequizz.hollux.fr/cinequizz' },
    '/randomSmashUp': { redirect: '/realisations' },
    '/contact': { redirect: '/cv' },
  },

  nitro: {
    prerender: {
      crawlLinks: true,
      // Une page en erreur ou un lien interne cassé fait échouer la génération (et la CI)
      failOnError: true,
      routes: ['/', '/sitemap.xml', '/miniquizz', '/miniquizzend', '/randomSmashUp', '/contact'],
    },
  },

  // Serveur de dev, servi derrière Apache sur holluxdev.hollux.fr
  devServer: {
    host: '127.0.0.1',
    port: 3001,
  },
  vite: {
    server: {
      allowedHosts: ['holluxdev.hollux.fr'],
    },
  },
})
