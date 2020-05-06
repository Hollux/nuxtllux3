<template>
  <div>
  	<b-img class="logohlx" src="~/assets/img/base/logo_hollux_sanstexte_noir.png" alt="Left image"></b-img>
    <nuxt />
    <footerhlx />
  </div>
</template>

<script>
import Logo from "~/components/Logo.vue";
import Footerhlx from "~/components/Footer.vue";

export default {
  components: {
    Logo,
    Footerhlx
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
	}
</style>

