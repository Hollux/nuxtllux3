<script setup lang="ts">
useSeoMeta({
  title: 'CV',
  description: "Curriculum vitae d'Adrien Marchand (Hollux), lead développeur web : expériences, compétences, formations.",
})

const experiences = [
  {
    period: "Août 2023 à aujourd'hui",
    title: 'Lead Développeur',
    company: 'Sermes',
    text: "Développement d'outils internes en Symfony / React / SQL. Analyse et réalisation des demandes internes, gestion des serveurs, relation avec les clients / prestataires / autres développeurs, gestion de projet. Encadrement de l'équipe de développement web, collaboration avec l'équipe AS400 gérant l'ERP de l'entreprise.",
  },
  {
    period: 'Novembre 2021 à août 2023',
    title: 'Développeur Full Stack',
    company: 'Jaune de Mars',
    text: "Administration et évolution d'un outil complet de gestion d'ascenseurs : clients, appareils, techniciens, tickets, suivi des interventions, API, etc. Site PHP « fait main » avec évolutions MVC / objet s'inspirant des frameworks modernes.",
  },
  {
    period: 'Juillet à novembre 2021',
    title: 'Développeur Full Stack',
    company: 'Agence Thuria',
    text: 'Création de sites administrables avec modules de gestion pour les offices de tourisme, entièrement réalisés en WordPress / PHP, Twig, JS.',
  },
  {
    period: 'Juin à novembre 2019',
    title: 'Chef de projet / Développeur Full Stack',
    company: '2LE',
    text: "Migration d'un site de Symfony 2 vers Symfony 4 + Vue.js. Gestion de projet web.",
  },
  {
    period: 'Mars 2016 à janvier 2019',
    title: 'Développeur Full Stack',
    company: 'Alcyon France',
    text: "Travail sur la refonte du site d'Alcyon en Symfony 3 pendant 2 ans (site marchand, accès privé, catalogue en ligne, applications web à destination des vétérinaires). Maintenance de l'ancien site sous Zend Framework 1. Développement d'une application Android en Java. Recherches pour la création d'une progressive web app.",
  },
]
</script>

<template>
  <div>
    <div class="container intro">
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
    <ButtonTrait to="https://sf3.hollux.fr/viewpdf/adrien_marchand_cv" label="Télécharger le CV (PDF)" />

    <article class="container cv">
      <header class="cv-header">
        <p class="cv-name"><b>Adrien Marchand</b> - lead développeur</p>
        <div class="cv-infos">
          <p>Né le 19 mars 1991</p>
          <p>Permis B + véhicule</p>
        </div>
        <p><a href="mailto:holluxpanda@gmail.com">holluxpanda@gmail.com</a></p>
      </header>

      <div class="cv-body">
        <aside class="cv-left">
          <h2>Compétences</h2>
          <ul>
            <li>Langages : <b>PHP</b>, <b>JS</b>, HTML, CSS, SQL, Sass</li>
            <li><b>Docker</b> (configuration et gestion).</li>
            <li><b>Symfony, Vue.js</b>, React, Laravel</li>
            <li>Outils d'<b>IA</b> : GitHub Copilot, Mammouth, ChatGPT</li>
            <li>Gestion complète de <b>serveur Linux</b> (DNS, Apache, Docker, BDD)</li>
            <li>Divers : Git, Captcha, Analytics, notions de SEO.</li>
          </ul>

          <h2>Formations</h2>
          <ul>
            <li><b>Septembre 2018 : Formation Vue.js</b> par Zenika</li>
            <li><b>Janvier 2017 : Formations Symfony SFC3 - SFC4</b> par SensioLabs</li>
            <li><b>Octobre à décembre 2015 : Formation de développeur / intégrateur</b> à 3WAcademy</li>
          </ul>

          <h2>Langues</h2>
          <ul>
            <li><b>Français</b> : langue maternelle</li>
            <li><b>Anglais</b> (bonne compréhension)</li>
            <li>Allemand (notions)</li>
          </ul>

          <h2>Loisirs</h2>
          <ul>
            <li>Développement, jeux, modélisme, séries & cinéma, bricolage, guitare.</li>
          </ul>
        </aside>

        <div class="cv-right">
          <h2>Expériences professionnelles</h2>
          <ul class="experiences">
            <li v-for="xp in experiences" :key="xp.period">
              <p>
                <b>{{ xp.period }} : {{ xp.title }}</b> // <i>{{ xp.company }}</i>
              </p>
              <p>{{ xp.text }}</p>
            </li>
          </ul>

          <div class="trait mid" />

          <h2>Projets personnels</h2>
          <ul>
            <li><b>2024</b> : Développement du site du livre-énigme La Clef en React.</li>
            <li><b>2021-2026</b> : Réalisation d'un site d'outil météorologique de la ville d'Horbourg-Wihr en Nuxt + Symfony.</li>
            <li><b>2022-2025</b> : Développement d'un outil « team builder » en Nuxt + Symfony pour le fansite Genshin Impact FR.</li>
            <li>
              <b>2020-2021</b> : Création pour une ludothèque d'un drive lié à leur outil Ludoprêt, en Symfony + Vue.js.
              Adaptation navigateur du jeu de société TIME Stories en Symfony + Vue.js.
            </li>
            <li>Mise en place de serveurs : Raspberry / NUC, Apache, PHP, Node.js, Docker, SSL, SQL, multisite sous Linux.</li>
            <li>Diverses autres réalisations en usage privé à des fins d'apprentissage ou simplement d'outils personnels.</li>
          </ul>
        </div>
      </div>
    </article>

    <ButtonTrait to="/contact" label="Mon profil vous intéresse ? Contactez-moi !" />
  </div>
</template>

<style scoped>
.intro {
  display: flex;
  align-items: center;
  gap: 30px;
}

.intro img {
  flex: 0 0 160px;
  width: 160px;
}

.cv {
  padding: 0;
  border: 1px solid var(--c-ink);
}

.cv-header {
  padding: 33px 35px;
  background: var(--c-ink);
}

.cv-header p,
.cv-header a {
  color: var(--c-muted);
  margin: 0;
}

.cv-header .cv-name {
  margin: 0 0 40px;
  font-family: var(--f-title);
  font-size: 1.3rem;
  text-transform: uppercase;
}

.cv-infos {
  display: flex;
  justify-content: space-between;
  flex-wrap: wrap;
  gap: 0 1rem;
}

.cv-body {
  display: grid;
  grid-template-columns: 1fr 3fr;
}

.cv-left {
  padding: 0 10px 20px 20px;
  border-right: 1px solid var(--c-ink);
}

.cv-right {
  padding: 0 20px 20px;
}

.cv-body li p {
  margin-bottom: 0;
}

.experiences li {
  margin-bottom: 1.5rem;
}

.trait.mid {
  width: 50%;
  margin: 0 auto;
}

@media (max-width: 767px) {
  .intro {
    flex-direction: column;
    text-align: center;
  }

  .cv-header {
    padding: 20px;
  }

  .cv-body {
    grid-template-columns: 1fr;
  }

  .cv-left {
    padding: 0 20px;
    border-right: 0;
    border-bottom: 1px solid var(--c-ink);
  }
}
</style>
