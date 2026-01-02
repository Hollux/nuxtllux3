<template>
  <div class="container autres">
    <h2>Autres outils de développement</h2>
    <b-row align="center" align-v="center" class="mepspeciale">
      <b-col cols="2" offset-lg="2" lg="1">
        <b-img src="~/assets/img/competences/docker.png" fluid alt="git"></b-img>
        <!-- <p>Docker</p> -->
      </b-col>
      <b-col cols="2" lg="1">
        <b-img src="~/assets/img/competences/github.png" fluid alt="git"></b-img>
        <!--  <p>git</p> -->
      </b-col>
      <b-col cols="2" lg="1">
        <b-img src="~/assets/img/competences/mySQL.png" fluid alt="mysql"></b-img>
        <!-- <p>MySQL</p> -->
      </b-col>
      <b-col cols="2" lg="1">
        <b-img src="~/assets/img/competences/apache.jpg" fluid alt="apache"></b-img>
        <!--  <p>Apache</p> -->
      </b-col>
      <b-col cols="2" lg="1">
        <b-img src="~/assets/img/competences/xampp.png" fluid alt="xampp"></b-img>
        <!--  <p>Xampp</p> -->
      </b-col>
      <b-col cols="2" lg="1">
        <b-img src="~/assets/img/competences/easyphp.png" fluid alt="easyphp"></b-img>
        <!--  <p>EasyPHP</p> -->
      </b-col>
      <b-col cols="2" lg="1">
        <b-img src="~/assets/img/competences/filezilla.png" fluid alt="filezilla"></b-img>
        <!--  <p>FileZilla</p> -->
      </b-col>
      <b-col cols="2" lg="1">
        <b-img src="~/assets/img/competences/ovh.png" fluid alt="ovh"></b-img>
        <!--  <p>OVH</p> -->
      </b-col>
    </b-row>
    <b-row align="center" align-v="center" class="legende mepspeciale">
      <b-col offset-lg="2" lg="1">
        <p>Docker</p>
      </b-col>
      <b-col lg="1">
        <p>Git</p>
      </b-col>
      <b-col lg="1">
        <p>MySQL</p>
      </b-col>
      <b-col lg="1">
        <p>Apache</p>
      </b-col>
      <b-col lg="1">
        <p>Xampp</p>
      </b-col>
      <b-col lg="1">
        <p>EasyPHP</p>
      </b-col>
      <b-col lg="1">
        <p>FileZilla</p>
      </b-col>
      <b-col lg="1">
        <p>OVH</p>
      </b-col>
    </b-row>

    <b-row align="center" align-v="center" class="mepspeciale2">
      <b-col sm="2">
        <b-img src="~/assets/img/competences/xampp.png" fluid alt="xampp"></b-img>
        <!--  <p>Xampp</p> -->
      </b-col>
      <b-col sm="2">
        <b-img src="~/assets/img/competences/easyphp.png" fluid alt="easyphp"></b-img>
        <!--  <p>EasyPHP</p> -->
      </b-col>
      <b-col sm="2">
        <b-img src="~/assets/img/competences/apache.jpg" fluid alt="apache"></b-img>
        <!--  <p>Apache</p> -->
      </b-col>
      <b-col sm="2">
        <b-img src="~/assets/img/competences/filezilla.png" fluid alt="filezilla"></b-img>
        <!--  <p>FileZilla</p> -->
      </b-col>
      <b-col sm="2">
        <b-img src="~/assets/img/competences/ovh.png" fluid alt="ovh"></b-img>
        <!--  <p>OVH</p> -->
      </b-col>
      <b-col sm="2">
        <b-img src="~/assets/img/competences/github.png" fluid alt="git"></b-img>
        <!--  <p>git</p> -->
      </b-col>
    </b-row>
    <b-row align="center" align-v="center" class="legende mepspeciale2">
      <b-col sm="2">
        <p>Xampp</p>
      </b-col>
      <b-col sm="2">
        <p>EasyPHP</p>
      </b-col>
      <b-col sm="2">
        <p>Apache</p>
      </b-col>
      <b-col sm="2">
        <p>FileZilla</p>
      </b-col>
      <b-col sm="2">
        <p>OVH</p>
      </b-col>
      <b-col sm="2">
        <p>Git</p>
      </b-col>
    </b-row>
    <b-row align="center" align-v="center" class="mepspeciale2">
      <b-col sm="2">
        <b-img src="~/assets/img/competences/docker.png" fluid alt="git"></b-img>
        <!-- <p>Docker</p> -->
      </b-col>
      <b-col sm="2">
        <b-img src="~/assets/img/competences/mySQL.png" fluid alt="mysql"></b-img>
        <!-- <p>MySQL</p> -->
      </b-col>
    </b-row>
    <b-row align="center" align-v="center" class="legende mepspeciale2">
      <b-col sm="2">
        <p>Docker</p>
      </b-col>
      <b-col sm="2">
        <p>MySQL</p>
      </b-col>
    </b-row>
  </div>
</template>

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

@media (min-width: 0px) and (max-width: 575px) {
  .mepspeciale2 {
    display: none;
  }
}

@media (min-width: 993px) {
  .mepspeciale2 {
    display: none;
  }
}
</style>