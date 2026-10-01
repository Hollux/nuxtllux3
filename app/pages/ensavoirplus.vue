<script setup lang="ts">
useSeoMeta({
  title: 'En savoir plus',
  description:
    "Qui est Hollux : parcours en coulisses, projets personnels, poste recherché et passions d'Adrien Marchand, lead développeur web alsacien.",
})

const age = ageAt()

const reducedMotion = () => window.matchMedia('(prefers-reduced-motion: reduce)').matches

const sections = [
  { id: 'qui', label: 'Qui suis-je' },
  { id: 'parcours', label: 'Les coulisses du parcours' },
  { id: 'labo', label: 'Le labo perso' },
  { id: 'recherche', label: 'Ce que je cherche' },
  { id: 'passions', label: 'En dehors du code' },
]

// Sous-navigation collée en haut : défilement doux et section en cours mise en évidence
const toc = ref<HTMLElement | null>(null)
const active = ref<string | null>(null)
const tocOffset = () => (toc.value?.offsetHeight ?? 0) + 16

function goTo(id: string) {
  const target = document.getElementById(id)
  if (!target) return
  window.scrollTo({
    top: target.getBoundingClientRect().top + window.scrollY - tocOffset() + 1,
    behavior: reducedMotion() ? 'auto' : 'smooth',
  })
  history.replaceState(history.state, '', `#${id}`)
}

function updateActive() {
  const offset = tocOffset()
  let current: string | null = null
  for (const { id } of sections) {
    const el = document.getElementById(id)
    if (el && el.getBoundingClientRect().top <= offset) current = id
  }
  active.value = current
}

// Sur mobile la sous-nav défile horizontalement : on garde le lien actif visible
watch(active, (id) => {
  const inner = toc.value?.firstElementChild as HTMLElement | null
  const link = inner?.querySelector<HTMLElement>(`[href="#${id}"]`)
  if (!inner || !link) return
  if (link.offsetLeft < inner.scrollLeft || link.offsetLeft + link.offsetWidth > inner.scrollLeft + inner.clientWidth) {
    inner.scrollLeft = link.offsetLeft - 16
  }
})

onMounted(() => {
  updateActive()
  window.addEventListener('scroll', updateActive, { passive: true })
})
onBeforeUnmount(() => window.removeEventListener('scroll', updateActive))

const whoami = [
  { key: 'nom', value: 'Adrien Marchand' },
  { key: 'alias', value: 'Hollux' },
  { key: 'âge', value: `${age} ans` },
  { key: 'base', value: 'Strasbourg, Alsace' },
  { key: 'métier', value: 'lead développeur web fullstack' },
  { key: 'en ce moment', value: 'projets perso & développement agentique' },
  { key: 'cherche', value: 'poste de lead dev, Alsace ou full-remote' },
]

const places = [
  { city: 'Alsace', note: "d'origine" },
  { city: 'Metz', note: '2 ans' },
  { city: 'Lyon', note: '3 ans, premier poste' },
  { city: 'Mulhouse', note: '2 ans' },
  { city: 'Strasbourg', note: "aujourd'hui" },
]

interface Chapter {
  period: string
  where: string
  title: string
  text: string[]
  hats?: { title: string; text: string }[]
  anecdote?: string
}

const chapters: Chapter[] = [
  {
    period: 'avant 2015',
    where: 'Électricité',
    title: 'Le premier métier',
    text: [
      "J'ai d'abord été technicien en électricité, mais ce métier n'était pas assez stimulant pour moi. J'ai donc changé de voie et suivi une formation de développeur / intégrateur web pour faire un travail qui me motive vraiment.",
    ],
  },
  {
    period: '2016 → 2019',
    where: 'Alcyon',
    title: 'Apprendre le métier',
    text: [
      "Un an et demi sur Symfony aux côtés du lead développeur, David De Sousa, qui m'a confié la refonte d'un site avec une seule directive : interdiction de regarder l'ancien code. Il voulait son expertise et mon œil neuf sur le développement orienté objet.",
      "À son départ, j'ai mis le nez partout : debug et maintenance en Zend Framework 1, une application Android en Java, un essai de Progressive Web App… pour finir par près de 6 mois sur Vue.js.",
    ],
  },
  {
    period: '2019',
    where: '2LE',
    title: 'Premiers pas en gestion de projet',
    text: ['Plusieurs projets en Symfony et Vue.js, dont une migration complète, et un premier rôle de chef de projet.'],
  },
  {
    period: '2021',
    where: 'Thuria',
    title: 'Un passage rapide',
    text: [
      "Je n'ai pas accroché avec WordPress, leur outil principal, mais mon goût pour le code complexe m'a permis d'y développer quelques modules particulièrement intéressants !",
    ],
  },
  {
    period: '2021 → 2023',
    where: 'Jaune de Mars',
    title: 'La rigueur sans framework',
    text: [
      "Pendant 2 ans, j'ai fait évoluer un code écrit from scratch avec le plus de rigueur possible : MVC, objet, SOLID. Chaque nouvel outil était un défi très intéressant.",
    ],
  },
  {
    period: '2023 → 2026',
    where: 'Sermes',
    title: '2 ans et demi qui en valaient 10',
    text: ['Lead développeur dans un petit service : des journées remplies, avec plusieurs casquettes à la fois.'],
    hats: [
      { title: 'Chef de projet', text: 'réunions avec le métier, décisions techniques, délais, développement démystifié' },
      { title: 'Scrum master', text: 'tickets, sprints, points projet' },
      { title: 'Développeur full stack', text: 'la plus grosse part : développements, tests, merge requests' },
      { title: 'Admin système', text: 'Docker, serveurs internes' },
      { title: 'Conseiller', text: 'réalisations des prestataires sur les 2 e-shops' },
    ],
    anecdote:
      "Sans compter la cyberattaque : il a fallu faire le tour de tous les PC de l'entreprise, de Strasbourg à Molsheim, en installant des Windows par paquets de 100.",
  },
  {
    period: '2026',
    where: 'En solo',
    title: 'Le temps de monter en compétences',
    text: [
      "Je consacre ce temps à mes projets : serveurs de dev et de prod, CI/CD avec Forgejo, sauvegardes externalisées, et surtout le développement agentique, en déléguant des tâches à des agents IA, toujours relues et maîtrisées.",
    ],
  },
]

const siteVersions = [
  { v: 'V1', text: 'pré-formation, à coup de tutoriels, tout en HTML / CSS' },
  { v: 'V2', text: 'post-formation, du vrai code avec un petit framework MVC maison' },
  { v: 'V3', text: "Symfony 3 : presque 2 ans de modules, jeux et tests en tous genres" },
  { v: 'V4', text: 'Symfony 4, où les modules reviennent tout doucement' },
  { v: 'V5', text: "Nuxt, aujourd'hui en version 4 : j'aime la réactivité de Vue.js", current: true },
]

const lab = [
  { step: 'Raspberry Pi', text: 'un premier petit serveur pour comprendre comment tournent mes sites' },
  { step: 'NUC', text: "plus de puissance, un environnement plus propre, avec l'intégration continue en ligne de mire" },
  { step: 'Mac', text: 'une machine bien plus adaptée au code que mon PC Windows' },
  { step: 'Docker', text: 'des environnements reproductibles et ses très nombreuses possibilités' },
  { step: 'Forgejo', text: 'CI/CD, déploiement automatisé, serveurs de dev et de prod séparés' },
]

const lookingFor = [
  {
    title: 'Ce que je fais de mieux',
    items: [
      'Des outils pratiques et utiles aux entreprises',
      'Gagner du temps, être plus précis et plus rapide',
      'Garder sa compétitivité dans un monde qui évolue vite',
    ],
  },
  {
    title: 'Les sujets qui me passionnent',
    items: [
      'Un framework JS : Vue.js ou React',
      'Un framework PHP récent côté serveur : Symfony ou Laravel',
      'Webservices, API, code propre, testé et stable',
      'Et pourquoi pas des applis mobiles ou des PWA',
    ],
  },
  {
    title: "L'environnement idéal",
    items: [
      'Télétravail',
      'Git et intégration continue',
      "Du vrai travail d'équipe",
      'Une bonne machine avec les programmes nécessaires',
    ],
  },
]

const passions = [
  {
    title: 'Jeux en tous genres',
    text: "Plateau, figurines, cartes, dés, jeux vidéo… Clairement attiré par la stratégie, ce qui a beaucoup développé ma réflexion : j'apprends très vite, avec une logique assez brute.",
    projects: ['Liminal', 'T.I.M.E Stories', 'Planechase MtG', 'Ludo Drive', 'Team builder Genshin'],
  },
  {
    title: 'Crawler RC',
    text: 'Du 4x4 radiocommandé depuis plusieurs années : un monde rempli de défis techniques, d’optimisation et de précision.',
  },
  {
    title: 'Cinéma, séries, BD',
    text: "De quoi alimenter les soirées… et quelques projets.",
    projects: ['Quizz cinéma', 'Timeline One Piece'],
  },
  {
    title: 'Guitare & jonglage',
    text: 'Pour occuper les mains autrement qu’au clavier. Le jonglage, parfois même avec du feu.',
  },
]
</script>

<template>
  <div class="esp">
    <section class="container">
      <h1>En savoir plus !</h1>
      <p class="lead">En bref : développeur web, Alsacien, apprend de tout.</p>
    </section>

    <nav ref="toc" class="toc" aria-label="Sommaire de la page">
      <div class="container toc-inner">
        <a
          v-for="(section, i) in sections"
          :key="section.id"
          :href="`#${section.id}`"
          :aria-current="active === section.id ? 'location' : undefined"
          @click.prevent="goTo(section.id)"
        >
          <span aria-hidden="true">{{ String(i + 1).padStart(2, '0') }}</span> {{ section.label }}
        </a>
      </div>
    </nav>

    <section id="qui" class="container">
      <h2>Qui suis-je ?</h2>
      <div class="who">
        <div class="terminal" role="group" aria-label="Fiche d'identité">
          <p class="prompt" aria-hidden="true">$ whoami</p>
          <dl>
            <template v-for="line in whoami" :key="line.key">
              <dt>{{ line.key }}</dt>
              <dd>{{ line.value }}</dd>
            </template>
          </dl>
        </div>
        <div>
          <p>
            Mon nom est <b>Adrien Marchand</b>, mais sur la toile on me connaît surtout sous le nom de <b>Hollux</b>.
          </p>
          <p>
            Je suis calme, presque flegmatique, mais aussi énergique et efficace : je déteste ne rien faire. Avide de
            connaissances, je suis toujours en quête de nouveaux défis pour m'occuper et progresser.
          </p>
          <p>
            J'écoute beaucoup les avis et les conseils de chacun pour me faire ma propre opinion et évoluer dans les
            domaines qui m'intéressent.
          </p>
          <p>
            J'ai découvert le web très jeune, à l'époque où il fallait presque une semaine pour télécharger
            (légalement !) un film. Depuis, je ne l'ai plus quitté.
          </p>
        </div>
      </div>

      <h3>Alsacien, avec quelques détours</h3>
      <ol class="route">
        <li v-for="place in places" :key="place.city">
          <b>{{ place.city }}</b>
          <span>{{ place.note }}</span>
        </li>
      </ol>
    </section>

    <div class="trait" />

    <section id="parcours" class="container">
      <h2>Les coulisses du parcours</h2>
      <p class="intro">
        Le <NuxtLink to="/cv">CV</NuxtLink> liste les missions ; ici, ce qu'il y avait autour.
      </p>
      <ol class="chapters">
        <li v-for="chapter in chapters" :key="chapter.where">
          <div class="chapter-meta">
            <span class="chapter-period">{{ chapter.period }}</span>
            <span class="chapter-where">{{ chapter.where }}</span>
          </div>
          <div class="chapter-body">
            <h3>{{ chapter.title }}</h3>
            <p v-for="paragraph in chapter.text" :key="paragraph">{{ paragraph }}</p>
            <ul v-if="chapter.hats" class="hats">
              <li v-for="hat in chapter.hats" :key="hat.title">
                <b>{{ hat.title }}</b>
                <span>{{ hat.text }}</span>
              </li>
            </ul>
            <p v-if="chapter.anecdote" class="anecdote">{{ chapter.anecdote }}</p>
          </div>
        </li>
      </ol>
    </section>

    <div class="trait" />

    <section id="labo" class="container">
      <h2>Le labo perso</h2>
      <p class="intro">
        À mes heures perdues, je réalise des projets divers et variés, par envie d'apprendre, de m'entraîner, mais aussi
        d'aider.
      </p>

      <div class="lab">
        <div>
          <h3>Ce site, 5 versions plus tard</h3>
          <ol class="versions">
            <li v-for="version in siteVersions" :key="version.v" :class="{ current: version.current }">
              <span class="version-num">{{ version.v }}</span>
              <span>{{ version.text }}</span>
            </li>
          </ol>
        </div>
        <div>
          <h3>Mes serveurs, pas à pas</h3>
          <ol class="steps">
            <li v-for="item in lab" :key="item.step">
              <b>{{ item.step }}</b>
              <span>{{ item.text }}</span>
            </li>
          </ol>
        </div>
      </div>

      <h3>Et pour les autres</h3>
      <ul class="others">
        <li>Un template WordPress pour la ludothèque où je suis bénévole, pour une administration simple pour eux</li>
        <li>Un drive pour cette même ludothèque, en Nuxt + Symfony, lié à leur outil de gestion Ludoprêt</li>
        <li>Un thème enfant WordPress et deux sites en Symfony 3 pour des clients</li>
        <li>Un outil web pour le jeu vidéo Genshin Impact</li>
        <li>Le site météo d'Horbourg-Wihr, avec ses graphiques et ses statistiques</li>
        <li>
          Le site du livre-énigme La Clef, avec ses contraintes techniques, ses secrets et certaines réalisations à
          l'aveugle à la demande des auteurs
        </li>
      </ul>
      <p><NuxtLink to="/realisations">Voir toutes les réalisations →</NuxtLink></p>
    </section>

    <div class="trait" />

    <section id="recherche" class="container">
      <h2>Ce que je cherche</h2>
      <p class="intro">
        Un poste de <b>lead développeur</b>, en <b>Alsace</b> ou en <b>full-remote</b>.
      </p>
      <ol class="looking">
        <li v-for="(block, i) in lookingFor" :key="block.title">
          <span class="looking-num" aria-hidden="true">{{ String(i + 1).padStart(2, '0') }}</span>
          <h3>{{ block.title }}</h3>
          <ul>
            <li v-for="item in block.items" :key="item">{{ item }}</li>
          </ul>
        </li>
      </ol>
    </section>

    <div class="trait" />

    <section id="passions" class="container">
      <h2>En dehors du code</h2>
      <p class="intro">Toujours en recherche de passe-temps stimulants… qui finissent souvent en projets.</p>
      <ul class="passions">
        <li v-for="passion in passions" :key="passion.title">
          <h3>{{ passion.title }}</h3>
          <p>{{ passion.text }}</p>
          <p v-if="passion.projects" class="passion-projects">
            <span class="passion-label">devenu projet :</span>
            <span v-for="project in passion.projects" :key="project" class="tag">{{ project }}</span>
          </p>
        </li>
      </ul>
    </section>

    <ButtonTrait to="mailto:holluxpanda@gmail.com" label="Envie d'en parler ? Écrivez-moi !" />
  </div>
</template>

<style scoped>
.esp ul,
.esp ol {
  list-style: none;
  padding: 0;
}

.esp li {
  margin: 0;
}

.esp section {
  scroll-margin-top: 80px;
}

.lead {
  font-size: 1.05rem;
}

.intro {
  max-width: 760px;
}

/* SOMMAIRE (collé en haut au défilement) */

.toc {
  position: sticky;
  top: 0;
  z-index: 10;
  margin: 14px 0 30px;
  padding: 10px 0;
  background: var(--c-bg);
  border-bottom: 1px solid var(--c-ink);
}

.toc-inner {
  display: flex;
  flex-wrap: wrap;
  gap: 8px;
}

.toc a {
  padding: 6px 14px;
  border: 1px solid var(--c-ink);
  background: var(--c-bg);
  font-size: 0.85rem;
  font-style: normal;
  text-decoration: none;
  white-space: nowrap;
  transition: background 0.2s, color 0.2s;
}

.toc a:hover {
  background: var(--c-hover);
}

.toc a[aria-current] {
  background: var(--c-ink);
  color: var(--c-on-ink);
}

.toc span {
  font-family: var(--f-title);
  font-weight: 700;
}

/* QUI SUIS-JE */

.who {
  display: grid;
  grid-template-columns: minmax(0, 1fr) minmax(0, 1.3fr);
  gap: 40px;
  align-items: start;
}

.terminal {
  padding: 22px 24px;
  background: var(--c-ink);
  color: var(--c-muted);
  box-shadow: 6px 6px 0 var(--c-muted);
  font-size: 0.9rem;
}

.prompt {
  margin: 0 0 14px;
  color: var(--c-on-ink);
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

.terminal dl {
  display: grid;
  grid-template-columns: auto 1fr;
  gap: 6px 16px;
  margin: 0;
}

.terminal dt::after {
  content: ' :';
}

.terminal dd {
  margin: 0;
  color: var(--c-on-ink);
}

.route {
  display: flex;
  flex-wrap: wrap;
  gap: 12px 0;
}

.route li {
  display: flex;
  flex-direction: column;
  flex: 1 1 0;
  min-width: 120px;
  position: relative;
  padding: 20px 10px 0 0;
}

/* Pastille sur une ligne continue */
.route li::before {
  content: '';
  position: absolute;
  top: 0;
  left: 0;
  width: 11px;
  height: 11px;
  background: var(--c-bg);
  border: 2px solid var(--c-ink);
  border-radius: 50%;
  z-index: 1;
}

.route li::after {
  content: '';
  position: absolute;
  top: 5px;
  left: 0;
  right: 0;
  border-top: 1px solid var(--c-ink);
}

.route li:last-child::before {
  background: var(--c-ink);
}

.route li:last-child::after {
  right: auto;
}

.route b {
  font-family: var(--f-title);
  color: var(--c-ink);
  text-transform: uppercase;
}

.route span {
  font-size: 0.85rem;
  font-style: italic;
}

/* PARCOURS */

.chapters > li {
  display: grid;
  grid-template-columns: 170px 1fr;
  gap: 30px;
  padding: 22px 0;
  border-top: 1px solid var(--c-muted);
}

.chapters > li:first-child {
  border-top: 0;
}

.chapter-meta {
  display: flex;
  flex-direction: column;
  text-align: right;
}

.chapter-period {
  font-size: 0.85rem;
}

.chapter-where {
  font-family: var(--f-title);
  font-size: 1.3rem;
  font-weight: 700;
  color: var(--c-ink);
}

.chapter-body h3 {
  margin: 0 0 10px;
}

.chapter-body p:last-child {
  margin-bottom: 0;
}

.hats {
  display: grid;
  grid-template-columns: repeat(auto-fill, minmax(190px, 1fr));
  gap: 10px;
  margin: 0 0 16px;
}

.hats li {
  display: flex;
  flex-direction: column;
  padding: 10px 12px;
  border: 1px solid var(--c-ink);
  font-size: 0.85rem;
}

.hats b {
  font-family: var(--f-title);
  color: var(--c-ink);
  text-transform: uppercase;
  font-size: 0.8rem;
}

.anecdote {
  position: relative;
  padding: 14px 18px 14px 50px;
  background: var(--c-soft);
  border-left: 3px solid var(--c-ink);
  font-style: italic;
}

.anecdote::before {
  content: '!';
  position: absolute;
  left: 18px;
  top: 10px;
  font-family: var(--f-title);
  font-size: 1.6rem;
  font-style: normal;
  font-weight: 700;
  color: var(--c-ink);
}

/* LABO */

.lab {
  display: grid;
  grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
  gap: 30px 40px;
  margin-bottom: 10px;
}

.versions li {
  display: grid;
  grid-template-columns: 50px 1fr;
  align-items: baseline;
  margin-bottom: 10px;
  font-size: 0.9rem;
}

.version-num {
  font-family: var(--f-title);
  font-size: 1.6rem;
  font-weight: 700;
  line-height: 1;
  color: transparent;
  -webkit-text-stroke: 1px var(--c-ink);
}

.versions li.current .version-num {
  color: var(--c-ink);
}

.steps {
  counter-reset: step;
}

.steps li {
  position: relative;
  display: flex;
  flex-direction: column;
  padding: 0 0 14px 26px;
  font-size: 0.9rem;
}

.steps li::before {
  content: '';
  position: absolute;
  top: 6px;
  left: 0;
  width: 9px;
  height: 9px;
  background: var(--c-ink);
}

.steps li:not(:last-child)::after {
  content: '';
  position: absolute;
  top: 15px;
  bottom: 0;
  left: 4px;
  border-left: 1px dashed var(--c-ink);
}

.steps b {
  color: var(--c-ink);
}

.others li {
  position: relative;
  margin-bottom: 6px;
  padding-left: 16px;
  font-size: 0.9rem;
}

.others li::before {
  content: '>';
  position: absolute;
  left: 0;
  font-weight: 700;
}

/* RECHERCHE */

.looking {
  display: grid;
  grid-template-columns: repeat(auto-fit, minmax(240px, 1fr));
  gap: 30px 24px;
}

.looking > li {
  display: grid;
  grid-row: span 3;
  grid-template-rows: subgrid;
  row-gap: 0;
}

.looking-num {
  font-family: var(--f-title);
  font-size: 2.8rem;
  font-weight: 700;
  line-height: 1;
  color: transparent;
  -webkit-text-stroke: 1px var(--c-ink);
}

.looking h3 {
  display: flex;
  align-items: flex-end;
  margin: 8px 0 12px;
  padding-bottom: 8px;
  border-bottom: 1px solid var(--c-ink);
}

.looking li li {
  position: relative;
  margin: 0 0 6px;
  padding-left: 16px;
  font-size: 0.9rem;
}

.looking li li::before {
  content: '>';
  position: absolute;
  left: 0;
  font-weight: 700;
}

/* PASSIONS */

.passions {
  display: grid;
  grid-template-columns: repeat(auto-fill, minmax(250px, 1fr));
  gap: 24px;
}

.passions > li {
  display: flex;
  flex-direction: column;
  padding: 20px 22px;
  border: 1px solid var(--c-ink);
  box-shadow: 6px 6px 0 var(--c-shadow);
  transition: transform 0.15s, box-shadow 0.15s;
}

.passions > li:hover {
  transform: translate(-2px, -2px);
  box-shadow: 8px 8px 0 var(--c-shadow);
}

.passions h3 {
  margin: 0 0 10px;
}

.passion-projects {
  display: flex;
  flex-wrap: wrap;
  align-items: center;
  gap: 6px;
  margin: auto 0 0;
  padding-top: 8px;
}

.passion-label {
  font-size: 0.8rem;
  font-style: italic;
}

.tag {
  padding: 2px 8px;
  background: var(--c-ink);
  color: var(--c-on-ink);
  font-size: 0.75rem;
}

@media (max-width: 767px) {
  /* Une seule ligne qui défile horizontalement, pour ne pas manger l'écran */
  .toc-inner {
    flex-wrap: nowrap;
    overflow-x: auto;
    scrollbar-width: none;
  }

  .toc-inner::-webkit-scrollbar {
    display: none;
  }

  .who {
    grid-template-columns: 1fr;
    gap: 24px;
  }

  .chapters > li {
    grid-template-columns: 1fr;
    gap: 8px;
  }

  .chapter-meta {
    flex-direction: row-reverse;
    justify-content: flex-end;
    align-items: baseline;
    gap: 12px;
    text-align: left;
  }

  /* Trajet vertical sur mobile */
  .route {
    flex-direction: column;
    gap: 0;
  }

  .route li {
    padding: 0 0 14px 26px;
  }

  .route li::after {
    top: 0;
    bottom: 0;
    left: 5px;
    right: auto;
    border-top: 0;
    border-left: 1px solid var(--c-ink);
  }

  .route li:last-child::after {
    display: none;
  }
}

@media (prefers-reduced-motion: reduce) {
  .prompt::after {
    animation: none;
  }

  .passions > li,
  .toc a {
    transition: none;
  }
}
</style>
