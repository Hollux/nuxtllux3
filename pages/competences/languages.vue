<template>
  <div class="container languages">
    <h2>Langages</h2>
    <b-row align="center" align-v="center">
      <b-col cols="3" sm="2">
        <b-img src="~/assets/img/competences/html5.png" fluid alt="html5"></b-img>
       <!--  <p>html 5</p> -->
      </b-col>
      <b-col cols="3" sm="2">
        <b-img src="~/assets/img/competences/css3.png" fluid alt="css3"></b-img>
       <!--  <p>CSS 3</p> -->
      </b-col>
      <b-col cols="3" sm="2">
        <b-img src="~/assets/img/competences/php.png" fluid alt="php"></b-img>
        <!-- <p>php</p> -->
      </b-col>
      <b-col cols="3" sm="2">
        <b-img src="~/assets/img/competences/js.png" fluid alt="JS"></b-img>
       <!--  <p>JavaScript</p> -->
      </b-col>
      <b-col cols="3" sm="2">
        <b-img src="~/assets/img/competences/less.png" fluid alt="Less"></b-img>
        <!-- <p>mysql</p> -->
      </b-col>
      <b-col cols="3" sm="2">
        <b-img src="~/assets/img/competences/sass.jpg" fluid alt="Sass"></b-img>
       <!--  <p>Sass</p> -->
      </b-col>
    </b-row>
    <b-row align="center" align-v="center" class="legende">
      <b-col>
        <p>HTML 5</p>
      </b-col>
      <b-col>
        <p>CSS 3</p>
      </b-col>
      <b-col>
        <p>PHP</p>
      </b-col>
      <b-col>
        <p>JavaScript</p>
      </b-col>
      <b-col>
        <p>Less</p>
      </b-col>
      <b-col>
        <p>Sass</p>
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
    display:none;
  }
}
</style>