<script setup lang="ts">
useSeoMeta({
  title: '',
  ogTitle: 'Hollux, lead développeur web fullstack en Alsace',
  description:
    "Hollux (Adrien Marchand), lead développeur web fullstack à Strasbourg : Symfony, Vue.js / Nuxt, React, serveurs Linux. Disponible pour un poste de lead dev en Alsace ou en full-remote.",
})

const img = (file: string) => `/img/competences/${file}`

const pillars = [
  {
    title: 'Back-end',
    logos: [{ src: img('symfony.png'), alt: 'Symfony' }, { src: img('php.png'), alt: 'PHP' }],
    text: 'API, outils métier et back-offices en Symfony, du code PHP objet propre et testé.',
  },
  {
    title: 'Front-end',
    logos: [{ src: img('vuejs.png'), alt: 'Vue.js' }, { src: img('react.svg'), alt: 'React' }],
    text: 'Interfaces réactives en Vue.js / Nuxt et React, des PWA aux sites statiques rapides.',
  },
  {
    title: 'Serveurs & DevOps',
    logos: [{ src: img('docker.png'), alt: 'Docker' }, { src: img('linux.png'), alt: 'Linux' }],
    text: 'Serveurs Linux, Docker, CI/CD avec Forgejo : je mets en ligne ce que je développe.',
  },
  {
    title: 'Lead & projet',
    text: "Encadrement d'équipe, sprints, revues de code, et le lien entre le métier et la technique.",
  },
]

const projects = [
  {
    title: 'Liminal',
    img: '/img/realisations/liminal.png',
    url: 'https://liminal.hollux.fr/liminal',
    text: 'Jeu de cartes roguelike en deckbuilding, règles calculées côté serveur.',
    stack: 'React + Symfony',
  },
  {
    title: 'Patrimoine',
    img: '/img/realisations/patrimoine.png',
    url: 'https://patrimoine.hollux.fr',
    text: 'Tableau de bord pour conseiller en patrimoine, avec Claude comme assistant via MCP.',
    stack: 'Next.js',
  },
  {
    title: 'La Clef',
    img: '/img/realisations/laclefmin.png',
    url: 'https://www.laclef.online/',
    text: "Site du livre-énigme La Clef, plein de secrets et d'outils cachés.",
    stack: 'React',
  },
]

const now = [
  'Développement agentique : déléguer des tâches à des agents IA, toujours relues et maîtrisées',
  'Serveurs de dev et de prod séparés, CI/CD Forgejo, sauvegardes externalisées',
  'Des projets perso en React, Symfony et Nuxt, comme ce site',
]
</script>

<template>
  <div class="home">
    <section class="container hero">
      <div class="hero-text">
        <h1>Hollux, lead développeur web fullstack en Alsace</h1>
        <p class="lead">
          Je suis <b>Adrien Marchand</b>, développeur web basé à <b>Strasbourg</b>. Du back-end <b>Symfony</b> aux
          interfaces <b>Vue.js</b> et <b>React</b>, jusqu'aux <b>serveurs</b> qui les font tourner, je crée des outils
          web <b>utiles</b>, <b>rapides</b> et <b>maintenables</b>, et j'aide une équipe à en faire autant.
        </p>
      </div>
      <div class="hero-portrait">
        <NuxtImg format="webp" src="/img/base/tete.webp" alt="Portrait d'Adrien Marchand" width="260" densities="x1 x2" />
      </div>
    </section>
    <ButtonTrait to="/cv" label="Voir mon CV" />

    <section class="container">
      <h2>Ce que je fais</h2>
      <ol class="pillars">
        <li v-for="(pillar, i) in pillars" :key="pillar.title">
          <div class="pillar-head">
            <span class="pillar-num" aria-hidden="true">{{ String(i + 1).padStart(2, '0') }}</span>
            <span v-if="pillar.logos" class="pillar-logos">
              <NuxtImg
                v-for="logo in pillar.logos"
                :key="logo.alt"
                :format="logo.src.endsWith('.svg') ? undefined : 'webp'"
                :src="logo.src"
                :alt="logo.alt"
                height="36"
                densities="x1 x2"
                loading="lazy"
              />
            </span>
          </div>
          <h3>{{ pillar.title }}</h3>
          <p>{{ pillar.text }}</p>
        </li>
      </ol>
    </section>
    <ButtonTrait to="/competences" label="Toutes mes compétences" />

    <section class="container">
      <h2>Projets récents</h2>
      <div class="cards">
        <ProjectCard
          v-for="project in projects"
          :key="project.title"
          :title="project.title"
          :img="project.img"
          :url="project.url"
          :stack="project.stack"
        >
          <p>{{ project.text }}</p>
        </ProjectCard>
      </div>
    </section>
    <ButtonTrait to="/realisations" label="Voir toutes les réalisations" />

    <section class="container">
      <h2>En ce moment</h2>
      <div class="now">
        <div class="terminal" role="group" aria-label="Ce que je fais en ce moment">
          <p class="prompt" aria-hidden="true">$ git log --since=2026</p>
          <ul>
            <li v-for="item in now" :key="item">{{ item }}</li>
          </ul>
        </div>
        <div class="now-text">
          <p>
            Après deux ans et demi comme <b>lead développeur</b>, je prends le temps de monter en compétences sur mes
            propres projets, de l'idée jusqu'à la mise en production.
          </p>
          <p>
            Je cherche maintenant un poste de <b>lead développeur</b>, en <b>Alsace</b> ou en <b>full-remote</b>, dans
            une équipe qui aime le code propre, Git et l'intégration continue.
          </p>
          <p><NuxtLink to="/ensavoirplus">En savoir plus sur moi →</NuxtLink></p>
        </div>
      </div>
    </section>

    <ButtonTrait to="mailto:holluxpanda@gmail.com" label="Un projet, un poste ? Écrivez-moi !" />
  </div>
</template>

<style scoped>
.home ul,
.home ol {
  list-style: none;
  padding: 0;
}

.home li {
  margin: 0;
}

/* ACCROCHE */

.hero {
  display: grid;
  grid-template-columns: minmax(0, 1fr) auto;
  gap: 50px;
  align-items: center;
}

.hero h1 {
  font-size: 2.1rem;
}

.lead {
  max-width: 680px;
  font-size: 1.05rem;
}

.hero-portrait img {
  display: block;
  width: 260px;
  border: 1px solid var(--c-ink);
  box-shadow: 10px 10px 0 var(--c-shadow);
}

/* CE QUE JE FAIS */

.pillars {
  display: grid;
  grid-template-columns: repeat(auto-fit, minmax(220px, 1fr));
  gap: 30px 24px;
}

.pillars > li {
  display: grid;
  grid-row: span 3;
  grid-template-rows: subgrid;
  row-gap: 0;
}

.pillar-head {
  display: flex;
  align-items: flex-end;
  justify-content: space-between;
  gap: 10px;
}

.pillar-num {
  font-family: var(--f-title);
  font-size: 2.8rem;
  font-weight: 700;
  line-height: 1;
  color: transparent;
  -webkit-text-stroke: 1px var(--c-ink);
}

.pillar-logos {
  display: flex;
  gap: 8px;
}

.pillar-logos img {
  width: 36px;
  height: 36px;
  object-fit: contain;
}

.pillars h3 {
  margin: 8px 0 12px;
  padding-bottom: 8px;
  border-bottom: 1px solid var(--c-ink);
}

.pillars p {
  margin: 0;
  font-size: 0.9rem;
}

/* EN CE MOMENT */

.now {
  display: grid;
  grid-template-columns: minmax(0, 1.1fr) minmax(0, 1fr);
  gap: 40px;
  align-items: start;
}

.terminal {
  padding: 22px 24px;
  background: var(--c-ink);
  color: var(--c-on-ink);
  box-shadow: 6px 6px 0 var(--c-muted);
  font-size: 0.9rem;
}

.prompt {
  margin: 0 0 14px;
  color: var(--c-muted);
}

.prompt::after {
  content: '_';
  margin-left: 4px;
  animation: blink 1.1s steps(1) infinite;
}

@keyframes blink {
  50% {
    opacity: 0;
  }
}

.terminal li {
  position: relative;
  margin-bottom: 8px;
  padding-left: 18px;
  font-size: 0.9rem;
}

.terminal li:last-child {
  margin-bottom: 0;
}

.terminal li::before {
  content: '*';
  position: absolute;
  left: 0;
  color: var(--c-muted);
}

@media (max-width: 767px) {
  .hero {
    grid-template-columns: 1fr;
    gap: 30px;
  }

  .hero-portrait {
    order: -1;
  }

  .hero-portrait img {
    width: 150px;
    box-shadow: 6px 6px 0 var(--c-shadow);
  }

  .hero h1 {
    font-size: 1.6rem;
  }

  .now {
    grid-template-columns: 1fr;
    gap: 24px;
  }
}

@media (prefers-reduced-motion: reduce) {
  .prompt::after {
    animation: none;
  }
}
</style>
