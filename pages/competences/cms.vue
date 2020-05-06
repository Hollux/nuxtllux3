<template>
  <div class="container cms">
    <h2>CMS</h2>
    <b-row align="center" align-v="center">
      <b-col offset-sm="3" sm="3" cols="6">
        <b-img src="~/assets/img/competences/wp.png" fluid alt="wordpress"></b-img>
        <!-- <p>html 5</p> -->
      </b-col>
      <b-col sm="3" cols="6">
        <b-img src="~/assets/img/competences/prestashop.png" fluid alt="prestashop"></b-img>
        <!-- <p>CSS 3</p> -->
      </b-col>
    </b-row>
    <b-row align="center" align-v="center" class="legende">
      <b-col offset-sm="3" sm="3" cols="6">
        <p>Wordpress</p>
      </b-col>
      <b-col sm="3">
        <p>Prestashop</p>
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