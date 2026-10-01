<script setup lang="ts">
useSeoMeta({
  title: '',
  ogTitle: 'Hollux, développeur web fullstack en Alsace',
})
</script>

<template>
  <div>
    <section class="container">
      <h1>Hollux, développeur web fullstack en Alsace</h1>
      <p>
        Je suis <b>Hollux</b>, aka Adrien Marchand, <b>développeur web</b> à la recherche d'opportunités autour de
        <b>Strasbourg</b> en <b>Alsace</b> (Strasbourg / Sélestat / Colmar).<br />
        Principalement expérimenté en <b>Symfony</b> pour le back-end, je me suis aussi orienté vers <b>Vue.js</b> et
        <b>React</b> pour la réactivité du front-end. Mon but est de créer des sites et des outils web <b>rapides</b> et
        <b>flexibles</b>.
      </p>
      <p>Si vous cherchez un <b>développeur</b> pour gérer votre site de A à Z, vous êtes au bon endroit !</p>
    </section>
    <ButtonTrait to="/ensavoirplus" label="En savoir plus sur moi" />

    <section class="container">
      <h2>technologies web de prédilection</h2>
      <div class="cards technos">
        <div>
          <NuxtImg format="webp" src="/img/competences/vuejs.png" alt="Vue.js" width="150" densities="x1 x2" loading="lazy" />
          <h3>Vue.js</h3>
          <p>
            <b>Vue.js</b> permet de créer des sites web rapides et des applications web (PWA).<br />
            C'est le framework front-end que je préfère, pour sa flexibilité et ses nombreuses possibilités.
          </p>
        </div>
        <div>
          <NuxtImg format="webp" src="/img/competences/symfony.png" alt="Symfony" width="150" densities="x1 x2" loading="lazy" />
          <h3>Symfony</h3>
          <p>
            <b>Symfony</b> est un framework PHP très complet.<br />
            Je l'utilise pour gérer la partie back-end des sites sur lesquels j'interviens.
          </p>
        </div>
        <div>
          <NuxtImg format="webp" src="/img/competences/js.png" alt="JavaScript" width="150" densities="x1 x2" loading="lazy" />
          <h3>JavaScript</h3>
          <p>
            <b>JavaScript</b> est un langage qui peut être utilisé dans tous les aspects d'un site internet.<br />
            Il permet à la fois de gérer l'affichage de la page et la discussion avec le serveur.
          </p>
        </div>
      </div>
    </section>
    <ButtonTrait to="/competences" label="Voir toutes les technologies que j'utilise" />

    <section class="container">
      <h2>derniers sites développés par hollux</h2>
      <div class="cards">
        <ProjectCard title="La Clef" img="/img/realisations/laclefmin.png" url="https://www.laclef.online/">
          <p>
            Site web pour les livres d'énigmes <b>La Clef</b>.<br />
            Ce projet cache de nombreux défis et secrets, réalisé en <b>React</b>.
          </p>
        </ProjectCard>
        <ProjectCard title="Météo Horbourg-Wihr" img="/img/realisations/meteohw.png" url="https://meteohw.hollux.fr/">
          <p>
            <b>Support météo</b> basé sur la commune d'Horbourg-Wihr. Sauvegarde des relevés météo avec visualisation
            dans des graphiques et statistiques.<br />
            Réalisé en <b>Nuxt / Symfony</b> avec intégration d'une API météo.
          </p>
        </ProjectCard>
        <ProjectCard title="Solveig De Cuyper" img="/img/realisations/solveigdcMin.jpg" url="https://www.solveigdc.fr/">
          <p>
            <b>Site vitrine</b> pour Solveig De Cuyper, graphiste et webdesigner.<br />
            Réalisé en <b>Symfony</b> avec mise en place d'outils spécifiques (portfolio, filtres).
          </p>
        </ProjectCard>
      </div>
    </section>
    <ButtonTrait to="/realisations" label="Voir toutes les réalisations" />
  </div>
</template>

<style scoped>
.technos img {
  width: 150px;
  margin-bottom: 10px;
}
</style>
