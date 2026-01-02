<template>
  <div class="container">
    <h2>Anciens sites, réalisation fun, outil en cour</h2>
    <b-row v-for="(applis, index) in rowSites" class="center" :key="index">
      <b-col md="4" v-for="(appli, index) in applis" :key="index">
        <template v-if="appli.lienExterne">
          <a :href="appli.lienExterne" target="_blank">
            <b-img :src="appli.img" fluid-grow :alt="appli.imgAlt"></b-img>
          </a>
        </template>
        <template v-else-if="appli.lien">
          <nuxt-link :to="appli.lien">
            <b-img :src="appli.img" fluid-grow :alt="appli.imgAlt"></b-img>
          </nuxt-link>
        </template>
        <template v-else>
          <b-img :src="appli.img" fluid-grow :alt="appli.imgAlt"></b-img>
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
      rowSites: [
        [
          {
            titre: "Chaos Planaire - MTG",
            content:
              "Site outil pour le jeu Magic The Gathering. Permet de générer des decks pour un type de jeu précis et d'ajouter cet outil à la partie. <br/> Réalisé en <b>Vue.JS</b>.",
            img: require("~/assets/img/realisations/planar.png"),
            imgAlt: "planar mtg",
            lienExterne: "https://planar.hollux.fr",
          },
          {
            titre: "RANDOM SMASH UP",
            content:
              "Outil de choix de factions aléatoire pour le jeu SmashUp, pour rajouter du fun lors des parties entre amis !<br/> Réalisé en <b>Symfony 3</b>. N'est plus fonctionnel car plus maintenu.",
            img: require("~/assets/img/realisations/smashUp.png"),
            imgAlt: "smashup",
            lienExterne: "https://sf3.hollux.fr/smashUp",
          },
          {
            titre: "CONCEPTION LIST BUILDER",
            content:
              "Test de création d’un outil de conception de liste pour un jeu de figurines. Cet outil est un test basé sur Warhammer.<br/>Réalisé en <b>Vue.JS</b>. N'est plus fonctionnel car plus maintenu.",
            img: require("~/assets/img/realisations/listBuilder.png"),
            imgAlt: "list builder",
            lienExterne: "https://sf3.hollux.fr/listbuilde/",
          },
        ],
        [
          {
            titre: "HARICOT DE CASTELNAUDARY",
            content:
              "<b>Ancien site vitrine</b> pour <a href='http://haricotdecastelnaudary.fr/' target='_blank' title='Le Haricot de Castelnaudary - site par Hollux'>Le haricot de Castelnaudary</a>, un label visant à promouvoir le haricot lingot du Languedoc. <br />Réalisation sur-mesure en <b>MVC</b>.",
            img: require("~/assets/img/realisations/haricotfr.jpg"),
            imgAlt: "haricotfr",
          },
        ],
      ],
    };
  },
};
</script>
<style lang="scss" scoped>
</style>