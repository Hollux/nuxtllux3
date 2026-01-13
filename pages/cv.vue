<template>
  <div class="cv-top">
    <div class="container">
      <b-row class="center-horiz">
        <b-col cols="2">
          <b-img src="~/assets/img/base/tete.webp" fluid alt="Fluid image"></b-img>
        </b-col>
        <b-col>
          <h1>Curriculum vitae d'Hollux / Adrien Marchand</h1>
          <p>
            Je recherche un poste de <b>lead développeur</b> en <b>Alsace</b> ou en <b>full-remote</b>.
            <br />Start-up, grosse société ou agence, toute entreprise peut me convenir tant qu’on y trouve des
            <b>projets stimulants</b> et des
            <b>passionnés de code</b> avec qui échanger !
          </p>
        </b-col>
      </b-row>
    </div>
    <button-trait-externe linkName="Télécharger le CV (PDF)" link="https://sf3.hollux.fr/viewpdf/adrien_marchand_cv" />
    <div class="cvHeader cv container">
      <p class="fauxh1"><b>Adrien Marchand</b> - LEAD DÉVELOPPEUR</p>
      <b-row>
        <b-col cols="auto" class="mr-auto">
        </b-col>
        <b-col cols="auto">
          <p>Permis B + véhicule</p>
        </b-col>
      </b-row>
      <div>
        <p>Né le 19 mars 1991</p>
      </div>
      <div>
        <p>holluxpanda@gmail.com</p>
      </div>
    </div>
    <div class="cv marginContainer" style="display:flex;flex-direction: row;">
      <div class="cvLeft">
        <competences />
        <formations />
        <plus />
      </div>
      <div class="cvRight">
        <experiences />
        <trait-au-milieu />
        <projets />
      </div>
    </div>
    <button-trait linkName="Mon profil vous intéresse ? Contactez-moi !" link="contact" />
  </div>
</template>


<script>
import Competences from "~/components/pages/cv/competences.vue";
import Experiences from "~/components/pages/cv/experiences.vue";
import Projets from "~/components/pages/cv/projets.vue";
import Plus from "~/components/pages/cv/plus.vue";
import TraitAuMilieu from "~/components/miseEnForme/traitAuMilieu.vue";
import ButtonTrait from "~/components/miseEnForme/buttonTrait.vue";
import ButtonTraitExterne from "~/components/miseEnForme/buttonTraitExterne.vue";
import Formations from "~/components/pages/cv/formations.vue";

export default {
  components: {
    Competences,
    Experiences,
    Projets,
    Plus,
    TraitAuMilieu,
    ButtonTrait,
    ButtonTraitExterne,
    Formations
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
  font-family: "Raleway", sans-serif;
  text-transform: uppercase;
  padding-bottom: 10px;
  font-weight: 700;
}

.cvHeader {
  background-color: black;
}

.cvHeader p {
  color: rgb(199, 196, 196);
  margin-bottom: 0;
}

.cv p {
  margin-bottom: 0;
}

.center-horiz {
  align-items: center;
}

.trait {
  margin-bottom: 0;
}

.cvLeft {
  width: 25%;
  padding-left: 20px;
  padding-right: 10px;
  border-right: 1px solid black;
}

.cvRight {
  width: 75%;
  padding-left: 20px;
}

/* Container maison :  */
.marginContainer {
  border: 1px solid black;
  width: 100%;
  margin-right: auto;
  margin-left: auto;
}

@media (min-width: 576px) {
  .marginContainer {
    max-width: 540px;
  }
}

@media (min-width: 768px) {
  .marginContainer {
    max-width: 720px;
  }
}

@media (min-width: 992px) {
  .marginContainer {
    max-width: 960px;
  }
}

@media (min-width: 1200px) {
  .marginContainer {
    max-width: 1140px;
  }
}
</style>