<template>
  <div class="container">
    <h2>Applis web perso</h2>
    <b-row v-for="(applis, index) in rowApplis" class="center" :key="index">
      <b-col md="4" v-for="(appli, index) in applis" :key="index">
        <template v-if="appli.lienExterne">
          <a :href="appli.lienExterne" target="_blank">
            <b-img :src="appli.img" fluid-grow :alt="appli.imgAlt"></b-img>
          </a>
        </template>
        <template v-else>
          <nuxt-link :to="appli.lien">
            <b-img :src="appli.img" fluid-grow :alt="appli.imgAlt"></b-img>
          </nuxt-link>
        </template>
        <h3>{{ appli.titre }}</h3>
        <p v-html="appli.content"></p>
        <br />
      </b-col>
    </b-row>
  </div>
</template>

<script>
export default {
  data() {
    return {
      rowApplis: [
        [
          {
            titre: "Quizz cinema",
            content:
              "Mini-jeu pour tester vos connaissances en cinéma.<br/>Réalisé en <b>Vue.JS</b>.",
            img: require("~/assets/img/realisations/quizzcinema.jpg"),
            imgAlt: "quizz cine",
            lienExterne: "https://www.hollux.fr/miniquizz/"
          },
          {
            titre: "RANDOM SMASH UP",
            content:
              "Outil de choix de factions aléatoire pour le jeu SmashUp, pour rajouter du fun lors des parties entre amis !<br/> Réalisé en <b>Symfony 3</b>.",
            img: require("~/assets/img/realisations/smashUp.png"),
            imgAlt: "smashup",
            lienExterne: "https://sf3.hollux.fr/smashUp"
          },
          {
            titre: "CONCEPTION LIST BUILDER",
            content:
<<<<<<< HEAD
              "Test de création d’un outil de création de liste pour un jeu de figurine. Cet outil est un test pour une commandebasé sur Warhammer.<br/>Réalisé en <b>Symfony 3</b>.",
=======
              "Test de création d’un outil de conception de liste pour un jeu de figurines. Cet outil est un test basé sur Warhammer.<br/>Réalisé en <b>Vue.JS</b>.",
>>>>>>> a4848f0c12d1292da8f4717681956052dc655fce
            img: require("~/assets/img/realisations/listBuilder.png"),
            imgAlt: "list builder",
            lienExterne: "https://sf3.hollux.fr/listbuilde/"
          }
        ],
        [
          {
            titre: "MODULE PDF",
            content:
              "Outil de visualisation de PDF, toujours utile sur un site web.",
            img: require("~/assets/img/realisations/modulepdf.png"),
            imgAlt: "module pdf",
            lienExterne:
              "https://sf3.hollux.fr/viewpdf/solveig-de-cuyper_cv_da-junior"
          },
          {
            titre: "TUTOS CODE FUN",
            content:
              "Réalisation fun de tutos code pour me perfectionner. Très inspiré par la Désencyclopédie ainsi que 'Les tutos' de Jérôme Niel.<br/>Réalisé en <b>Symfony 3</b>.",
            img: require("~/assets/img/realisations/tutoshollux.jpg"),
            imgAlt: "tutos",
            lienExterne: "https://sf3.hollux.fr/tutos/"
          }
        ]
      ]
    };
  }
};
</script>

<style lang="scss" scoped>
</style>