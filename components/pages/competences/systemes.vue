<template>
  <div class="container systemes">
    <h2>systèmes d’exploitation</h2>
    <b-row align="center" align-v="center">
      <b-col sm="2" offset-sm="3" cols="4">
        <b-img src="~/assets/img/competences/linux.png" fluid alt="linux"></b-img>
        <!-- <p>Linux</p> -->
      </b-col>
      <b-col sm="2" cols="4">
        <b-img src="~/assets/img/competences/apple.png" fluid alt="mac"></b-img>
        <!-- <p>Mac</p> -->
      </b-col>
      <b-col sm="2" cols="4">
        <b-img src="~/assets/img/competences/windows.png" fluid alt="windows"></b-img>
        <!-- <p>windaub</p> -->
      </b-col>
    </b-row>
    <b-row align="center" align-v="center" class="legende">
      <b-col offset-sm="3" sm="2" cols="4">
        <p>Linux</p>
      </b-col>
      <b-col sm="2" cols="4">
        <p>MacOS</p>
      </b-col>
      <b-col sm="2" cols="4">
        <p>Windows</p>
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