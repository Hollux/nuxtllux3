<template>
  <div class="container">
    <h2>Sites Web publique</h2>
    <b-row v-for="(applis, index) in rowSites" class="center" :key="index">
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
      rowSites: [
        [
          {
            titre: "Chroniques de waral",
            content:
              "<b>Site vitrine administrable</b> pour le jeu <a href='https://www.chroniquesdewaral.fr/' target='_blank' title='Chroniques de Waral - site par Hollux' >Chroniques de Waral</a>. <br />Première version en <b>Symfony 3</b>, puis adaptation et migration du site sur <b>Wordpress</b>.",
            img: require("~/assets/img/realisations/chroniqueswaralMin.jpg"),
            imgAlt: "chroniquesfr",
            lienExterne: "https://www.chroniquesdewaral.fr/"
          },
          {
            titre: "SOLVEIG DE CUYPER",
            content:
              " <p><b>Site vitrine</b> pour <a href='https://www.solveigdc.fr/' target='_blank' title='Solveig De Cuyper - site par Hollux'> Solveig De Cuyper</a>, graphiste webdesigner.<br />Réalisé en <b>Symfony 3</b> avec mise en place d’outils spécifiques (portfolio, filtres).</p>",
            img: require("~/assets/img/realisations/solveigdcMin.jpg"),
            imgAlt: "solveigdcfr",
            lienExterne: "https://www.solveigdc.fr/"
          },
          {
            titre: "HARICOT DE CASTELNAUDARY",
            content:
              "<b>Site vitrine</b> pour <a href='http://haricotdecastelnaudary.fr/' target='_blank' title='Le Haricot de Castelnaudary - site par Hollux'>Le haricot de Castelnaudary</a>, un label visant à promouvoir le haricot lingot du Languedoc. <br />Réalisation sur-mesure en <b>MVC</b>.",
            img: require("~/assets/img/realisations/listBuilder.png"),
            imgAlt: "haricotfr",
            lienExterne: "~/assets/img/realisations/haricotfrMin.jpg"
          }
        ],
        [
          {
            titre: "MODULE PDF",
            content:
              "Outil de visualisation de PDF, toujours utile sur un site web.",
            img: require("~/assets/img/realisations/modulepdf.png"),
            imgAlt: "haricotfr",
            lienExterne: "https://sf3.hollux.fr/viewpdf/adrien_marchand_cv"
          }
        ]
      ]
    };
  }
};
</script>
<style lang="scss" scoped>
</style>