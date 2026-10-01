<script setup lang="ts">
useSeoMeta({
  title: 'Compétences',
  description:
    "Stack, domaines d'intervention et outils d'Hollux, lead développeur web fullstack : Symfony, Vue.js / Nuxt, React, PHP, Docker, serveurs Linux.",
})

const yearsSince = (year: number) => new Date().getFullYear() - year
const img = (file: string) => `/img/competences/${file}`

const stats = [
  { value: yearsSince(2016), unit: 'ans', label: 'de développement web professionnel' },
  { value: 5, unit: 'entreprises', label: "de l'agence à l'industrie" },
  { value: 10, unit: '+', label: 'sites et applis livrés, pro et perso' },
  { value: 1, unit: 'équipe', label: 'encadrée en tant que lead' },
]

interface Core {
  name: string
  img: string
  since?: number
  text: string
  usedIn: string[]
}

const core: Core[] = [
  {
    name: 'Symfony',
    img: img('symfony.png'),
    since: 2016,
    text: "Mon socle back-end : API, outils métier, back-offices, migrations de versions. Formé par SensioLabs, utilisé dans quasiment tous mes postes.",
    usedIn: ['Outils internes Sermes', 'Refonte Alcyon', 'Ludo Drive', 'Météo Horbourg-Wihr'],
  },
  {
    name: 'Vue.js / Nuxt',
    img: img('vuejs.png'),
    since: 2018,
    text: "Mon framework front préféré, pour sa souplesse. Formé par Zenika, je l'utilise des PWA aux sites statiques, comme celui-ci en Nuxt 4.",
    usedIn: ['Ce site', 'Team builder Genshin', 'Ludo Drive', 'Quizz cinéma'],
  },
  {
    name: 'React',
    img: img('react.svg'),
    since: 2023,
    text: 'Pour des interfaces riches branchées sur une API Symfony : outils internes en entreprise et un site plein de secrets.',
    usedIn: ['Outils internes Sermes', 'La Clef'],
  },
  {
    name: 'PHP',
    img: img('php.png'),
    since: 2015,
    text: 'Du MVC fait maison au code objet SOLID sans framework : je connais le langage au-delà de Symfony.',
    usedIn: ['Gestion d’ascenseurs Jaune de Mars', 'Modules WordPress', 'Haricot de Castelnaudary'],
  },
  {
    name: 'Docker',
    img: img('docker.png'),
    text: 'Environnements de dev reproductibles, serveurs internes, déploiements : je configure et maintiens mes conteneurs moi-même.',
    usedIn: ['Infra Sermes', 'Serveur perso (NUC)'],
  },
  {
    name: 'SQL',
    img: img('mySQL.png'),
    since: 2015,
    text: 'Modélisation, requêtes complexes et optimisation, y compris en collaboration avec une équipe AS400 gérant l’ERP.',
    usedIn: ['Outils internes Sermes', 'Météo Horbourg-Wihr', 'Jaune de Mars'],
  },
]

const domains = [
  {
    title: 'Back-end',
    items: [
      'API REST et outils métier en Symfony',
      'Migration de projets (Symfony 2 → 4, Zend → Symfony)',
      'Code PHP objet, MVC, principes SOLID',
      'Intégration d’API tierces (météo, Ludoprêt…)',
    ],
  },
  {
    title: 'Front-end',
    items: [
      'Applications Vue.js, Nuxt et React',
      'Sites statiques rapides et bien référencés',
      'Progressive Web Apps',
      'Intégration HTML / CSS / Sass soignée',
    ],
  },
  {
    title: 'Serveurs & DevOps',
    items: [
      'Administration de serveurs Linux',
      'Docker, Apache, DNS, SSL, bases de données',
      'CI/CD avec Forgejo, mise en production automatisée',
      'Serveurs de dev et de prod séparés, sauvegardes externalisées',
      'Serveurs maison : Raspberry Pi puis NUC',
      'Hébergement et déploiement chez OVH',
    ],
  },
  {
    title: 'Lead & gestion de projet',
    items: [
      'Encadrement d’une équipe de développeurs',
      'Scrum master : tickets, sprints, revues de code',
      'Recueil du besoin métier, choix techniques, délais',
      'Relation clients, prestataires et autres équipes',
    ],
  },
  {
    title: 'IA & développement agentique',
    items: [
      'Copilot, Claude Code et ChatGPT au quotidien',
      'Pour aller plus vite sur le répétitif',
      'Développement agentique : déléguer des tâches à des agents IA',
      'IA en local avec Ollama : chatbot, analyse de données',
      'Toujours relu, compris et maîtrisé',
    ],
  },
]

const timeline = [
  { year: 2015, title: 'Reconversion', text: 'Formation développeur / intégrateur à la 3WAcademy : HTML, CSS, PHP, SQL et un premier framework MVC maison.' },
  { year: 2016, title: 'Alcyon, premier poste', text: 'Deux ans de refonte en Symfony 3, maintenance en Zend Framework 1, une appli Android en Java.' },
  { year: 2017, title: 'SensioLabs', text: 'Formations officielles Symfony SFC3 et SFC4.' },
  { year: 2018, title: 'Arrivée de Vue.js', text: 'Formation Zenika, premier essai de Progressive Web App.' },
  { year: 2019, title: '2LE', text: 'Migration d’un site de Symfony 2 vers Symfony 4 + Vue.js, et premiers pas en gestion de projet.' },
  { year: 2021, title: 'PHP sans filet', text: 'WordPress et Twig chez Thuria, puis deux ans de PHP objet fait main chez Jaune de Mars.' },
  { year: 2023, title: 'Lead développeur', text: 'Chez Sermes : Symfony + React, Docker, serveurs, encadrement d’équipe.' },
  { year: 2024, title: 'La Clef', text: 'Un site React pour un livre-énigme, avec des développements à l’aveugle à la demande des auteurs.' },
  { year: 2026, title: 'Développement agentique', text: 'Montée en compétences à temps plein : CI/CD Forgejo, Docker, sauvegardes, outils connectés à l’API Claude, développement avec agents IA.' },
]

type Category = 'Langages' | 'Frameworks' | 'Serveurs & données' | 'Outils' | 'IA' | 'CMS'
/** 3 : quotidien, 2 : régulier, 1 : ponctuel ou passé */
type Level = 1 | 2 | 3

const levels: Record<Level, string> = { 3: 'quotidien', 2: 'régulier', 1: 'ponctuel ou passé' }

const tools: { name: string; cat: Category; level: Level }[] = [
  { name: 'PHP', cat: 'Langages', level: 3 },
  { name: 'JavaScript', cat: 'Langages', level: 3 },
  { name: 'SQL', cat: 'Langages', level: 3 },
  { name: 'HTML', cat: 'Langages', level: 3 },
  { name: 'CSS', cat: 'Langages', level: 3 },
  { name: 'TypeScript', cat: 'Langages', level: 2 },
  { name: 'Twig', cat: 'Langages', level: 1 },
  { name: 'Sass', cat: 'Langages', level: 2 },
  { name: 'Less', cat: 'Langages', level: 1 },
  { name: 'Java', cat: 'Langages', level: 1 },
  { name: 'Symfony', cat: 'Frameworks', level: 3 },
  { name: 'Vue.js', cat: 'Frameworks', level: 2 },
  { name: 'Nuxt', cat: 'Frameworks', level: 2 },
  { name: 'React', cat: 'Frameworks', level: 3 },
  { name: 'Laravel', cat: 'Frameworks', level: 1 },
  { name: 'Bootstrap', cat: 'Frameworks', level: 1 },
  { name: 'jQuery', cat: 'Frameworks', level: 1 },
  { name: 'Zend Framework', cat: 'Frameworks', level: 1 },
  { name: 'Docker', cat: 'Serveurs & données', level: 3 },
  { name: 'Linux', cat: 'Serveurs & données', level: 3 },
  { name: 'MySQL', cat: 'Serveurs & données', level: 3 },
  { name: 'Apache', cat: 'Serveurs & données', level: 3 },
  { name: 'DNS / SSL', cat: 'Serveurs & données', level: 2 },
  { name: 'OVH', cat: 'Serveurs & données', level: 2 },
  { name: 'Raspberry Pi / NUC', cat: 'Serveurs & données', level: 2 },
  { name: 'Git / GitHub', cat: 'Outils', level: 3 },
  { name: 'VS Code', cat: 'Outils', level: 3 },
  { name: 'PhpStorm', cat: 'Outils', level: 1 },
  { name: 'macOS', cat: 'Outils', level: 2 },
  { name: 'Analytics / SEO', cat: 'Outils', level: 1 },
  { name: 'Forgejo CI/CD', cat: 'Serveurs & données', level: 3 },
  { name: 'SVN', cat: 'Outils', level: 1 },
  { name: 'SoapUI', cat: 'Outils', level: 1 },
  { name: 'NetBeans', cat: 'Outils', level: 1 },
  { name: 'FileZilla', cat: 'Outils', level: 1 },
  { name: 'XAMPP / EasyPHP', cat: 'Outils', level: 1 },
  { name: 'GitHub Copilot', cat: 'IA', level: 3 },
  { name: 'Claude Code', cat: 'IA', level: 3 },
  { name: 'API Claude', cat: 'IA', level: 3 },
  { name: 'Ollama (IA locale)', cat: 'IA', level: 2 },
  { name: 'ChatGPT', cat: 'IA', level: 2 },
  { name: 'WordPress', cat: 'CMS', level: 1 },
  { name: 'PrestaShop', cat: 'CMS', level: 1 },
]

const categories: Category[] = ['Langages', 'Frameworks', 'Serveurs & données', 'Outils', 'IA', 'CMS']
const filter = ref<Category | null>(null)
const visibleTools = computed(() => (filter.value ? tools.filter((t) => t.cat === filter.value) : tools))
</script>

<template>
  <div class="competences">
    <section class="container">
      <h1>Compétences</h1>
      <p class="lead">
        Du back-end <b>Symfony</b> aux interfaces <b>Vue.js</b> et <b>React</b>, jusqu'aux <b>serveurs</b> que j'installe
        moi-même : je fais des outils web utiles, rapides et maintenables, et j'aide une équipe à en faire autant.
      </p>
      <ul class="stats">
        <li v-for="stat in stats" :key="stat.label">
          <span class="stat-value">{{ stat.value }}<small>{{ stat.unit }}</small></span>
          <span class="stat-label">{{ stat.label }}</span>
        </li>
      </ul>
    </section>

    <div class="trait" />

    <section class="container">
      <h2>Ma stack principale</h2>
      <ul class="core">
        <li v-for="tech in core" :key="tech.name">
          <div class="core-head">
            <NuxtImg :format="tech.img.endsWith('.svg') ? undefined : 'webp'" :src="tech.img" alt="" height="56" densities="x1 x2" loading="lazy" />
            <div>
              <h3>{{ tech.name }}</h3>
              <p class="core-since">
                <template v-if="tech.since">depuis {{ tech.since }} · {{ yearsSince(tech.since) }} ans</template>
                <template v-else>au quotidien</template>
              </p>
            </div>
          </div>
          <p>{{ tech.text }}</p>
          <p class="core-used">
            <span class="visually-hidden">Utilisé pour :</span>
            <span v-for="project in tech.usedIn" :key="project">{{ project }}</span>
          </p>
        </li>
      </ul>
    </section>

    <div class="trait" />

    <section class="container">
      <h2>Ce que je fais concrètement</h2>
      <ol class="domains">
        <li v-for="(domain, i) in domains" :key="domain.title">
          <span class="domain-num" aria-hidden="true">{{ String(i + 1).padStart(2, '0') }}</span>
          <h3>{{ domain.title }}</h3>
          <ul>
            <li v-for="item in domain.items" :key="item">{{ item }}</li>
          </ul>
        </li>
      </ol>
    </section>

    <div class="trait" />

    <section class="container">
      <h2>Comment ma stack a évolué</h2>
      <ol class="timeline">
        <li v-for="step in timeline" :key="step.year">
          <span class="timeline-year">{{ step.year }}</span>
          <div>
            <h3>{{ step.title }}</h3>
            <p>{{ step.text }}</p>
          </div>
        </li>
      </ol>
    </section>

    <div class="trait" />

    <section class="container">
      <h2>La boîte à outils complète</h2>
      <div class="filters" role="group" aria-label="Filtrer par catégorie">
        <button type="button" :aria-pressed="filter === null" @click="filter = null">Tout ({{ tools.length }})</button>
        <button v-for="cat in categories" :key="cat" type="button" :aria-pressed="filter === cat" @click="filter = cat">
          {{ cat }}
        </button>
      </div>
      <p class="legend">
        <span v-for="lvl in ([3, 2, 1] as Level[])" :key="lvl">
          <span class="dots" :data-level="lvl" aria-hidden="true"><i /><i /><i /></span> {{ levels[lvl] }}
        </span>
      </p>
      <ul class="tools" aria-live="polite">
        <li v-for="tool in visibleTools" :key="tool.name" :class="`level-${tool.level}`">
          {{ tool.name }}
          <span class="dots" :data-level="tool.level"><i /><i /><i /></span>
          <span class="visually-hidden">(usage {{ levels[tool.level] }})</span>
        </li>
      </ul>
    </section>

    <ButtonTrait to="/realisations" label="Voir ces compétences en action" />
  </div>
</template>

<style scoped>
.competences ul,
.competences ol {
  list-style: none;
  padding: 0;
}

.lead {
  max-width: 760px;
  font-size: 1.05rem;
}

/* CHIFFRES CLÉS */

.stats {
  display: grid;
  grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
  gap: 20px;
  margin: 40px 0 10px;
}

.stats li {
  display: flex;
  flex-direction: column;
  padding-left: 15px;
  border-left: 3px solid var(--c-ink);
  margin: 0;
}

.stat-value {
  font-family: var(--f-title);
  font-size: 2.6rem;
  font-weight: 700;
  line-height: 1;
  color: var(--c-ink);
}

.stat-value small {
  margin-left: 6px;
  font-size: 0.9rem;
  text-transform: uppercase;
}

.stat-label {
  margin-top: 6px;
  font-size: 0.85rem;
}

/* STACK PRINCIPALE */

.core {
  display: grid;
  grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
  gap: 24px;
}

.core > li {
  display: flex;
  flex-direction: column;
  margin: 0;
  padding: 22px;
  border: 1px solid var(--c-ink);
  box-shadow: 6px 6px 0 var(--c-shadow);
  transition: transform 0.15s, box-shadow 0.15s;
}

.core > li:hover {
  transform: translate(-2px, -2px);
  box-shadow: 8px 8px 0 var(--c-shadow);
}

.core-head {
  display: flex;
  align-items: center;
  gap: 16px;
  margin-bottom: 14px;
}

.core-head img {
  width: 56px;
  height: 56px;
  object-fit: contain;
}

.core-head h3 {
  margin: 0;
}

.core-since {
  margin: 2px 0 0;
  font-size: 0.85rem;
  font-style: italic;
}

.core-used {
  display: flex;
  flex-wrap: wrap;
  gap: 6px;
  margin: auto 0 0;
  padding-top: 8px;
}

.core-used span:not(.visually-hidden) {
  padding: 2px 8px;
  background: var(--c-ink);
  color: var(--c-on-ink);
  font-size: 0.75rem;
}

/* DOMAINES */

.domains {
  display: grid;
  grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
  gap: 30px 24px;
}

.domains > li {
  display: grid;
  grid-row: span 3;
  grid-template-rows: subgrid;
  row-gap: 0;
  margin: 0;
}

.domain-num {
  display: block;
  font-family: var(--f-title);
  font-size: 2.8rem;
  font-weight: 700;
  line-height: 1;
  color: transparent;
  -webkit-text-stroke: 1px var(--c-ink);
}

.domains h3 {
  display: flex;
  align-items: flex-end;
  margin: 8px 0 12px;
  padding-bottom: 8px;
  border-bottom: 1px solid var(--c-ink);
}

.domains li li {
  position: relative;
  margin: 0 0 6px;
  padding-left: 16px;
  font-size: 0.9rem;
}

.domains li li::before {
  content: '>';
  position: absolute;
  left: 0;
  font-weight: 700;
}

/* FRISE */

.timeline {
  position: relative;
  max-width: 820px;
  margin: 0 auto;
}

.timeline::before {
  content: '';
  position: absolute;
  top: 6px;
  bottom: 6px;
  left: 81px;
  border-left: 1px solid var(--c-ink);
}

.timeline > li {
  position: relative;
  display: grid;
  grid-template-columns: 64px 1fr;
  gap: 36px;
  margin: 0 0 22px;
}

.timeline > li::before {
  content: '';
  position: absolute;
  top: 5px;
  left: 76px;
  width: 11px;
  height: 11px;
  background: var(--c-bg);
  border: 2px solid var(--c-ink);
  border-radius: 50%;
}

.timeline > li:last-child::before {
  background: var(--c-ink);
}

.timeline-year {
  font-family: var(--f-title);
  font-weight: 700;
  color: var(--c-ink);
  text-align: right;
}

.timeline h3 {
  margin: 0 0 4px;
  font-size: 1rem;
}

.timeline p {
  margin: 0;
}

/* BOÎTE À OUTILS */

.filters {
  display: flex;
  flex-wrap: wrap;
  gap: 8px;
  margin-bottom: 14px;
}

.filters button {
  padding: 6px 14px;
  background: var(--c-bg);
  color: var(--c-ink);
  border: 1px solid var(--c-ink);
  font-family: var(--f-body);
  font-size: 0.85rem;
  cursor: pointer;
}

.filters button:hover {
  background: var(--c-hover);
}

.filters button[aria-pressed='true'] {
  background: var(--c-ink);
  color: var(--c-on-ink);
}

.legend {
  display: flex;
  flex-wrap: wrap;
  gap: 6px 20px;
  font-size: 0.8rem;
}

.tools {
  display: flex;
  flex-wrap: wrap;
  gap: 10px;
}

.tools li {
  display: inline-flex;
  align-items: center;
  gap: 10px;
  margin: 0;
  padding: 7px 12px;
  border: 1px solid var(--c-ink);
  font-size: 0.9rem;
}

.tools li.level-3 {
  font-weight: 700;
}

.tools li.level-1 {
  border-style: dashed;
  color: var(--c-subtle);
}

.dots {
  display: inline-flex;
  gap: 3px;
}

.dots i {
  width: 7px;
  height: 7px;
  border: 1px solid currentColor;
  border-radius: 50%;
}

.dots[data-level='1'] i:nth-child(-n + 1),
.dots[data-level='2'] i:nth-child(-n + 2),
.dots[data-level='3'] i {
  background: currentColor;
}

@media (max-width: 575px) {
  .stat-value {
    font-size: 2.1rem;
  }

  .timeline::before {
    left: 61px;
  }

  .timeline > li {
    grid-template-columns: 48px 1fr;
    gap: 28px;
  }

  .timeline > li::before {
    left: 56px;
  }
}

@media (prefers-reduced-motion: reduce) {
  .core > li {
    transition: none;
  }
}
</style>
