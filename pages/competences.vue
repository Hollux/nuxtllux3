<template>
  <div class="competences">
    <div class="container">
      <h1>COMPÉTENCES : LANGAGES ET OUTILS UTILISÉS POUR LE DÉVELOPPEMENT WEB</h1>
    </div>
    <languages />
    <div class="trait"></div>
    <frameworks /> 
    <div class="trait"></div>
    <cms />
    <div class="trait"></div>
    <systemes />
    <div class="trait"></div>
    <autres />
  </div>
</template>

<script>
import Languages from "~/pages/competences/languages.vue";
import Frameworks from "~/pages/competences/frameworks.vue";
import Cms from "~/pages/competences/cms.vue";
import Autres from "~/pages/competences/autres.vue";
import Systemes from "~/pages/competences/systemes.vue";

export default {
  components: {
    Languages,
    Frameworks,
    Cms,
    Systemes,
    Autres
  }
};
</script>

<style lang="scss" scoped>
img {
  width: 150px;
}
</style>