<template>
  <div class="container autres">
    <h2>Autres outils de développement</h2>
    <b-row align="center" class="grid">
      <b-col align="center" class="item-col" v-for="(outil, index) in autres" :key="index">
        <b-img :src="outil.img" fluid :alt="outil.alt" style="min-width: 80px; min-height: 80px;" />
      </b-col>
    </b-row>
    <b-row align="center" class="legende mepspeciale">
      <b-col align="center" class="item-col" v-for="(outil, index) in autres" :key="index">
        <p>{{ outil.titre }}</p>
      </b-col>
    </b-row>
  </div>
</template>

<script>
export default {
  data() {
    return {
      autres: [
        {
          img: require("~/assets/img/competences/docker.png"),
          alt: "docker",
          titre: "Docker"
        },
        {
          img: require("~/assets/img/competences/github.png"),
          alt: "github",
          titre: "GitHub"
        },
        {
          img: require("~/assets/img/competences/mySQL.png"),
          alt: "mysql",
          titre: "MySQL"
        },
        {
          img: require("~/assets/img/competences/githubcopilot.png"),
          alt: "githubcopilot",
          titre: "GitHub Copilot"
        },
        {
          img: require("~/assets/img/competences/mammouthai.png"),
          alt: "mammouthai",
          titre: "Mammouth AI"
        },
        {
          img: require("~/assets/img/competences/apache.jpg"),
          alt: "apache",
          titre: "Apache"
        },
        {
          img: require("~/assets/img/competences/xampp.png"),
          alt: "xampp",
          titre: "Xampp"
        },
        {
          img: require("~/assets/img/competences/easyphp.png"),
          alt: "easyphp",
          titre: "EasyPHP"
        },
        {
          img: require("~/assets/img/competences/filezilla.png"),
          alt: "filezilla",
          titre: "FileZilla"
        },
        {
          img: require("~/assets/img/competences/ovh.png"),
          alt: "ovh",
          titre: "OVH"
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