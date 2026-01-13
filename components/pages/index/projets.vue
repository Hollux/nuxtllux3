<template>
  <div class="projets">
    <div class="container">
      <h2>Derniers sites développés par hollux</h2>
      <b-row class="center techno">
        <b-col md>
          <b-img src="~/assets/img/realisations/laclefmin.png" fluid-grow alt="laclef"></b-img>
          <h3>La Clef</h3>
          <p>
            Site web pour les livres d'énigmes <b><a href="https://www.laclef.online" target="_blank"
                title="La Clef - site par Hollux">La Clef</a>.</b>

            <br />Ce projet cache de nombreux défi et secrets, réalisé en <b>react</b>.
          </p>
        </b-col>
        <b-col md>
          <b-img src="~/assets/img/realisations/meteohw.png" fluid-grow alt="meteo horbourg-wihr"></b-img>
          <h3>Meteo Horbourg-Wihr</h3>
          <p>
            <b>Support meteo</b> basé sur la commune d'Horbourg-Wihr. Sauvegarde des
            relevés météo avec visualisation dans des graphiques et statistiques.
            <br />Réalisé en <b>nuxt / Symfony</b> avec intégration d'une API météo.
          </p>
        </b-col>
        <b-col md>
          <b-img src="~/assets/img/realisations/solveigdcMin.jpg" fluid-grow alt="solveigfr"></b-img>
          <h3>Solveig De Cuyper</h3>
          <p>
            <b>Site vitrine</b> pour
            <a href="https://www.solveigdc.fr/" target="_blank" title="Solveig De Cuyper - site par Hollux">
              Solveig De
              Cuyper
            </a>, graphiste et webdesigner.
            <br />Réalisé en
            <b>Symfony</b>
            avec mise en place d’outils
            spécifiques (portfolio,
            filtres).
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