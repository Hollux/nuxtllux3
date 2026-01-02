<template>
  <div class="container">
    <template v-for="row in rowSites">
      <h2>{{ row.h2 }}</h2>
      <p>{{ row.comment }}</p>
      <b-row class="grid">
        <b-col v-for="(appli, index) in row.sites" :key="index" class="item-col">
          <div class="item-card">
            <template v-if="appli.lienExterne">
              <a :href="appli.lienExterne" target="_blank" class="img-link">
                <b-img :src="appli.img" fluid :alt="appli.imgAlt" class="item-img"></b-img>
              </a>
            </template>
            <template v-else>
              <nuxt-link :to="appli.lien" class="img-link">
                <b-img :src="appli.img" fluid :alt="appli.imgAlt" class="item-img"></b-img>
              </nuxt-link>
            </template>
            <div class="item-content">
              <h3 class="item-title">{{ appli.titre }}</h3>
              <p v-html="appli.content" class="item-text"></p>
            </div>
          </div>
        </b-col>
      </b-row>

    </template>
  </div>
</template>

<script>
export default {
  data() {
    return {
      rowSites: [
        {
          h2: "Sites Web actifs",
          comment: "Ces sites sont toujours en ligne et accessibles au public.",
          sites: [
            {
              titre: "La Clef : Astolie",
              content:
                "<p>Site web pour les livres d'énigmes <b>La Clef : Astolie</b> pour <a href='https://www.laclef.online' target='_blank' title='La clef - site par Hollux'>La Clef'</a>.<br />Réalisé en <b>React</b> avec de nombreux secrets, spécificité lié aux énigmes des livres, des outils sur les pages.</p>",
              img: require("~/assets/img/realisations/laclefmin.png"),
              imgAlt: "laclef",
              lienExterne: "https://www.laclef.online/"
            },
            {
              titre: "Meteo Horbourg-Wihr",
              content:
                "<p><b>Site météo</b> pour la commune d'horbourg-wihr. Sauvegarde des relevés météo avec utilisation dans des graphiques et statistiques.<br />Réalisé en <b>nuxt</b> avec intégration d'une API météo.</p>",
              img: require("~/assets/img/realisations/meteohw.png"),
              imgAlt: "meteohw",
              lienExterne: "https://meteohw.hollux.fr/"
            },
            {
              titre: "SOLVEIG DE CUYPER",
              content:
                "<p><b>Site vitrine</b> pour <a href='https://www.solveigdc.fr/' target='_blank' title='Solveig De Cuyper - site par Hollux'>Solveig De Cuyper'</a>, graphiste webdesigner.<br />Réalisé en <b>Symfony 3</b> avec mise en place d’outils spécifiques (portfolio, filtres).</p>",
              img: require("~/assets/img/realisations/solveigdcMin.jpg"),
              imgAlt: "solveigdcfr",
              lienExterne: "https://www.solveigdc.fr/"
            },
            {
              titre: "HARICOT DE CASTELNAUDARY",
              content:
                "<b>Site vitrine</b> pour <a href='http://haricotdecastelnaudary.fr/' target='_blank' title='Le Haricot de Castelnaudary - site par Hollux'>Le haricot de Castelnaudary</a>, un label visant à promouvoir le haricot lingot du Languedoc. <br />Réalisation sur-mesure en <b>MVC</b>.",
              img: require("~/assets/img/realisations/haricotfr.jpg"),
              imgAlt: "haricotfr",
              lienExterne: "~/assets/img/realisations/haricotfrMin.jpg"
            }
          ]
        },
        {
          h2: "Sites web inactifs",
          comment: "Ces sites ne sont plus en ligne, mais restent des références de réalisations.",
          sites: [
            {
              titre: "LUDO DRIVE",
              content:
                "<b>Drive de jeux de société</b> pour la <a href='https://ludodrive-horbourg-wihr.site/' target='_blank' title='ludodrive - prod'>ludothèque de Horbourg-Wihr</a>, créé afin d'éviter la propagation du COVID. <p>Réalisé en <b>nuxt</b> (front) et <b>symfony</b> (api), et lié à leur outil de gestion Ludoprêt.</p>",
              img: require("~/assets/img/realisations/ludodrive.png"),
              imgAlt: "ludodrive",
              lienExterne: "https://ludo.hollux.pw/"
            },
            {
              titre: "Chroniques de waral",
              content:
                "<b>Site vitrine administrable</b> pour le jeu <a href='https://www.chroniquesdewaral.fr/' target='_blank' title='Chroniques de Waral - site par Hollux'>Chroniques de Waral</a>. <br />Première version en <b>Symfony 3</b>, puis adaptation et migration du site sur <b>Wordpress</b>.",
              img: require("~/assets/img/realisations/chroniqueswaralMin.jpg"),
              imgAlt: "chroniquesfr",
              lienExterne: "https://www.chroniquesdewaral.fr/"
            }
          ]
        }
      ],
    };
  }
};
</script>
<style lang="scss" scoped></style>