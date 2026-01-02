<template>
  <div class="realisations">
    <div class="container">
      <h1>RÉALISATIONS WEB PAR HOLLUX</h1>
      <p>
        Vous trouverez ici mes réalisations de
        <b>sites et applications web</b>, pour des clients ou personnelles. Pour
        voir du code, direction
        <a
          href="https://github.com/Hollux"
          target="_blank"
          title="Github Hollux / Adrien Marchand"
          >mon github</a
        >
        !
      </p>
    </div>
    <div
      class="container"
      v-for="(type, index) in types"
      :key="'type_' + index"
    >
      <div class="trait"></div>
      <h2>{{ type.title }}</h2>

      <div class="sites">
        <div
          class="site"
          v-for="(site, index_s) in type.sites"
          :key="'site_' + index + '_' + index_s"
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
  </div>
</template>

<script>
import SitesWeb from "~/components/pages/realisations/sitesWeb.vue";
import ApplisWeb from "~/components/pages/realisations/applisWeb.vue";
import FunWeb from "~/components/pages/realisations/funWeb.vue";

export default {
  components: {
    SitesWeb,
    ApplisWeb,
    FunWeb,
  },
  data() {
    return {
      types: [
        {
          title: "Sites Web publics",
          sites: [
            {
              titre: "GENSHIN BUILDER",
              content:
                "<b>Outil web</b> pour le site <a href='https://genshin-impact.fr/team' target='_blank' title='Genshin Builder'>Genshin Impact FR</a>, un site permettant de présenter des équipes pour le jeu Genshin Impact. <br />Réalisation sur-mesure en <b>Nuxt / Symfony</b> chargé par Iframe.",
              img: require("~/assets/img/realisations/gifr.png"),
              imgAlt: "genshin-builder",
              lienExterne: "https://genshin-impact.fr/team",
            },
            {
              titre: "LUDO DRIVE",
              content:
                "<b>Drive de jeux de société</b> pour la <a href='https://www.ludotheque-horbourg-wihr.net/' target='_blank' title='ludodrive - prod'>ludothèque de Horbourg-Wihr</a>, créé afin d'éviter la propagation du COVID. <p>Réalisé en <b>Nuxt</b> (front) et <b>Symfony</b> (api), et lié à leur outil de gestion Ludoprêt.</p> ",
              img: require("~/assets/img/realisations/ludodrive.png"),
              imgAlt: "ludodrive",
              lienExterne: "https://ludodrive.ludotheque-horbourg-wihr.net/",
            },
            {
              titre: "SOLVEIG DE CUYPER",
              content:
                "<p><b>Site vitrine</b> pour <a href='https://www.solveigdc.fr/' target='_blank' title='Solveig De Cuyper - site par Hollux'> Solveig De Cuyper'</a>, graphiste webdesigner.<br />Réalisé en <b>Symfony 3</b> avec mise en place d’outils spécifiques (portfolio, filtres).</p>",
              img: require("~/assets/img/realisations/solveigdcMin.jpg"),
              imgAlt: "solveigdcfr",
              lienExterne: "https://www.solveigdc.fr/",
            },
            {
              titre: "Chroniques de Waral",
              content:
                "<b>Site vitrine administrable</b> pour le jeu <a href='https://www.chroniquesdewaral.fr/' target='_blank' title='Chroniques de Waral - site par Hollux' >Chroniques de Waral</a>. <br />Première version en <b>Symfony 3</b>, puis adaptation et migration du site sur <b>Wordpress</b>.",
              img: require("~/assets/img/realisations/chroniqueswaralMin.jpg"),
              imgAlt: "chroniquesfr",
              lienExterne: "https://www.chroniquesdewaral.fr/",
            },
          ],
        },
        {
          title: "Applis web perso",
          sites: [
            {
              titre: "Quizz cinema",
              content:
                "Mini-jeu pour tester vos connaissances en cinéma.<br/>Réalisé en <b>Vue.JS</b>.",
              img: require("~/assets/img/realisations/quizzcinema.jpg"),
              imgAlt: "quizz cine",
              lienExterne: "https://www.hollux.fr/miniquizz/",
            },
            {
              titre: "MODULE PDF",
              content:
                "Outil de visualisation de PDF, toujours utile sur un site web.",
              img: require("~/assets/img/realisations/modulepdf.png"),
              imgAlt: "module pdf",
              lienExterne:
                "https://sf3.hollux.fr/viewpdf/adrien_marchand_cv_2023",
            },
            {
              titre: "TUTOS CODE FUN",
              content:
                "Réalisation fun de tutos code pour me perfectionner. Très inspiré par la Désencyclopédie ainsi que 'Les tutos' de Jérôme Niel.<br/>Réalisé en <b>Symfony 3</b>.",
              img: require("~/assets/img/realisations/tutoshollux.jpg"),
              imgAlt: "tutos",
              lienExterne: "https://sf3.hollux.fr/tutos/",
            },
          ],
        },
        {
          title: "Anciens sites, réalisation fun, outil en cour",
          sites: [
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
            {
              titre: "HARICOT DE CASTELNAUDARY",
              content:
                "<b>Ancien site vitrine</b> pour <a href='http://haricotdecastelnaudary.fr/' target='_blank' title='Le Haricot de Castelnaudary - site par Hollux'>Le haricot de Castelnaudary</a>, un label visant à promouvoir le haricot lingot du Languedoc. <br />Réalisation sur-mesure en <b>MVC</b>.",
              img: require("~/assets/img/realisations/haricotfr.jpg"),
              imgAlt: "haricotfr",
            },
          ],
        },
      ],
    };
  },
};
</script>