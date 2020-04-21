<template>
  <div>
    <p>Félicitation, votre score est de {{ score[0] }} / {{ score[1] }}</p>
    <b-row>
      <b-col cols="2" v-for="userResponse in userResponses" :key="userResponse.id" align="center">
        <b-img
          center
          :src="require(`../assets/img/minima/${userResponse[1]}.jpg`)"
          alt="Center image"
        ></b-img>
        <p v-if="!userResponse[0]" class="mauvaiseReponse">{{ userResponse[2] }}</p>
        <p v-bind:class="{ 'mauvaiseReponse' : !userResponse[0] }">{{ userResponse[3] }}</p>
      </b-col>
    </b-row>
    <div class="center">
      <b-button v-on:click="newGame" variant="outline-primary">Nouvelle partie</b-button>
    </div>
  </div>
</template>

<script>
export default {
  layout: "miniQuizz",
  middleware: "scorePositif",
  computed: {
    userResponses() {
      return this.$store.state.miniQuizz.userResponses.userResponses;
    },
    score() {
      return this.$store.state.miniQuizz.score.score;
    }
  },
  data() {
    // devenu obsolète par le store ( juste un ex de passage de param)
    return {
      scoreEx: this.$route.params.score
    };
  },
  methods: {
    newGame() {
      this.$router.push({
        name: "miniquizz"
      });
      this.$store.commit("miniQuizz/userResponses/reset");
      this.$store.commit("miniQuizz/score/reset");
    }
  }
};
</script>

<style lang="scss" scoped>
.mauvaiseReponse {
  color: red;
}
img {
  max-width: 100%;
}
</style>