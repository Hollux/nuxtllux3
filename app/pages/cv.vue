<script setup lang="ts">
useSeoMeta({
  title: 'CV',
  description: "Curriculum vitae d'Adrien Marchand (Hollux), lead développeur web : expériences, compétences, formations.",
})

const age = ageAt()

interface Experience {
  /** Mois de début et de fin au format AAAA-MM ; fin absente si le poste est en cours. */
  start: string
  end?: string
  title: string
  company?: string
  missions: string[]
  stack: string[]
}

const experiences: Experience[] = [
  {
    start: '2026-02',
    title: 'Développeur fullstack & DevOps',
    company: 'projets personnels',
    missions: [
      "Conception et développement de projets web, de l'idée à la mise en production",
      'Import, traitement et visualisation de données',
      'Mise en place de serveurs de dev et de prod, CI/CD avec Forgejo, déploiement automatisé',
      'Docker, automatisations, suivi, tests et sauvegardes externalisées sur le cloud',
      'Développement agentique avec Claude Code, IA locale avec Ollama, intégration de l’API Claude',
    ],
    stack: ['Claude Code', 'API Claude', 'Ollama', 'Docker', 'Forgejo CI/CD', 'Nuxt', 'Symfony', 'Linux'],
  },
  {
    start: '2023-08',
    end: '2026-01',
    title: 'Lead Développeur',
    company: 'Sermes',
    missions: [
      "Encadrement de l'équipe de développement web, gestion de projet",
      "Développement d'outils internes en Symfony / React / SQL",
      'Analyse et réalisation des demandes internes',
      'Gestion des serveurs',
      'Relation avec les clients, prestataires et autres développeurs',
      "Collaboration avec l'équipe AS400 gérant l'ERP de l'entreprise",
    ],
    stack: ['Symfony', 'React', 'SQL', 'Docker', 'Linux'],
  },
  {
    start: '2021-11',
    end: '2023-08',
    title: 'Développeur Full Stack',
    company: 'Jaune de Mars',
    missions: [
      "Administration et évolution d'un outil complet de gestion d'ascenseurs : clients, appareils, techniciens, tickets, suivi des interventions",
      'Développement et maintenance de son API',
      'Site PHP « fait main » avec évolutions MVC / objet inspirées des frameworks modernes',
    ],
    stack: ['PHP', 'MVC / objet', 'SQL', 'API'],
  },
  {
    start: '2021-07',
    end: '2021-11',
    title: 'Développeur Full Stack',
    company: 'Agence Thuria',
    missions: ['Création de sites administrables avec modules de gestion pour les offices de tourisme'],
    stack: ['WordPress', 'PHP', 'Twig', 'JavaScript'],
  },
  {
    start: '2019-06',
    end: '2019-11',
    title: 'Chef de projet / Développeur Full Stack',
    company: '2LE',
    missions: ["Migration d'un site de Symfony 2 vers Symfony 4 + Vue.js", 'Gestion de projet web'],
    stack: ['Symfony', 'Vue.js'],
  },
  {
    start: '2016-03',
    end: '2019-01',
    title: 'Développeur Full Stack',
    company: 'Alcyon France',
    missions: [
      "Refonte du site d'Alcyon en Symfony 3 pendant 2 ans : site marchand, accès privé, catalogue en ligne, applications web pour les vétérinaires",
      "Maintenance de l'ancien site sous Zend Framework 1",
      "Développement d'une application Android en Java",
      "Recherches pour la création d'une progressive web app",
    ],
    stack: ['Symfony 3', 'Zend Framework', 'Java', 'Vue.js'],
  },
]

const MONTHS = ['janvier', 'février', 'mars', 'avril', 'mai', 'juin', 'juillet', 'août', 'septembre', 'octobre', 'novembre', 'décembre']

const parseMonth = (value: string) => {
  const [year, month] = value.split('-').map(Number) as [number, number]
  return { year, month }
}

const formatMonth = (value: string) => {
  const { year, month } = parseMonth(value)
  return `${MONTHS[month - 1]} ${year}`
}

function duration(start: string, end?: string): string {
  const from = parseMonth(start)
  const now = new Date()
  const to = end ? parseMonth(end) : { year: now.getFullYear(), month: now.getMonth() + 1 }
  // Mois de début et de fin inclus
  const total = (to.year - from.year) * 12 + to.month - from.month + 1
  const years = Math.floor(total / 12)
  const months = total % 12
  return [years && `${years} an${years > 1 ? 's' : ''}`, months && `${months} mois`].filter(Boolean).join(' ')
}

const skills = [
  { label: 'Back-end', value: 'PHP, Symfony, Laravel, SQL' },
  { label: 'Front-end', value: 'JavaScript, Vue.js / Nuxt, React, HTML, CSS, Sass' },
  { label: 'Serveurs', value: 'Linux, Docker, Apache, DNS, bases de données' },
  { label: 'IA', value: 'GitHub Copilot, Claude Code, ChatGPT' },
  { label: 'Divers', value: 'Git, captcha, Analytics, notions de SEO' },
]

const trainings = [
  { date: '2018', title: 'Formation Vue.js', by: 'Zenika' },
  { date: '2017', title: 'Formations Symfony SFC3 - SFC4', by: 'SensioLabs' },
  { date: '2015', title: 'Développeur / intégrateur web', by: '3WAcademy' },
]

const languages = [
  { name: 'Français', level: 'langue maternelle', dots: 3 },
  { name: 'Anglais', level: 'bonne compréhension', dots: 2 },
  { name: 'Allemand', level: 'notions', dots: 1 },
]

const projects = [
  { year: '2024', text: 'Site du livre-énigme La Clef', stack: 'React' },
  { year: '2021-2026', text: "Outil météorologique de la ville d'Horbourg-Wihr", stack: 'Nuxt + Symfony' },
  { year: '2022-2025', text: 'Outil « team builder » pour le fansite Genshin Impact FR', stack: 'Nuxt + Symfony' },
  { year: '2020-2021', text: 'Drive pour une ludothèque, lié à leur outil Ludoprêt', stack: 'Symfony + Vue.js' },
  { year: '2020-2021', text: 'Adaptation navigateur du jeu de société TIME Stories', stack: 'Symfony + Vue.js' },
  { year: 'En continu', text: 'Serveurs perso : Raspberry Pi / NUC, Apache, PHP, Node.js, Docker, SSL, SQL, multisite', stack: 'Linux' },
]
</script>

<template>
  <div>
    <div class="container intro no-print">
      <NuxtImg format="webp" src="/img/base/tete.webp" alt="Portrait d'Adrien Marchand" width="160" densities="x1 x2" />
      <div>
        <h1>Curriculum vitae d'Hollux / Adrien Marchand</h1>
        <p>
          Je recherche un poste de <b>lead développeur</b> en <b>Alsace</b> ou en <b>full-remote</b>.<br />
          Start-up, grosse société ou agence, toute entreprise peut me convenir tant qu'on y trouve des
          <b>projets stimulants</b> et des <b>passionnés de code</b> avec qui échanger !
        </p>
      </div>
    </div>
    <ButtonTrait class="no-print" to="/adrien-marchand-cv.pdf" download="Adrien Marchand - CV 2026.pdf" label="Télécharger le CV (PDF)" />

    <article class="container cv">
      <header class="cv-header">
        <div>
          <p class="cv-name">Adrien Marchand</p>
          <p class="cv-role">Lead développeur web fullstack</p>
        </div>
        <ul class="cv-infos">
          <li>Alsace · full-remote</li>
          <li>{{ age }} ans · permis B + véhicule</li>
          <li><a href="mailto:holluxpanda@gmail.com">holluxpanda@gmail.com</a></li>
        </ul>
      </header>

      <div class="cv-body">
        <aside class="cv-side">
          <section>
            <h2>Compétences</h2>
            <dl class="skills">
              <template v-for="skill in skills" :key="skill.label">
                <dt>{{ skill.label }}</dt>
                <dd>{{ skill.value }}</dd>
              </template>
            </dl>
            <NuxtLink to="/competences" class="more no-print">Le détail de mes compétences →</NuxtLink>
          </section>

          <section>
            <h2>Formations</h2>
            <ul class="trainings">
              <li v-for="training in trainings" :key="training.title">
                <span class="year">{{ training.date }}</span>
                <b>{{ training.title }}</b>
                <span class="by">{{ training.by }}</span>
              </li>
            </ul>
          </section>

          <section>
            <h2>Langues</h2>
            <ul class="languages">
              <li v-for="lang in languages" :key="lang.name">
                <span>
                  <b>{{ lang.name }}</b>
                  <span class="by">{{ lang.level }}</span>
                </span>
                <span class="dots" aria-hidden="true">
                  <i v-for="n in 3" :key="n" :class="{ on: n <= lang.dots }" />
                </span>
              </li>
            </ul>
          </section>

          <section>
            <h2>Loisirs</h2>
            <ul class="hobbies">
              <li>Développement</li>
              <li>Jeux</li>
              <li>Modélisme</li>
              <li>Séries & cinéma</li>
              <li>Bricolage</li>
              <li>Guitare</li>
            </ul>
          </section>
        </aside>

        <div class="cv-main">
          <section>
            <h2>Expériences professionnelles</h2>
            <ol class="experiences">
              <li v-for="xp in experiences" :key="xp.start" :class="{ current: !xp.end }">
                <p class="xp-period">
                  {{ formatMonth(xp.start) }} → {{ xp.end ? formatMonth(xp.end) : "aujourd'hui" }}
                  <span class="xp-duration">{{ duration(xp.start, xp.end) }}</span>
                </p>
                <h3>
                  {{ xp.title }} <span v-if="xp.company" class="xp-company">// {{ xp.company }}</span>
                </h3>
                <ul class="missions">
                  <li v-for="mission in xp.missions" :key="mission">{{ mission }}</li>
                </ul>
                <p class="tags">
                  <span class="visually-hidden">Technologies :</span>
                  <span v-for="tech in xp.stack" :key="tech">{{ tech }}</span>
                </p>
              </li>
            </ol>
          </section>

          <section>
            <h2>Projets personnels</h2>
            <ul class="projects">
              <li v-for="project in projects" :key="project.text">
                <span class="year">{{ project.year }}</span>
                <span>{{ project.text }} <i>({{ project.stack }})</i></span>
              </li>
            </ul>
            <p class="projects-more no-print">
              Et diverses autres réalisations en usage privé, pour apprendre ou simplement comme outils personnels.
              <NuxtLink to="/realisations">Voir les réalisations →</NuxtLink>
            </p>
          </section>
        </div>
      </div>
    </article>

    <ButtonTrait class="no-print" to="mailto:holluxpanda@gmail.com" label="Mon profil vous intéresse ? Contactez-moi !" />
  </div>
</template>

<style scoped>
.cv ul,
.cv ol {
  list-style: none;
  padding: 0;
  margin: 0;
}

.cv li {
  margin: 0;
}

/* INTRO */

.intro {
  display: flex;
  align-items: center;
  gap: 30px;
}

.intro img {
  flex: 0 0 160px;
  width: 160px;
}

/* FEUILLE DU CV */

.cv {
  padding: 0;
  border: 1px solid var(--c-ink);
  box-shadow: 8px 8px 0 var(--c-shadow);
}

.cv-header {
  display: flex;
  justify-content: space-between;
  align-items: flex-end;
  flex-wrap: wrap;
  gap: 20px 40px;
  padding: 35px;
  background: var(--c-ink);
  color: var(--c-muted);
}

.cv-header p {
  margin: 0;
}

.cv-name {
  font-family: var(--f-title);
  font-size: 2rem;
  font-weight: 700;
  line-height: 1.1;
  color: var(--c-on-ink);
  text-transform: uppercase;
}

.cv-role {
  margin-top: 6px !important;
  font-size: 1.05rem;
  font-style: italic;
}

.cv-infos {
  text-align: right;
  font-size: 0.9rem;
}

.cv-infos a {
  color: var(--c-muted);
}

.cv-body {
  display: grid;
  grid-template-columns: 1fr 2.3fr;
}

.cv-side {
  padding: 0 24px 24px;
  border-right: 1px solid var(--c-ink);
  background: var(--c-soft);
}

.cv-main {
  padding: 0 30px 24px;
}

.cv h2 {
  margin: 30px 0 16px;
  padding-bottom: 6px;
  border-bottom: 1px solid var(--c-ink);
}

.year {
  font-family: var(--f-title);
  font-weight: 700;
  color: var(--c-ink);
}

.by {
  display: block;
  font-size: 0.85rem;
  font-style: italic;
}

.more {
  display: inline-block;
  margin-top: 10px;
  font-size: 0.85rem;
}

/* COLONNE GAUCHE */

.skills dt {
  font-family: var(--f-title);
  font-size: 0.8rem;
  font-weight: 700;
  color: var(--c-ink);
  text-transform: uppercase;
}

.skills dd {
  margin: 0 0 10px;
  font-size: 0.9rem;
}

.trainings li {
  margin-bottom: 12px;
  font-size: 0.9rem;
}

.trainings .year {
  display: block;
}

.languages li {
  display: flex;
  justify-content: space-between;
  align-items: center;
  gap: 10px;
  margin-bottom: 10px;
  font-size: 0.9rem;
}

.dots {
  display: inline-flex;
  gap: 4px;
}

.dots i {
  width: 9px;
  height: 9px;
  border: 1px solid var(--c-ink);
  border-radius: 50%;
}

.dots i.on {
  background: var(--c-ink);
}

.hobbies {
  display: flex;
  flex-wrap: wrap;
  gap: 6px;
}

.hobbies li {
  padding: 2px 9px;
  border: 1px solid var(--c-ink);
  background: var(--c-bg);
  font-size: 0.85rem;
}

/* EXPÉRIENCES */

.experiences {
  position: relative;
  padding-left: 26px !important;
}

.experiences::before {
  content: '';
  position: absolute;
  top: 8px;
  bottom: 8px;
  left: 5px;
  border-left: 1px solid var(--c-ink);
}

.experiences > li {
  position: relative;
  margin-bottom: 28px;
}

.experiences > li::before {
  content: '';
  position: absolute;
  top: 5px;
  left: -26px;
  width: 11px;
  height: 11px;
  background: var(--c-bg);
  border: 2px solid var(--c-ink);
  border-radius: 50%;
}

.experiences > li.current::before {
  background: var(--c-ink);
}

.xp-period {
  display: flex;
  flex-wrap: wrap;
  align-items: center;
  gap: 4px 12px;
  margin: 0 0 4px;
  font-size: 0.85rem;
  text-transform: capitalize;
}

.xp-duration {
  padding: 0 7px;
  border: 1px solid var(--c-ink);
  font-size: 0.75rem;
  text-transform: none;
}

.experiences h3 {
  margin: 0 0 10px;
}

.xp-company {
  font-family: var(--f-body);
  font-style: italic;
  font-weight: 400;
  text-transform: none;
}

.missions li {
  position: relative;
  margin-bottom: 4px;
  padding-left: 16px;
  font-size: 0.9rem;
}

.missions li::before {
  content: '>';
  position: absolute;
  left: 0;
  font-weight: 700;
}

.tags {
  display: flex;
  flex-wrap: wrap;
  gap: 6px;
  margin: 10px 0 0;
}

.tags span:not(.visually-hidden) {
  padding: 1px 8px;
  background: var(--c-ink);
  color: var(--c-on-ink);
  font-size: 0.75rem;
}

/* PROJETS */

.projects li {
  display: grid;
  grid-template-columns: 100px 1fr;
  gap: 12px;
  margin-bottom: 10px;
  font-size: 0.9rem;
}

.projects-more {
  margin-top: 16px;
  font-size: 0.9rem;
}

@media screen and (max-width: 767px) {
  .intro {
    flex-direction: column;
    text-align: center;
  }

  .cv-header {
    padding: 24px 20px;
  }

  .cv-infos {
    text-align: left;
  }

  .cv-body {
    grid-template-columns: 1fr;
  }

  .cv-main {
    order: -1;
    padding: 0 20px 20px;
    border-bottom: 1px solid var(--c-ink);
  }

  .cv-side {
    padding: 0 20px 20px;
    border-right: 0;
  }

  .projects li {
    grid-template-columns: 1fr;
    gap: 0;
  }
}
</style>

<!-- Impression : seule la feuille du CV est imprimée. -->
<style>
@page {
  margin: 10mm;
}

@media print {
  html {
    font-size: 12px;
  }

  .site-header,
  .site-footer,
  .no-print {
    display: none !important;
  }

  .cv {
    box-shadow: none !important;
    border: 0 !important;
  }

  .cv-header,
  .cv-side,
  .tags span {
    print-color-adjust: exact;
    -webkit-print-color-adjust: exact;
  }

  .experiences > li {
    break-inside: avoid;
  }
}
</style>
