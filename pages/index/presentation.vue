<template>
  <div class="presentation">
    <div class="container">
          <h1>
            Hollux, développeur web fullstack en Alsace
          </h1>
          <p>
            Je suis <b>Hollux</b>, aka Adrien Marchand, <b>développeur web</b> à la recherche d'opportunités autour de <b>Strasbourg</b> en
            <b>Alsace</b> (Strasbourg / Sélestat / Colmar).<br/>
            Après une première expérience de développement principalement consacrée à <b>Symfony</b> (3 et 4) pendant presque 3 ans, je me suis orienté vers <b>Vue.JS</b>. Mon but est en effet de créer des sites et des applications web rapides et flexibles.

          </p>

        <p>
          Si vous cherchez un <b>développeur fullstack</b> pour gérer votre site de A à Z, vous êtes au bon endroit !
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
