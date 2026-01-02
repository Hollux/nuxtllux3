<template>
  <div class="container frameworks">
    <h2>Frameworks</h2>
    <b-row align="center" align-v="center">
      <b-col cols="3" sm="2">
        <b-img src="~/assets/img/competences/vuejs.png" fluid alt="vuejs"></b-img>
        <!-- <p>html 5</p> -->
      </b-col>
      <b-col cols="3" sm="2">
        <b-img src="~/assets/img/competences/symfony.png" fluid alt="symfony"></b-img>
        <!-- <p>CSS 3</p> -->
      </b-col>
      <b-col cols="3" sm="2">
        <b-img src="~/assets/img/competences/bootstrap.jpg" fluid alt="bootstrap"></b-img>
        <!-- <p>php</p> -->
      </b-col>
      <b-col cols="3" sm="2">
        <b-img src="~/assets/img/competences/laravel.png" fluid alt="laravel"></b-img>
        <!-- <p>JavaScript</p> -->
      </b-col>
      <b-col cols="3" sm="2">
        <b-img src="~/assets/img/competences/react.svg" fluid alt="react"></b-img>
        <!-- <p>react</p> -->
      </b-col>
      <b-col cols="3" sm="2">
        <b-img src="~/assets/img/competences/jquery.png" fluid alt="jquery"></b-img>
        <!-- <p>jquery</p> -->
      </b-col>
    </b-row>
    <b-row align="center" align-v="center" class="legende">
      <b-col>
        <p>Vue.JS</p>
      </b-col>
      <b-col>
        <p>Symfony</p>
      </b-col>
      <b-col>
        <p>Bootstrap</p>
      </b-col>
      <b-col>
        <p>Laravel</p>
      </b-col>
      <b-col>
        <p>React</p>
      </b-col>
      <b-col>
        <p>jQuery</p>
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
</style>