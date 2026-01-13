<template>
  <div class="presentation">
    <div class="container">
      <h1>
        Hollux, développeur web fullstack en Alsace
      </h1>
      <p>
        Je suis <b>Hollux</b>, aka Adrien Marchand, <b>développeur web</b> à la recherche d'opportunités autour de
        <b>Strasbourg</b> en
        <b>Alsace</b> (Strasbourg / Sélestat / Colmar).<br />
        Principalement expérimenté en <b>Symfony</b> pour le back-end,
        je me suis aussi orienté aussi vers <b>Vue.JS</b> et <b>React</b> pour la réactivité du front-end. Mon but est
        de
        créer des sites et des outils web <b>rapides</b>
        et <b>flexibles</b>.
      </p>

      <p>
        Si vous cherchez un <b>développeur</b> pour gérer votre site de A à Z, vous êtes au bon endroit !
      </p>

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
