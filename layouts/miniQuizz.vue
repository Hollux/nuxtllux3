<template>
  <div>
  	<logo />
    <h1>Quizz cinema</h1>
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

