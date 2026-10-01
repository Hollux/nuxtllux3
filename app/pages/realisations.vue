<script setup lang="ts">
useSeoMeta({
  title: 'Réalisations',
  description: "Sites et applications web réalisés par Hollux, pour des clients ou à titre personnel.",
})
</script>

<template>
  <div>
    <div class="container">
      <h1>Réalisations web par Hollux</h1>
      <p>
        Vous trouverez ici mes réalisations de <b>sites et applications web</b>, pour des clients ou personnelles. Pour
        voir du code, direction
        <a href="https://github.com/Hollux" target="_blank" rel="noopener">mon GitHub</a> !
      </p>
    </div>
    <div class="trait" />

    <section class="container">
      <h2>Sites web actifs</h2>
      <p>Ces sites sont toujours en ligne et accessibles au public.</p>
      <div class="cards">
        <ProjectCard title="La Clef" img="/img/realisations/laclefmin.png" url="https://www.laclef.online/">
          <p>
            Site web pour les livres d'énigmes <b>La Clef</b>.<br />
            Réalisé en <b>React</b> avec de nombreux secrets, des spécificités liées aux énigmes des livres et des outils
            sur les pages.
          </p>
        </ProjectCard>
        <ProjectCard title="Météo Horbourg-Wihr" img="/img/realisations/meteohw.png" url="https://meteohw.hollux.fr/">
          <p>
            <b>Site météo</b> ciblé sur la commune d'Horbourg-Wihr. Sauvegarde des relevés météo avec visualisation dans
            des graphiques et statistiques.<br />
            Réalisé en <b>Nuxt</b> avec intégration d'une API météo.
          </p>
        </ProjectCard>
        <ProjectCard title="Solveig De Cuyper" img="/img/realisations/solveigdcMin.jpg" url="https://www.solveigdc.fr/">
          <p>
            <b>Site vitrine</b> pour Solveig De Cuyper, graphiste webdesigner.<br />
            Réalisé en <b>Symfony 3</b> avec mise en place d'outils spécifiques (portfolio, filtres).
          </p>
        </ProjectCard>
      </div>
    </section>

    <section class="container">
      <h2>Sites web inactifs</h2>
      <p>Ces sites ne sont plus en ligne, ou ont été refaits depuis, mais restent des références de réalisations.</p>
      <div class="cards">
        <ProjectCard title="Ludo Drive" img="/img/realisations/ludodrive.png">
          <p>
            <b>Drive de jeux de société</b> pour la ludothèque de Horbourg-Wihr, créé pour que leur activité puisse
            continuer malgré l'épidémie de COVID.<br />
            Réalisé en <b>Nuxt</b> (front) et <b>Symfony</b> (API), et lié à leur outil de gestion Ludoprêt.
          </p>
        </ProjectCard>
        <ProjectCard title="Haricot de Castelnaudary" img="/img/realisations/haricotfr.jpg">
          <p>
            <b>Site vitrine</b> pour Le Haricot de Castelnaudary, un label visant à promouvoir le haricot lingot du
            Languedoc.<br />
            Réalisation sur-mesure en <b>MVC</b>, le site a depuis été refait sur WordPress.
          </p>
        </ProjectCard>
        <ProjectCard title="Chroniques de Waral" img="/img/realisations/chroniqueswaralMin.jpg">
          <p>
            <b>Site vitrine administrable</b> pour le jeu Chroniques de Waral.<br />
            Première version en <b>Symfony 3</b>, puis adaptation et migration du site sur <b>WordPress</b>.
          </p>
        </ProjectCard>
      </div>
    </section>

    <div class="trait" />

    <section class="container">
      <h2>Applis web perso</h2>
      <div class="cards">
        <ProjectCard title="Quizz cinéma" img="/img/realisations/quizzcinema.jpg" url="https://cinequizz.hollux.fr/cinequizz">
          <p>Mini-jeu pour tester vos connaissances en cinéma.<br />Réalisé en <b>Vue.js</b>.</p>
        </ProjectCard>
        <ProjectCard
          title="Conception list builder"
          img="/img/realisations/listBuilder.png"
          url="https://sf3.hollux.fr/listbuilde/"
        >
          <p>
            Test de création d'un outil de conception de liste pour un jeu de figurines, basé sur Warhammer.<br />
            Réalisé en <b>Vue.js</b>.
          </p>
        </ProjectCard>
        <ProjectCard
          title="Module PDF"
          img="/img/realisations/modulepdf.png"
          url="https://sf3.hollux.fr/viewpdf/solveig-de-cuyper_cv_da-junior"
        >
          <p>Outil de visualisation de PDF, toujours utile sur un site web.</p>
        </ProjectCard>
        <ProjectCard title="Tutos code fun" img="/img/realisations/tutoshollux.jpg" url="https://sf3.hollux.fr/tutos/">
          <p>
            Réalisation fun de tutos code pour me perfectionner. Très inspiré par la Désencyclopédie ainsi que « Les
            tutos » de Jérôme Niel.<br />Réalisé en <b>Symfony 3</b>.
          </p>
        </ProjectCard>
      </div>
    </section>
  </div>
</template>
