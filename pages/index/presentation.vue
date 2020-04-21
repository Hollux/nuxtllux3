<template>
  <div class="presentation">
    <div class="container">
      <b-row>
        <b-col cols="2">
          <b-img src="~/assets/img/base/tete.png" fluid alt="Fluid image"></b-img>
        </b-col>
        <b-col>
          <h3>
            <b>Hollux, developpeur web fullstack en Alsace</b>
          </h3>
          <p>
            Je suis
            <b>Hollux</b>, aka Adrien Marchand,
            <b>développeur web</b> à la recherche d'opportunités autour de
            <b>Strasbourg</b> et
            <b>Alsace</b> (Strasbourg / Séléstat, Colmar).
            Après une première expérience de développement plutôt orientée back-end (Symfony 3 et 4),je
            me suis intéressé à Vue.JS et à son potentiel pour créer des sites rapides et des applications web.
            Je peux développer votre site administrable, vitrine ou e-commerce, complètement sur-mesure
            ou basé sur un CMS, à partir de différentes technologies que vous trouverez ici.
          </p>
        </b-col>
      </b-row>
      <div class="center">
        <p>
          Si vous cherchez un
          <b>développeur fullstack</b> pour gérer votre site de A à Z, vous êtes au bon endroit !
        </p>
      </div>
    </div>

    <button-trait linkName="En savoir plus sur moi" link="enSavoirPlus" />
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
