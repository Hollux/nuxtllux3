<template>
  <div class="projets">
    <div class="container">
      <h2>derniers sites développés par hollux</h2>
      <b-row class="center techno">
        <b-col md>
          <b-img src="~/assets/img/realisations/chroniqueswaral.jpg" fluid-grow alt="chroniquesfr"></b-img>
          <h3>Chroniques de Waral</h3>
          <p>
            <b>Site vitrine administrable</b>
            pour le jeu de société
            <a href="https://www.chroniquesdewaral.fr/" target="_blank" title="Chroniques de Waral - site par Hollux">Chroniques de Waral</a>.<br/>
            Première version réalisée en
            <b>Symfony3</b>, puis adaptation et
            migration du site sur
            <b>Wordpress</b>.
          </p>
        </b-col>
        <b-col md>
          <b-img src="~/assets/img/realisations/solveigdc.jpg" fluid-grow alt="solveigfr"></b-img>
          <h3>Solveig De Cuyper</h3>
          <p>
            <b>Site vitrine</b> pour <a href="https://www.solveigdc.fr/" target="_blank" title="Solveig De Cuyper - site par Hollux">Solveig De
            Cuyper</a>, graphiste et webdesigner.<br/>Réalisé en <b>Symfony3</b>
            avec mise en place d’outils
            spécifiques (portfolio,
            filtres).
          </p>
        </b-col>
        <b-col md>
          <b-img
            src="~/assets/img/realisations/haricotfr.jpg"
            fluid-grow
            alt="haricots de castelnaudary"
          ></b-img>
          <h3>Haricot de Castelnaudary</h3>
          <p>
            <b>Site vitrine</b> pour <a href="http://haricotdecastelnaudary.fr/" target="_blank" title="Le Haricot de Castelnaudary - site par Hollux">Le haricot
            de Castelnaudary</a>, un label
            visant à promouvoir le
            haricot lingot du Languedoc.<br/>
            Réalisation sur-mesure en
            <b>MVC</b>.
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