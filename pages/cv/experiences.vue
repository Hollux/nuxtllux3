<template>
  <div>
    <h4>Expériences professionnelles & Formations</h4>
    <div v-for="experience in experiences" :key="experience.index" class="experiencefor">
      <b-row>
        <b-col offset-sm="1" sm="6">{{ experience.periodes }}</b-col>
        <b-col sm="5">
          <b>{{ experience.titre }}</b>
        </b-col>
      </b-row>
      <b-row>
        <b-col offset-xs="6" offset-sm="7">{{experience.text}}</b-col>
      </b-row>
    </div>
  </div>
</template>

<script>
export default {
  data() {
    return {
      experiences: [
        {
          periodes: "Juin 2019 à novembre 2019",
          titre: "Chef de projet développeur",
          text:
            "Lorem ipsum, dolor sit amet consectetur adipisicing elit. Ullam impedit delectus, cupiditate molestiae ab sequi,"
        },
        {
          periodes: "Mars 2016 à Janvier 2019",
          titre: "Développeur full stack",
          text: "rrrrrrr"
        },
        {
          periodes: "Septembre 2018",
          titre: "Formations VueJS",
          text: "rrrrrrr"
        },
        {
          periodes: "Janvier 2017",
          titre: "Formations Symfony : SFC3 / SFC4",
          text: "rrrrrrr"
        },
        {
          periodes: "Octobre à décembre 2015",
          titre: "Formation Développeur / intégrateur",
          text: "rrrrrrr"
        },
        {
          periodes: "Janvier 2011 à Décembre 2014",
          titre: "Formation et travail en tant que Technicien en éléctricité",
          text: "rrrrrrr"
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