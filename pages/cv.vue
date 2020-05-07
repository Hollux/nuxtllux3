<template>
  <div class="cv-top">
    <div class="container">
      <b-row class="center-horiz">
        <b-col cols="2">
          <b-img src="~/assets/img/base/tete.png" fluid alt="Fluid image"></b-img>
        </b-col>
        <b-col>
          <h1>
            Curriculum vitae d'Hollux / Adrien Marchand
          </h1>
          <p>
            Je recherche un poste de <b>développeur web fullstack</b> ou <b>front-end</b> en <b>Alsace</b>.<br/>
            Start-up, grosse société ou agence, toute entreprise peut me convenir tant qu’on y trouve des <b>projets stimulants</b> et des <b>passionnés de code</b> avec qui échanger !
          </p>
        </b-col>
      </b-row>
    </div>
    <button-trait linkName="Télécharger le CV (PDF)" link="#" />
    <div class="cv container">
      <b-row>
        <b-col cols="auto" class="mr-auto">
          <p><b>Adrien Marchand</b></p>
        </b-col>
        <b-col cols="auto"><p>Permis B + véhicule</p></b-col>
      </b-row>
      <div><p>Né le 19 mars 1991</p></div>
      <div><p>holluxpanda@gmail.com</p></div>
      <div class="text-center">
        <p class="fauxh1">DÉVELOPPEUR WEB FULLSTACK SYMFONY / VUE.JS</p>
      </div>
      <competences />
      <trait-au-milieu />
      <experiences />
      <trait-au-milieu />
      <projets />
      <trait-au-milieu />
      <plus />
    </div>
    <button-trait linkName="Mon profil vous intéresse ? Contactez-moi !" link="contact" />
 </div>
</template>


<script>
import Competences from "~/pages/cv/competences.vue";
import Experiences from "~/pages/cv/experiences.vue";
import Projets from "~/pages/cv/projets.vue";
import Plus from "~/pages/cv/plus.vue";
import TraitAuMilieu from "~/components/miseEnForme/traitAuMilieu.vue";
import ButtonTrait from "~/components/miseEnForme/buttonTrait.vue";


export default {
  components: {
    Competences,
    Experiences,
    Projets,
    Plus,
    TraitAuMilieu,
    ButtonTrait
  }
};
</script>

<style>
.cv.container {
  border: 1px solid black;
  padding: 33px 35px;
}
.fauxh1 {
  font-size: 1.3rem;
  margin: 25px auto 40px;
  font-family: 'Raleway', sans-serif;
  text-transform: uppercase;
  padding-bottom: 10px;
  font-weight: 700;
}
.cv p {
  margin-bottom: 0;
}
.center-horiz {
  align-items: center;
}
.trait {
  margin-bottom:0;
}

</style>