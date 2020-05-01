<template>
  <div>
    <p>Index.vue</p>
    <div>
      <p>récupération json :</p>
      <b-row>
        <b-col>
          <b-button v-on:click="trier('NomJeu')" variant="outline-primary">NomJeu</b-button>
        </b-col>
        <b-col>
          <b-button v-on:click="trier('Marque')" variant="outline-primary">Marque</b-button>
        </b-col>
        <b-col>
          <b-button v-on:click="trier('NbJoueurs')" variant="outline-primary">NbJoueurs</b-button>
        </b-col>
        <b-col>
          <b-button v-on:click="trier('AgeJoueurs')" variant="outline-primary">AgeJoueurs</b-button>
        </b-col>
        <!-- <b-col>
          <b-button v-on:click="trier('TypeJeu')" variant="outline-primary">TypeJeu</b-button>
        </b-col>-->
      </b-row>
      <b-row v-for="(jeu, index) in json" :key="index">
        <b-col>{{jeu.NomJeu}}</b-col>
        <b-col>{{jeu.Marque}}</b-col>
        <b-col>{{jeu.NbJoueurs}}</b-col>
        <b-col>{{jeu.AgeJoueurs}}</b-col>
        <!-- <b-col>{{jeu.TypeJeu}}</b-col> -->
      </b-row>
    </div>
  </div>
</template>

<script>
import axios from "~/plugins/axios";

export default {
  // asyncData({ params, error }) {
  //   return axios
  //     .get(`https://ludosf.hollux.pw/jsonlistejeu/${params.id}`)
  //     .then(res => {
  //       return { json: res };
  //     })
  //     .catch(e => {
  //       error({ statusCode: 404, message: "Billet non trouvé" });
  //     });
  // }

  async asyncData({ params }) {
    const { data } = await axios.get(`https://ludosf.hollux.pw/jsonlistejeux`);
    return { json: data, trie: "sanstrie" };
  },
  methods: {
    trier(type) {
      if (this.trie !== type) {
        this.sortA(type);
      } else {
        this.sortB(type);
      }
    },
    sortA(type) {
      this.json.sort(function(a, b) {
        if (a[type] > b[type]) {
          return -1;
        }
        if (b[type] > a[type]) {
          return 1;
        }
        return 0;
      });

      this.trie = type;
    },
    sortB(type) {
      this.json.sort(function(a, b) {
        if (a[type] < b[type]) {
          return -1;
        }
        if (b[type] > a[type]) {
          return 1;
        }
        return 0;
      });
      this.trie = "";
    }
  }
};
</script>

<style lang="scss" scoped>
</style>