const siteUrl = 'https://hollux.fr'
const description =
  "Hollux (Adrien Marchand), lead développeur web fullstack en Alsace : Symfony, Vue.js, React. Compétences, réalisations et CV."

export default defineNuxtConfig({
  compatibilityDate: '2026-10-01',
  devtools: { enabled: false },

  modules: ['@nuxt/fonts', '@nuxt/image'],

  css: ['~/assets/css/main.css'],

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

  // Site 100 % statique (hébergement OVH) : toutes les pages sont pré-rendues.
  routeRules: {
    '/**': { prerender: true },
    // Anciennes URL. /enSavoirPlus est une page statique dans public/ : une règle ici
    // bouclerait côté client, le routeur comparant les chemins sans tenir compte de la casse.
    '/miniquizz': { redirect: 'https://cinequizz.hollux.fr/cinequizz' },
    '/miniquizzend': { redirect: 'https://cinequizz.hollux.fr/cinequizz' },
    '/randomSmashUp': { redirect: '/realisations' },
  },

  nitro: {
    prerender: {
      crawlLinks: true,
      routes: ['/', '/sitemap.xml', '/miniquizz', '/miniquizzend', '/randomSmashUp'],
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
