<template>
  <div class="container">
    <p>Applis web</p>
    <b-row v-for="(applis, index) in rowApplis" class="center" :key="index">
      <b-col md v-for="(appli, index) in applis" :key="index">
        <nuxt-link :to="appli.lien">
          <b-img :src="appli.img" fluid-grow :alt="appli.imgAlt"></b-img>
        </nuxt-link>
        <p>{{ appli.titre }}</p>
        <p>{{ appli.content }}</p>
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
              "Mini-jeu pour tester vos connaissances en cinéma. Réalisé en Vue.JS.",
            img: require("~/assets/img/realisations/chroniquesfr.jpg"),
            imgAlt: "quizz cine",
            lien: "miniquizz"
          },
          {
            titre: "RANDOM SMASH UP",
            content:
              "Outil de choix de factions aléatoire pour le jeu SmashUP. Création personnelle, pour rajouter du fun lors des parties entre amis. Réalisé en Symfony 3.",
            img: require("~/assets/img/realisations/smashUp.png"),
            imgAlt: "smashup",
            lien: "randomsmashup"
          },
          {
            titre: "CONCEPTION LIST BUILDER",
            content:
              "Test de création d’un outil de création de liste pour un jeu de figurine. Cet outil est un test basé sur Warhammer. Réalisé en Vue.JS.",
            img: require("~/assets/img/realisations/listBuilder.png"),
            imgAlt: "list builder",
            lien: "/"
          }
        ],
        [
          {
            titre: "MODULE PDF",
            content:
              "Outil de visualisation de PDF, toujours utile sur un site web.",
            img: require("~/assets/img/realisations/chroniquesfr.jpg"),
            imgAlt: "module pdf",
            lien: "/"
          },
          {
            titre: "TUTOS CODE FUN",
            content:
              "Réalisation fun de tutos code pour me perfectionner. Très inspiré par la Désencyclopédie. Réalisé en Symfony 3.",
            img: require("~/assets/img/realisations/tutos.png"),
            imgAlt: "tutos",
            lien: "/"
          }
        ]
      ]
    };
  }
};
</script>

<style lang="scss" scoped>
</style>