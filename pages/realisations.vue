<template>
  <div class="realisations">
    <div class="container">
      <h1>RÉALISATIONS WEB PAR HOLLUX</h1>
      <p>
        Vous trouverez ici mes réalisations de
        <b>sites et applications web</b>, pour des clients ou personnelles. Pour voir du code,
        direction
        <a
          href="https://github.com/Hollux"
          target="_blank"
          title="Github Hollux / Adrien Marchand"
        >mon github</a> !
      </p>
    </div>
    <div class="trait"></div>
    <sitesWeb />
    <div class="trait"></div>
    <applisWeb />
  </div>
</template>

<script>
import SitesWeb from "~/components/pages/realisations/sitesWeb.vue";
import ApplisWeb from "~/components/pages/realisations/applisWeb.vue";

export default {
  components: {
    SitesWeb,
    ApplisWeb
  }
};
</script>