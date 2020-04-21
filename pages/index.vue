<template>
  <div class="index">
    <presentation />
    <technos />
    <projets />
  </div>
</template>

<script>
import Logo from "~/components/Logo.vue";
import Presentation from "~/pages/index/presentation.vue";
import Projets from "~/pages/index/projets.vue";
import Technos from "~/pages/index/technos.vue";

export default {
  components: {
    Logo,
    Presentation,
    Projets,
    Technos
  }
};
</script>

<style>
.techno img {
  width: 150px;
  margin-bottom: 10px;
}

.container {
  margin: 0 auto;
  min-height: 100vh;
  display: flex;
  justify-content: center;
  align-items: center;
  text-align: center;
}

.title {
  display: block;
  font-weight: 300;
  font-size: 100px;
  color: #35495e;
  letter-spacing: 1px;
}

.subtitle {
  font-weight: 300;
  font-size: 42px;
  color: #526488;
  word-spacing: 5px;
  padding-bottom: 15px;
}

.links {
  padding-top: 15px;
}
</style>
