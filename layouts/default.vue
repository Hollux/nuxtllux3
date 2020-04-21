<template>
  <div>
    <navbar />
    <nuxt />
    <footerhlx />
  </div>
</template>

<script>
import Navbar from "~/components/Navbar.vue";
import Footerhlx from "~/components/Footer.vue";

export default {
  components: {
    Navbar,
    Footerhlx
  }
};
</script>

<style>
*,
*:before,
*:after {
  box-sizing: border-box;
  margin: 0;
}

.button--green {
  display: inline-block;
  border-radius: 4px;
  border: 1px solid #3b8070;
  color: #3b8070;
  text-decoration: none;
  padding: 10px 30px;
}

.button--green:hover {
  color: #fff;
  background-color: #3b8070;
}

.button--grey {
  display: inline-block;
  border-radius: 4px;
  border: 1px solid #35495e;
  color: #35495e;
  text-decoration: none;
  padding: 10px 30px;
  margin-left: 15px;
}

.button--grey:hover {
  color: #fff;
  background-color: #35495e;
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
</style>
