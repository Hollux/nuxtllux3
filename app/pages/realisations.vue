<script setup lang="ts">
useSeoMeta({
  title: 'Réalisations',
  description: "Sites et applications web réalisés par Hollux, pour des clients ou à titre personnel.",
})
</script>

<template>
  <div class="realisations">
    <div class="container">
      <h1>Réalisations web par Hollux</h1>
      <p>
        Vous trouverez ici mes réalisations de <b>sites et applications web</b>, pour des clients ou personnelles.
      </p>
    </div>
    <div class="trait" />

    <section class="container">
      <h2>Sites web actifs</h2>
      <p>Ces sites sont toujours en ligne et accessibles au public.</p>
      <div class="cards cards--4">
        <ProjectCard title="La Clef" img="/img/realisations/laclefmin.png" url="https://www.laclef.online/">
          <p>
            Site web pour les livres d'énigmes <b>La Clef</b>.<br />
            Réalisé en <b>React</b> avec de nombreux secrets, des spécificités liées aux énigmes des livres et des outils
            sur les pages.
          </p>
        </ProjectCard>
        <ProjectCard title="Genshin Team Builder" img="/img/realisations/genshin-team.png" url="https://www.genshin-impact.fr/team/">
          <p>
            <b>Outil complet d'aide à la création d'équipe</b> pour le jeu Genshin Impact.<br />
            Deuxième version, développée en <b>plugin WordPress</b> avec une interface d'administration complète.
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
      <h2>Applis web perso</h2>
      <p>Des projets personnels, pour le plaisir de jouer et d'expérimenter, tous en ligne.</p>
      <div class="cards cards--3">
        <ProjectCard title="Liminal" img="/img/realisations/liminal.png" url="https://liminal.hollux.fr/liminal">
          <p>
            <b>Jeu de cartes roguelike</b> en deckbuilding, en solo contre un bot.<br />
            Réalisé en <b>React</b> et <b>Symfony</b>, avec toutes les règles calculées côté serveur et des parties
            sauvegardées.
          </p>
        </ProjectCard>
        <ProjectCard title="Patrimoine" img="/img/realisations/patrimoine.png" url="https://patrimoine.hollux.fr">
          <p>
            <b>Tableau de bord</b> pour conseiller en gestion de patrimoine : clients, tâches, mails et agenda réunis,
            avec Claude comme assistant via un connecteur MCP.<br />
            Réalisé en <b>Next.js</b>.
          </p>
        </ProjectCard>
        <ProjectCard title="Timeline One Piece" img="/img/realisations/timeline.png" url="https://timeline.hollux.fr/timeline">
          <p>
            <b>Frise chronologique interactive</b> de l'univers One Piece, avec filtres par catégories et zone
            anti-spoiler.<br />
            Réalisé en <b>React</b> et <b>Symfony</b>, avec une administration et un import depuis le wiki.
          </p>
        </ProjectCard>
        <ProjectCard title="T.I.M.E Stories" img="/img/realisations/timestories.png" url="https://sandbox.hollux.fr/time-stories">
          <p>
            Adaptation web du <b>jeu de plateau coopératif</b> T.I.M.E Stories : parties, joueurs, réceptacles et
            missions.<br />
            Réalisé en <b>React</b> et <b>Symfony</b>, en temps réel avec Mercure.
          </p>
        </ProjectCard>
        <ProjectCard title="Planechase MtG" img="/img/realisations/planar.png" url="https://planar.hollux.fr/planar">
          <p>
            <b>Support de jeu</b> pour le format Planechase de Magic: The Gathering : création de decks de plans et
            gestion de la partie.<br />
            Réalisé en <b>React</b>.
          </p>
        </ProjectCard>
        <ProjectCard title="Quizz cinéma" img="/img/realisations/quizzcinema.jpg" url="https://cinequizz.hollux.fr/cinequizz">
          <p>
            <b>Mini-jeu</b> pour tester vos connaissances en cinéma : deviner un film à partir d'une affiche
            minimaliste.<br />
            Réalisé en <b>React</b>.
          </p>
        </ProjectCard>
      </div>
    </section>

    <div class="trait" />

    <section class="container">
      <h2>Sites web inactifs</h2>
      <p>Ces sites ne sont plus en ligne, ou ont été refaits depuis, mais restent des références de réalisations.</p>
      <div class="cards cards--3">
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
  </div>
</template>

<style scoped>
.realisations .container {
  max-width: 1400px;
}

@media (min-width: 1100px) {
  .cards--4 {
    grid-template-columns: repeat(4, 1fr);
  }

  .cards--3 {
    grid-template-columns: repeat(3, 1fr);
  }
}
</style>
