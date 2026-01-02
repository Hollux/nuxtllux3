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
            titre: "GENSHIN BUILDER",
            content:
              "<b>Outil web</b> pour <a href='https://genshin-impact.fr/team' target='_blank' title='Genshin Builder'>Genshin Impact</a>, un site permettant de présenter des équipes pour le jeu Genshin Impact. <br />Réalisation sur-mesure en <b>Nuxt / Symfony</b> chargé par Iframe.",
            img: require("~/assets/img/realisations/gifr.png"),
            imgAlt: "genshin-builder",
            lienExterne: "~/assets/img/realisations/gifr.png",
          },
          {
            titre: "LUDO DRIVE",
            content:
              "<b>Drive de jeux de société</b> pour la <a href='https://www.ludotheque-horbourg-wihr.net/' target='_blank' title='ludodrive - prod'>ludothèque de Horbourg-Wihr</a>, créé afin d'éviter la propagation du COVID. <p>Réalisé en <b>nuxt</b> (front) et <b>symfony</b> (api), et lié à leur outil de gestion Ludoprêt.</p> ",
            img: require("~/assets/img/realisations/ludodrive.png"),
            imgAlt: "ludodrive",
            lienExterne: "https://ludodrive-horbourg-wihr.site/",
          },
          {
            titre: "SOLVEIG DE CUYPER",
            content:
              "<p><b>Site vitrine</b> pour <a href='https://www.solveigdc.fr/' target='_blank' title='Solveig De Cuyper - site par Hollux'> Solveig De Cuyper'</a>, graphiste webdesigner.<br />Réalisé en <b>Symfony 3</b> avec mise en place d’outils spécifiques (portfolio, filtres).</p>",
            img: require("~/assets/img/realisations/solveigdcMin.jpg"),
            imgAlt: "solveigdcfr",
            lienExterne: "https://www.solveigdc.fr/",
          },
        ],
        [
          {
            titre: "Chroniques de waral",
            content:
              "<b>Site vitrine administrable</b> pour le jeu <a href='https://www.chroniquesdewaral.fr/' target='_blank' title='Chroniques de Waral - site par Hollux' >Chroniques de Waral</a>. <br />Première version en <b>Symfony 3</b>, puis adaptation et migration du site sur <b>Wordpress</b>.",
            img: require("~/assets/img/realisations/chroniqueswaralMin.jpg"),
            imgAlt: "chroniquesfr",
            lienExterne: "https://www.chroniquesdewaral.fr/",
          },
        ],
      ],
    };
  },
};
</script>
<style lang="scss" scoped>
</style>