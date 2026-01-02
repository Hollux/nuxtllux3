<template>
  <div class="projets">
    <div class="container">
      <h2>Exemple de sites développés par hollux</h2>

      <div class="sites">
        <div
          class="site"
          v-for="(site, index_s) in sites"
          :key="'site_' + index_s"
        >
          <template v-if="site.lienExterne">
            <a :href="site.lienExterne" target="_blank">
              <b-img :src="site.img" fluid-grow :alt="site.imgAlt"></b-img>
            </a>
          </template>
          <template v-else-if="site.lien">
            <nuxt-link :to="site.lien">
              <b-img :src="site.img" fluid-grow :alt="site.imgAlt"></b-img>
            </nuxt-link>
          </template>
          <template v-else>
            <b-img :src="site.img" fluid-grow :alt="site.imgAlt"></b-img>
          </template>

          <h3>{{ site.titre }}</h3>
          <p v-html="site.content"></p>
        </div>
      </div>
    </div>
    <button-trait linkName="VOIR TOUTES LES RÉALISATIONS" link="realisations" />
  </div>
</template>

<script>
import ButtonTrait from "~/components/miseEnForme/buttonTrait.vue";

export default {
  components: {
    ButtonTrait,
  },
  data() {
    return {
      sites: [
        {
          titre: "GENSHIN BUILDER",
          content:
            "<b>Outil web</b> pour le site <a href='https://genshin-impact.fr/team' target='_blank' title='Genshin Builder'>Genshin Impact FR</a>, un site permettant de présenter des équipes pour le jeu Genshin Impact. <br />Réalisation sur-mesure en <b>Nuxt / Symfony</b> chargé par Iframe.",
          img: require("~/assets/img/realisations/gifr.png"),
          imgAlt: "genshin-builder",
          lienExterne: "~/assets/img/realisations/gifr.png",
        },
        {
          titre: "LUDO DRIVE",
          content:
            "<b>Drive de jeux de société</b> pour la <a href='https://www.ludotheque-horbourg-wihr.net/' target='_blank' title='ludodrive - prod'>ludothèque de Horbourg-Wihr</a>, créé afin d'éviter la propagation du COVID. <p>Réalisé en <b>Nuxt</b> (front) et <b>Symfony</b> (api), et lié à leur outil de gestion Ludoprêt.</p> ",
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
    };
  },
};
</script>