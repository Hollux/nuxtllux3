<template>
  <div class="cv container">
    <b-row>
      <b-col cols="auto" class="mr-auto">
        <b>Adrien Marchand</b>
      </b-col>
      <b-col cols="auto">Permis B + véhicule</b-col>
    </b-row>
    <div>Né le 19 mars 1991</div>
    <div>holluxpanda@gmail.com</div>
    <div class="text-center">
      <h3>DÉVELOPPEUR WEB FULL STACK VUEJS</h3>
    </div>
    <competences />
    <trait-au-milieu />
    <experiences />
    <trait-au-milieu />
    <projets />
    <trait-au-milieu />
    <plus />
  </div>
</template>


<script>
import Competences from "~/pages/cv/competences.vue";
import Experiences from "~/pages/cv/experiences.vue";
import Projets from "~/pages/cv/projets.vue";
import Plus from "~/pages/cv/plus.vue";
import TraitAuMilieu from "~/components/miseEnForme/traitAuMilieu.vue";

export default {
  components: {
    Competences,
    Experiences,
    Projets,
    Plus,
    TraitAuMilieu
  }
};
</script>

<style>
.cv {
  border: 1px solid black;
}
</style>