<template>
  <div class="miniquizz">
    <hr />
    <div class="quizzcinema">
      <div class="container">
         <b-row>
          <h1>Quizz Cinéma</h1> 
      </b-row>
        <p class="score">Félicitations, votre score est de <b>{{ score[0] }} / {{ score[1] }}</b> !</p>
        <b-row>
          <b-col cols="4" md="2" v-for="userResponse in userResponses" :key="userResponse.id" align="center">
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
.quizzcinema {
  background-color: #ffd400;
  margin: 60px auto 40px;
}
.container {
  background-color: #ffffff;
  padding: 10px 35px;
}
hr {
  border-top: 1px solid #373760;
}
.NuxtLogo {
align-self: center;
text-align: center;
}
h1 {
  font-family: 'Playfair Display', serif;
  color:#373760;
  text-transform: none;
  font-size: 2rem;
  margin-left: 15px;
}
p {
  font-family: 'Raleway', sans-serif;
  color:#373760;
/*  text-transform: lowercase;*/
}
.mauvaiseReponse {
  color: red;
}
button, .btn, .btn-secondary, .btn-success {
  font-family: 'Raleway', sans-serif;
  color:#373760;
  border: 2px solid #ffd400;
  border-radius: 0;
  font-weight: 300;
  text-transform: lowercase;
  background-color: #ffffff;
}
img {
  width: 100%;
  margin-bottom: 15px;
}
.btn-outline-warning {
  width:100%;
}
button:hover, .btn:hover {
  color:#ffffff;
  background-color: #ffd400;
  border-color: #ffd400;
}
button:active, .btn:active, .btn-outline-primary:not(:disabled):not(.disabled):active, .btn-outline-primary:not(:disabled):not(.disabled).active, .show > .btn-outline-primary.dropdown-toggle {
  color:#ffffff;
  background-color: #ffcf00;
  border-color: #ffcf00;
}
button:focus, button.focus, .btn:focus, .btn.focus, .btn-outline-primary:focus, .btn-outline-primary.focus {
  box-shadow: 0 0 0 0.05rem rgba(222, 170, 12, 0.5);
}
p.score {
  font-size : 1.1rem;
  margin: 20px auto 30px;
  text-transform: none;
}

@media (max-width: 1199px) {
  .quizzcinema {
    margin: 30px auto 5px;
  }
}

@media (max-width: 767px) {
  .quizzcinema {
    margin: 30px auto 5px;
  }
  hr {
    margin:0.8rem auto;
  }
  .score p {
    font-size : 1rem;
  }
}

</style>