<template>
  <div class="technos">
    <div class="container">
      <h2>technologies web de prédilection</h2>
      <b-row class="center techno">
        <b-col md>
          <b-img src="~/assets/img/competences/vuejs.png" fluid alt="vuejs"></b-img>
          <h3>VUE.JS</h3>
          <p>
            <b>Vue.JS</b> permet de créer des
            sites web rapides et des
            applications web (PWA).<br/>
            C’est le framework
            front-end que je préfère,
            pour sa flexibilité et ses
            nombreuses possibilités.
          </p>
        </b-col>
        <b-col md>
          <b-img src="~/assets/img/competences/symfony.png" fluid alt="symfony"></b-img>
          <h3>SYMFONY</h3>
          <p>
            <b>Symfony</b> (versions 3, 4 et
            5) est un framework PHP très complet.<br/>Je l’utilise pour gérer la
            partie back-end des sites
            sur lesquels j’interviens.
          </p>
        </b-col>
        <b-col md>
          <b-img src="~/assets/img/competences/js.png" fluid alt="javascript"></b-img>
          <h3>JAVASCRIPT</h3>
          <p>
            <b>Javascript</b> est un langage
            qui peut être utilisé dans
            tous les aspects d’un site
            internet.<br/>Il permet à la
            fois de gérer l’affichage
            de la page et la discussion avec le serveur.
          </p>
        </b-col>
      </b-row>
    </div>
    <button-trait linkName="VOIR TOUTES LES TECHNOLOGIES QUE J’UTILISE" link="competences" />
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