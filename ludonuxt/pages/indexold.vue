<template>
  <b-container fluid>
    <p>Index.vue</p>
    <p>Page number: {{ pageNumber }}</p>
    <b-form-input v-model="rechercher" v-on:change="search()" placeholder="Search"></b-form-input>
    <div>
      <!-- <b-row>
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
      </b-row>-->
      <!-- <b-row v-for="(jeu, index) in paginatedListe" :key="index">
        <b-col>{{ jeu.NomJeu }}</b-col>
        <b-col>{{jeu.Marque}}</b-col>
        <b-col>{{jeu.NbJoueurs}}</b-col>
        <b-col>{{jeu.AgeJoueurs}}</b-col>
        <b-col>{{jeu.TypeJeu}}</b-col> 
      </b-row>-->

      <b-table
        striped
        hover
        :per-page="perPage"
        :current-page="currentPage"
        :items="json"
        :fields="fields"
      ></b-table>

      <!-- <b-pagination v-model="json" :total-rows="rows" :per-page="perPage" aria-controls="my-table"></b-pagination> -->
      <div>
        <button v-on:click="previousPage">Precedent</button>
        <button v-on:click="nextPage">Suivant</button>
      </div>
    </div>
  </b-container>
</template>

<script>
import axios from "~/plugins/axios";

export default {
  async asyncData({ params }) {
    //const { data } = await axios.get(`https://ludosf.hollux.pw/jsonlistejeux`);
    const { data } = await axios.get(
      `https://ludo.hollux.pw/api/jsonlistejeux`
    );
    return {
      json: data,
      trie: "",
      pageNumber: 0,
      fields: ["NomJeu", "Marque", "NbJoueurs", "AgeJoueurs"],
      quantityPerPage: 20,
      perPage: 20,
      currentPage: 1,
      paginatedListe: [],
      rechercher: ""
    };
  },
  fetch() {
    this.paginatedListe = this.paginatedData();
  },
  // computed: {
  //   getSearchResp: function() {
  //     console.log(this.rechercher);

  //     return "message recherché : " + this.rechercher;
  //   },
  //   rows() {
  //     return this.json.length;
  //   }
  // },
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
      this.paginatedListe = this.paginatedData();
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
      this.paginatedListe = this.paginatedData();
    },
    nextPage() {
      if (this.pageNumber <= this.json.length / this.quantityPerPage) {
        this.pageNumber++;
        this.paginatedListe = this.paginatedData();
      }
    },
    previousPage() {
      if (this.pageNumber > 0) {
        this.pageNumber--;
        this.paginatedListe = this.paginatedData();
      }
    },
    pageCount() {
      let l = this.json.length,
        q = this.quantityPerPage;
      return Math.ceil(l / q);
    },
    paginatedData() {
      const start = this.pageNumber * this.quantityPerPage,
        end = start + this.quantityPerPage;
      return this.json.slice(start, end);
    },
    search() {
      console.log("recherche : ", this.rechercher);
      if (this.rechercher == "") {
        this.paginatedListe = this.paginatedData();
      } else {
        this.paginatedListe.indexOf(this.rechercher);
        console.log(this.search2(this.rechercher, this.paginatedListe));
      }
    },
    search2(nameKey, myArray) {
      for (var i = 0; i < myArray.length; i++) {
        if (myArray[i].NomJeu === nameKey) {
          return myArray[i];
        }
      }
    }
  }
};
</script>

<style lang="scss" scoped>
</style>