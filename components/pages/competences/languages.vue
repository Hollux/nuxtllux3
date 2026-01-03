<template>
  <div class="container languages">
    <h2>Langages</h2>
    <b-row align="center" class="grid">
      <b-col align="center" class="item-col" v-for="(outil, index) in languages" :key="index">
        <b-img :src="outil.img" fluid :alt="outil.alt" style="min-width: 80px; min-height: 80px;" />
      </b-col>
    </b-row>
    <b-row align="center" class="legende mepspeciale">
      <b-col align="center" class="item-col" v-for="(outil, index) in languages" :key="index">
        <p>{{ outil.titre }}</p>
      </b-col>
    </b-row>
  </div>
</template>

<script>
export default {
  data() {
    return {
      languages: [
        {
          img: require("~/assets/img/competences/html5.png"),
          alt: "html5",
          titre: "HTML"
        },
        {
          img: require("~/assets/img/competences/css3.png"),
          alt: "css3",
          titre: "CSS"
        },
        {
          img: require("~/assets/img/competences/php.png"),
          alt: "php",
          titre: "PHP"
        },
        {
          img: require("~/assets/img/competences/js.png"),
          alt: "js",
          titre: "JavaScript"
        },
        {
          img: require("~/assets/img/competences/sql.jpeg"),
          alt: "mysql",
          titre: "MySQL"
        },
        {
          img: require("~/assets/img/competences/less.png"),
          alt: "less",
          titre: "Less"
        }
      ]
    };
  }
};
</script>

<style lang="scss" scoped>
img {
  max-height: 90px;
  margin: 0 auto 15px;
}

@media (max-width: 767px) {
  .legende {
    display: none;
  }
}

@media (min-width: 576px) and (max-width: 992px) {
  .mepspeciale {
    display: none;
  }
}
</style>