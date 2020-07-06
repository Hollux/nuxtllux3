<template>
  <div>
    <h2>Expériences professionnelles & Formations</h2>
    <div v-for="experience in experiences" :key="experience.index" class="experiencefor">
      <b-row>
        <b-col offset-sm="1" sm="4">
          <p>{{ experience.periodes }}</p>
        </b-col>
        <b-col sm="7">
          <p>
            <b>{{ experience.titre }}</b>
            <i>{{ experience.personne }}</i>
          </p>
        </b-col>
      </b-row>
      <b-row>
        <b-col offset-xs="6" offset-sm="5">
          <p v-html="experience.text"></p>
        </b-col>
      </b-row>
      <br />
    </div>
  </div>
</template>

<script>
export default {
  data() {
    return {
      experiences: [
        {
          periodes: "Juin à novembre 2019",
          titre: "Chef de projet / Développeur fullstack",
          personne: "// 2LE",
          text:
            "Migration d’un site de Symfony 2 vers <b>Symfony 4</b> + <b>Vue.JS</b> avec gestion hors-ligne.<br/>Gestion de projet.<br/>Utilisation de EasyAdmin+ et Maker.js."
        },
        {
          periodes: "Mars 2016 à janvier 2019",
          titre: "Développeur fullstack",
          personne: "// Alcyon",
          text:
            "Travail sur la refonte du site d’Alcyon en <b>Symfony 3</b> pendant 2 ans (site marchand, accès privé, catalogue en ligne, applications web à destination des vétérinaires).<br/>Maintenance de l’ancien site sous <b>Zend Framework 1</b>.<br/>Développement d’une application Android en <b>Java</b>.<br/>Recherches pour la création d'une <b>progressive web app</b>."
        },
        {
          periodes: "Septembre 2018",
          titre: "Formation Vue.JS",
          personne: "// Zenika",
          text: ""
        },
        {
          periodes: "Janvier 2017",
          titre: "Formations Symfony : SFC3 / SFC4",
          personne: "// Sensiolabs",
          text: ""
        },
        {
          periodes: "Octobre à décembre 2015",
          titre: "Formation de Développeur / intégrateur",
          personne: "// 3WAcademy",
          text: ""
        },
        {
          periodes: "Janvier 2011 à décembre 2014",
          titre: "Formation et travail en tant que Technicien en électricité",
          personne: "",
          text: ""
        }
      ]
    };
  }
};
</script>

<style lang="scss" scoped>
.experiencefor {
  margin-bottom: 10px;
}
</style>