<template>
  <div class="quizzcinema">
    <hr/>
    <div class="container">
      <b-row>
          <h1>Quizz Cinéma</h1>
        
      </b-row>
      
      <b-row>
        <b-col class="img-cine">
          <b-img
            center
            :src="require('../assets/img/minima/' + arrayActive[0][0] + '.jpg')"
            alt="Center image"
          ></b-img>
        </b-col>
        <b-col class="infos-cine">
          
          <b-row>
            <b-col cols="auto">
          <b-button v-on:click="trier" variant="outline-primary">trier</b-button>
        </b-col>
        <b-col cols="auto">
          <b-form-group>
            <b-form-radio-group
              id="btn-radios-1"
              v-model="nbrQuestions"
              :options="nbrQuestionsOptions"
              buttons
              name="radios-btn-default"
            ></b-form-radio-group>
          </b-form-group>
        </b-col>
          </b-row>
          <b-row>
            <b-col md="9">
              <input
                v-model="response"
                id="response"
                v-on:keyup.enter="clientResp"
                placeholder="Votre réponse"
              />
            </b-col>
            <b-col class="right" md="3">
              <div v-on:click="clientResp" class="btn btn-success">valider</div>
            </b-col>
        </b-row>
        <b-row>
          <b-col class="score">
            <hr/>
            <p>Votre score : {{ score[0] }} / {{ score[1] }}</p>
            <hr />
          </b-col>
        </b-row>
          <b-row>
            <b-col cols="auto">
              <notice />
            </b-col>
          </b-row>
        </b-col>
      </b-row>
    </div>
  </div>
</template>

<script>
import Notice from "~/pages/miniQuizz/notice.vue";
import { characterCleaner } from "~/assets/js/characterCleaner.js";
import { randomizeArray } from "~/assets/js/randomizeArray.js";
import { levenshtein } from "~/assets/js/miniQuizz/levenshtein.js";
import { arrayResponse } from "~/assets/js/miniQuizz/arrayResponse.js";
import { mapMutations } from "vuex";
import { mapState } from "vuex";

export default {
  layout: "miniQuizz",
  computed: {
    userResponses() {
      return this.$store.state.miniQuizz.userResponses.userResponses;
    },
    score() {
      return this.$store.state.miniQuizz.score.score;
    }
  },
  components: {
    Notice,
    characterCleaner,
    levenshtein,
    arrayResponse,
    randomizeArray
  },
  asyncData() {
    return {
      arrayActive: randomizeArray(arrayResponse()),
      response: "",
      nbrQuestions: 40,
      nbrQuestionsOptions: [
        { text: "Court", value: 5 },
        { text: "Normal", value: 40 },
        { text: "Full", value: 68 }
      ]
    };
  },
  methods: {
    clientResp() {
      // vérif input correcte
      var response = characterCleaner(this.response);
      var i;
      var minValLevenshtein = 1000;
      for (i = 0; i < this.arrayActive[0][1].length; i++) {
        var valLevenshtein = levenshtein(this.arrayActive[0][1][i], response);
        // on garde la valeur de levenshtein la plus petite
        if (valLevenshtein < minValLevenshtein) {
          minValLevenshtein = valLevenshtein;
          // on garde la reponse la plus prochaine de celle de l'utilisateur
          var filmResp = this.arrayActive[0][1][i];
        }
      }
      if (minValLevenshtein <= filmResp.length / 4) {
        // Si c'est juste, score +1
        this.$store.commit("miniQuizz/score/scorePlusUn");
        // si juste
        var infoUserResponse = true;
      } else {
        // si faux
        var infoUserResponse = false;
      }
      // on store la question/reponse
      this.$store.commit("miniQuizz/userResponses/add", [
        infoUserResponse,
        this.arrayActive[0][0],
        response,
        filmResp
      ]);
      // Score Question +1
      this.$store.commit("miniQuizz/score/questionPlusUn");
      // on set les nouvelles valeurs
      this.arrayActive.splice(0, 1);
      // si score = nbrQuetions , fin du jeu
      if (this.score[1] >= this.nbrQuestions) {
        // Vue.localStorage.set("arrayActive", []);
        // params uniquement en exemple, devenu inutile par le store
        this.$router.push({
          name: "miniquizzend",
          params: { scoreEx: this.score }
        });
      }
      this.response = "";
    },
    trier() {
      this.arrayActive.sort(function(a, b) {
        return a[0] - b[0];
      });
    }
  }
};
</script>

<style lang="scss" scoped>
@import url('https://fonts.googleapis.com/css2?family=Playfair+Display:ital@0;1&family=Raleway:wght@300;400&display=swap');

h1 {
  font-family: 'Playfair Display', serif;
  color:#373760;
  text-transform: none;
  font-size: 2rem;
  margin-left: 110px;
  margin-top:50px;
}
p {
  font-family: 'Playfair Display', serif;
  color:#373760;
  /*text-transform: lowercase;*/
  /*font-size: 0.7rem;*/
}
hr {
  border-top: 1px solid #373760;
}
input {
  font-family: 'Raleway', sans-serif;
  color:#373760;
  border: 2px solid #ffd400;
  border-radius: 0;
  font-weight: 300;
  text-transform: lowercase;
  padding: 0.375rem 0.75rem;
  font-size: 1rem;
  line-height: 1.5;
  width:100%;
}
button, .btn, .btn-secondary {
  font-family: 'Raleway', sans-serif;
  color:#373760;
  border: 2px solid #ffd400;
  border-radius: 0;
  font-weight: 300;
  text-transform: lowercase;
}
.btn-success {
  width:100%;
}
.right.col {
  text-align:right;
}
.img-cine, .infos-cine {
  align-items: center;
  justify-content: center;
  align-self: center;
}
button:active, .btn:active, button:hover, .btn:hover, .btn-success {
  color:#ffffff;
  background-color: #ffd400;
}
.score {
  width:100%;
}
.score p {
  font-size : 1.5rem;
  text-align:center;
}
img {
  width: 350px;
}
</style>