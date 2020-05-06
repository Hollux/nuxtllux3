<template>
  <div>
  	<b-img class="logohlx" src="~/assets/img/base/logo_hollux_sanstexte_noir.png" alt="Left image"></b-img>
  	<hr class="top-logo"/>
    <nuxt />
    <footer align="center">
    <br />
    <div class="footernavhlx">
      <nuxt-link to="/">Accueil</nuxt-link>
      <nuxt-link to="/">Mentions légales</nuxt-link>
      <a href="https://github.com/hollux" target="blank">Github</a>
    </div>
    <p>Copyright 2020 Adrien Marchand - Tous droits réservés.</p>
  </footer>
  </div>
</template>

<script>
import Logo from "~/components/Logo.vue";
import Footerhlx from "~/components/Footer.vue";

export default {
  components: {
    Logo,
    Footerhlx,
  }
};
</script>

<style lang="scss" scoped>
	*,
	*:before,
	*:after {
	  box-sizing: border-box;
	  margin: 0;
	}
	.logohlx {
	    text-align: left;
    	margin: 2rem auto 1rem 2rem;
    	width: 75px;
	}
	hr .top-logo {
		margin-top: -51px;
	    margin-bottom: 66px;
	    border-top: 2px solid #ffd501;
	    margin-left: 135px;
	}
	a {
	  outline: 0 !important;
	  color: black;
	}
	.container {
	  display: block !important;
	  text-align: left !important;
	  min-height: 0px !important;
	}
	.center {
	  text-align: center;
	}
	.footernavhlx {
	  background-color: #ffd400;
	  padding: 10px 0 8px;
	  margin-bottom: 10px;
	  font-family: 'Raleway', sans-serif;
	}
	footer p {
	   margin-bottom:10px !important;
	   font-family: 'Raleway', sans-serif;
	 }
	 .footernavhlx a {
	   color: white;
	   margin: 0 40px;
	   font-style: normal;
	 }
</style>

