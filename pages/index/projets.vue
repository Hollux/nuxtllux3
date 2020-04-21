<template>
  <div class="projets">
    <div class="container">
      <h5>derniers sites développés par hollux</h5>
      <b-row class="center techno">
        <b-col md>
          <b-img src="~/assets/img/realisations/chroniquesfr.jpg" fluid-grow alt="chroniquesfr"></b-img>
          <h6>VUE.JS</h6>
          <p>
            Site vitrine administrable
            pour le jeu de société
            Chroniques de Waral.
            Première version réalisée en
            Symfony3, puis adaptation et
            migration du site sur
            Wordpress.
          </p>
        </b-col>
        <b-col md>
          <b-img src="~/assets/img/realisations/solveigdcfr.jpg" fluid-grow alt="solveigfr"></b-img>
          <h6>SYMFONY</h6>
          <p>
            Site vitrine pour Solveig De
            Cuyper, graphiste et webdesigner. Réalisé en Symfony3
            avec mise en place d’outils
            spécifiques : (portfolio,
            filtres).
          </p>
        </b-col>
        <b-col md>
          <b-img
            src="~/assets/img/realisations/haricotfr.jpg"
            fluid-grow
            alt="haricots de castelnaudary"
          ></b-img>
          <h6>JAVASCRIPT</h6>
          <p>
            Site vitrine pour Le haricot
            de Castelnaudary, un label
            visant à promouvoir le
            haricot lingot du Languedoc.
            Réalisation sur-mesure en
            MVC.
          </p>
        </b-col>
      </b-row>
    </div>
    <button-trait linkName="VOIR TOUTES LES RÉALISATIONS" link="realisations" />
  </div>
</template>

<script>
import ButtonTrait from "~/components/miseEnForme/buttonTrait.vue";

export default {
  components: {
    ButtonTrait
  }
};
</script>