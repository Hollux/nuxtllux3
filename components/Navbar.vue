<template>
  <div class="navbarhlx">
    <NuxtLink to="/" exact exact-active-class="active">
      <b-img
        class="logohlx"
        center
        src="~/assets/img/base/logo_hollux_sanstexte_noir.png"
        alt="Center image"
      ></b-img>
    </NuxtLink>

    <div>
      <b-nav tabs align="center">
        <b-nav-item to="/" exact exact-active-class="active"
          >Accueil</b-nav-item
        >
        <b-nav-item to="/competences" exact exact-active-class="active"
          >Compétences</b-nav-item
        >
        <b-nav-item to="/realisations" exact exact-active-class="active"
          >Réalisations</b-nav-item
        >
        <b-nav-item to="/cv" exact exact-active-class="active">CV</b-nav-item>
        <b-nav-item to="/ensavoirplus" exact exact-active-class="active"
          >En savoir plus</b-nav-item
        >
        <b-nav-item to="/contact" exact exact-active-class="active"
          >Contact</b-nav-item
        >
      </b-nav>
    </div>
  </div>
</template>


<style>
.logohlx {
  width: 85px;
  margin: 55px 0 45px 0;
}
@media (max-width: 890px) {
  .navbarhlx img {
    display: none !important;
  }
}
.navbarhlx {
  margin-bottom: 50px;
}

.navbarhlx a {
  font-style: normal;
}
</style>