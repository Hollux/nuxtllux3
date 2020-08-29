<template>
  <div class="miniquizz">
    <hr />
    <div class="quizzcinema">
      <div class="container">
        <b-row>
          <h1>Quizz Cinéma</h1>
        </b-row>
        <h1 v-if="konamiTotal">Bravo, konami code réussis !</h1>
        <b-row>
          <b-col sm="5" lg="4" class="img-cine ttttt">
            <b-img
              center
              :src="require('../assets/img/minima/' + arrayActive[0][0] + '.jpg')"
              alt="Center image"
            ></b-img>
          </b-col>
          <b-col sm="7" lg="8" class="infos-cine">
            <b-row>
              <b-col cols="4" md="3" lg="2">
                <b-button v-on:click="trier" variant="outline-warning">trier</b-button>
              </b-col>
              <b-col cols="8" offset-md="1" offset-lg="3" lg="7">
                <b-form-group>
                  <b-form-radio-group
                    id="btn-radios-1"
                    v-model="nbrQuestions"
                    :options="nbrQuestionsOptions"
                    buttons
                    name="radios-btn-default"
                    button-variant="outline-warning"
                  ></b-form-radio-group>
                </b-form-group>
              </b-col>
            </b-row>
            <b-row class="reponse">
              <b-col md="7" lg="8">
                <input
                  v-model="response"
                  id="response"
                  v-on:keyup.enter="clientResp"
                  placeholder="Votre réponse"
                />
              </b-col>
              <b-col
                class="right"
                offset="2"
                cols="8"
                offset-sm="3"
                sm="5"
                offset-md="0"
                md="4"
                lg="3"
              >
                <div v-on:click="clientResp" class="btn btn-success">valider</div>
              </b-col>
              <b-col class="right" cols="1" sm="1" offset-md="0" md="1" lg="1">
                <div v-on:click="getIndice" class="btn btn-success">h</div>
              </b-col>
            </b-row>
            <p v-if="indice1" class="indice">{{ arrayActive[0][2] }}</p>
            <p v-if="indice2" class="indice">{{ arrayActive[0][3] }}</p>
            <b-row>
              <b-col class="score">
                <hr />
                <p>Votre score : {{ score[0] }} / {{ score[1] }}</p>
                <hr />
              </b-col>
            </b-row>
            <b-row>
              <b-col offset="2" cols="8" offset-md="3" md="6">
                <notice />
              </b-col>
            </b-row>
          </b-col>
        </b-row>
      </div>
    </div>
  </div>
</template>

<script>
import Notice from "~/components/pages/miniQuizz/notice.vue";
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
    },
  },
  mounted() {
    document.addEventListener("keydown", (e) => this.handleGlobalKeyDown(e));
  },
  beforeDetroy() {
    document.removeEventListener("keydown", (e) => this.handleGlobalKeyDown(e));
  },
  components: {
    Notice,
    characterCleaner,
    levenshtein,
    arrayResponse,
    randomizeArray,
  },
  asyncData() {
    return {
      arrayActive: randomizeArray(arrayResponse()),
      response: "",
      nbrQuestions: 40,
      indice1: false,
      indice2: false,
      nbrQuestionsOptions: [
        { text: "Court", value: 5 },
        { text: "Normal", value: 40 },
        { text: "Full", value: 68 },
      ],
      keyCode: "",
      konami: false,
      konamiTotal: false,
      konamiValue: "",
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
        filmResp,
      ]);
      // Score Question +1
      this.$store.commit("miniQuizz/score/questionPlusUn");
      // on retire les indices.
      this.indice1 = false;
      this.indice2 = false;
      // on set les nouvelles valeurs
      this.arrayActive.splice(0, 1);
      // si score = nbrQuetions , fin du jeu
      if (this.score[1] >= this.nbrQuestions) {
        // Vue.localStorage.set("arrayActive", []);
        // params uniquement en exemple, devenu inutile par le store
        this.$router.push({
          name: "miniquizzend",
          params: { scoreEx: this.score },
        });
      }
      this.response = "";
    },
    trier() {
      this.arrayActive.sort(function (a, b) {
        return a[0] - b[0];
      });
    },
    getIndice() {
      if (this.indice1) {
        this.indice2 = true;
      } else if (!this.indice1) {
        this.indice1 = true;
      }
    },
    // partie konami
    reset() {
      this.konami = false;
      this.konamiValue = "";
      this.konamiTotal = false;
    },
    handleGlobalKeyDown(e) {
      if (this.konami == true) {
        switch (this.konamiValue) {
          case "38":
            if (e.keyCode == "38") {
              this.konamiValue = this.konamiValue + "38";
            } else {
              this.reset();
            }
            break;
          case "3838":
            if (e.keyCode == "40") {
              this.konamiValue = this.konamiValue + "40";
            } else {
              this.reset();
            }
            break;
          case "383840":
            if (e.keyCode == "40") {
              this.konamiValue = this.konamiValue + "40";
            } else {
              this.reset();
            }
            break;
          case "38384040":
            if (e.keyCode == "37") {
              this.konamiValue = this.konamiValue + "37";
            } else {
              this.reset();
            }
            break;
          case "3838404037":
            if (e.keyCode == "39") {
              this.konamiValue = this.konamiValue + "39";
            } else {
              this.reset();
            }
            break;
          case "383840403739":
            if (e.keyCode == "37") {
              this.konamiValue = this.konamiValue + "37";
            } else {
              this.reset();
            }
            break;
          case "38384040373937":
            if (e.keyCode == "39") {
              this.konamiValue = this.konamiValue + "39";
            } else {
              this.reset();
            }
            break;
          case "3838404037393739":
            if (e.keyCode == "66") {
              this.konamiValue = this.konamiValue + "66";
            } else {
              this.reset();
            }
            break;
          case "383840403739373966":
            if (e.keyCode == "65") {
              this.konamiValue = this.konamiValue + "65";
              this.konamiTotal = true;
              this.finishTheGame();
            } else {
              this.reset();
            }
            break;
          default:
            this.reset();
        }
      }
      if (e.keyCode == 38 && this.konami == false) {
        this.konamiValue = "38";
        this.konami = true;
      }
      this.keyCode = e.keyCode;
    },
    finishTheGame() {
      console.log(this.arrayActive[0][1][0], this.score[1], this.nbrQuestions);
      for (let i = this.score[1]; i < this.nbrQuestions; ) {
        this.response = this.arrayActive[0][1][0];
        this.clientResp();
        i++;
      }
    },
    // fin parti konami
  },
};
</script>

<style lang="scss" scoped>
.quizzcinema {
  background-color: #ffd400;
  margin: 60px auto 40px;
}
.container {
  background-color: #ffffff;
  padding: 2px 35px;
}
.NuxtLogo {
  align-self: center;
  text-align: center;
}
h1 {
  font-family: "Playfair Display", serif;
  color: #373760;
  text-transform: none;
  font-size: 2rem;
  margin-left: 15px;
}
p {
  font-family: "Playfair Display", serif;
  color: #373760;
  text-transform: lowercase;
}
hr {
  border-top: 1px solid #373760;
}
input {
  font-family: "Raleway", sans-serif;
  color: #373760;
  border: 2px solid #e6e6e6;
  border-radius: 0;
  font-weight: 300;
  text-transform: lowercase;
  padding: 0.375rem 0.75rem;
  font-size: 1rem;
  line-height: 1.5;
  width: 100%;
}
input:focus,
input.focus {
  box-shadow: 0 0 0 0.1rem rgb(239, 236, 225);
  outline: none;
}
button,
.btn,
.btn-secondary,
.btn-success {
  font-family: "Raleway", sans-serif;
  color: #373760;
  border: 2px solid #ffd400;
  border-radius: 0;
  font-weight: 300;
  text-transform: lowercase;
  background-color: #ffffff;
}
.btn-group,
.btn-group-vertical {
  width: 100%;
}
.btn-success {
  width: 100%;
}
.right.col {
  text-align: right;
}
.img-cine,
.infos-cine {
  align-items: center;
  justify-content: center;
  align-self: center;
}
.btn-outline-warning {
  width: 100%;
}
button:hover,
.btn:hover {
  color: #ffffff;
  background-color: #ffd400;
  border-color: #ffd400;
}
button:active,
.btn:active,
.btn-outline-primary:not(:disabled):not(.disabled):active,
.btn-outline-primary:not(:disabled):not(.disabled).active,
.show > .btn-outline-primary.dropdown-toggle,
.btn-success:not(:disabled):not(.disabled):active,
.btn-success:not(:disabled):not(.disabled).active,
.show > .btn-success.dropdown-toggle {
  color: #ffffff;
  background-color: #ffcf00;
  border-color: #ffcf00;
}
button:focus,
button.focus,
.btn:focus,
.btn.focus,
.btn-success:focus,
.btn-success.focus,
.btn-outline-primary:focus,
.btn-outline-primary.focus {
  box-shadow: 0 0 0 0.05rem rgba(222, 170, 12, 0.5);
}
.score {
  width: 100%;
  margin-top: 25px;
}
.reponse {
  margin-top: 50px;
  margin-bottom: 15px;
}
.score p {
  font-size: 1.5rem;
  text-align: center;
  text-transform: none;
}
.indice {
  margin-bottom: 0;
}
img {
  width: 100%;
}
@media (max-width: 1199px) {
  .quizzcinema {
    margin: 30px auto 5px;
  }
  .score {
    margin-top: 30px;
  }
  .reponse {
    margin-top: 40px;
  }
}
@media (max-width: 767px) {
  .quizzcinema {
    margin: 30px auto 5px;
  }
  input {
    font-size: 0.8rem;
    margin-bottom: 5px;
  }
  .score,
  .reponse {
    margin-top: 0px;
  }
  hr {
    margin: 0.8rem auto;
  }
  .score p {
    font-size: 1rem;
  }
}
@media (max-width: 575px) {
  .infos-cine {
    margin-top: 30px;
  }
}
</style>