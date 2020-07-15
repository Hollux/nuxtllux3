<template>
  <div class="container">
    <h2>Sites Web publics</h2>
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
            titre: "LUDO DRIVE",
            content:
              "<b>Drive de jeux de société</b> pour la <a href='https://ludodrive-horbourg-wihr.site/' target='_blank' title='ludodrive - prod'>ludothèque de Horbourg-Wihr</a>, créé afin d'éviter la propagation du COVID. <p>Réalisé en <b>nuxt</b> (front) et <b>symfony</b> (api), et lié à leur outil de gestion Ludoprêt.</p> ",
            img: require("~/assets/img/realisations/ludodrive.png"),
            imgAlt: "ludodrive",
            lienExterne: "https://ludo.hollux.pw/"
          },
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
              "<p><b>Site vitrine</b> pour <a href='https://www.solveigdc.fr/' target='_blank' title='Solveig De Cuyper - site par Hollux'> Solveig De Cuyper'</a>, graphiste webdesigner.<br />Réalisé en <b>Symfony 3</b> avec mise en place d’outils spécifiques (portfolio, filtres).</p>",
            img: require("~/assets/img/realisations/solveigdcMin.jpg"),
            imgAlt: "solveigdcfr",
            lienExterne: "https://www.solveigdc.fr/"
          }
        ],
        [
          {
            titre: "HARICOT DE CASTELNAUDARY",
            content:
              "<b>Site vitrine</b> pour <a href='http://haricotdecastelnaudary.fr/' target='_blank' title='Le Haricot de Castelnaudary - site par Hollux'>Le haricot de Castelnaudary</a>, un label visant à promouvoir le haricot lingot du Languedoc. <br />Réalisation sur-mesure en <b>MVC</b>.",
            img: require("~/assets/img/realisations/haricotfr.jpg"),
            imgAlt: "haricotfr",
            lienExterne: "~/assets/img/realisations/haricotfrMin.jpg"
          }
        ]
      ]
    };
  }
};
</script>
<style lang="scss" scoped>
</style>