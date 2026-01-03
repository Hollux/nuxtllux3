<template>
  <div class="container frameworks">
    <h2>Frameworks</h2>
    <b-row align="center" class="grid">
      <b-col align="center" class="item-col" v-for="(outil, index) in frameworks" :key="index">
        <b-img :src="outil.img" fluid :alt="outil.alt" style="min-width: 80px; min-height: 80px;" />
      </b-col>
    </b-row>
    <b-row align="center" class="legende mepspeciale">
      <b-col align="center" class="item-col" v-for="(outil, index) in frameworks" :key="index">
        <p>{{ outil.titre }}</p>
      </b-col>
    </b-row>
  </div>
</template>

<script>
export default {
  data() {
    return {
      frameworks: [
        {
          img: require("~/assets/img/competences/vuejs.png"),
          alt: "vuejs",
          titre: "Vue.JS"
        },
        {
          img: require("~/assets/img/competences/symfony.png"),
          alt: "symfony",
          titre: "Symfony"
        },
        {
          img: require("~/assets/img/competences/bootstrap.jpg"),
          alt: "bootstrap",
          titre: "Bootstrap"
        },
        {
          img: require("~/assets/img/competences/laravel.png"),
          alt: "laravel",
          titre: "Laravel"
        },
        {
          img: require("~/assets/img/competences/react.svg"),
          alt: "react",
          titre: "React"
        },
        {
          img: require("~/assets/img/competences/jquery.png"),
          alt: "jquery",
          titre: "jQuery"
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