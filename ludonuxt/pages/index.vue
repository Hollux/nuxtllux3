<template>
  <b-container fluid>
    <p>
      Page test commande
      <b-button v-on:click="test()">test</b-button>
    </p>
    <b-input-group size="sm">
      <b-form-input v-model="filter" type="search" id="filterInput" placeholder="Type to Search"></b-form-input>
      <b-input-group-append>
        <b-button :disabled="!filter" @click="filter = ''">Clear</b-button>
      </b-input-group-append>
    </b-input-group>

    <b-table
      striped
      hover
      selectable
      responsive="sm"
      :sort-by.sync="sortBy"
      :filter="filter"
      :filterIncludedFields="filterOn"
      @filtered="onFiltered"
      @row-selected="onRowSelected"
      :per-page="perPage"
      :current-page="currentPage"
      :items="listeJeux"
      :fields="fields"
      :small="small"
    >
      <template v-slot:cell(NomJeu)="data">
        <b-link
          target="_blank"
          :href="'https://www.trictrac.net/jeu-de-societe/'+reformate(data.value)"
        >{{ data.value.toLowerCase() }}</b-link>
      </template>
    </b-table>
    <b-pagination
      v-model="currentPage"
      :total-rows="rows"
      :per-page="perPage"
      aria-controls="my-table"
    ></b-pagination>

    <p>Panier :</p>
    <b-table
      striped
      hover
      selectable
      @row-selected="onPanierSelected"
      responsive="sm"
      :per-page="perPage"
      :current-page="currentPage"
      :items="selected"
      :fields="fields"
      :small="small"
    ></b-table>
  </b-container>
</template>

<script>
import axios from "~/plugins/axios";

export default {
  async asyncData({ params }) {
    const { data } = await axios.get(`https://ludo.hollux.pw/api/liste_jeux`);
    return {
      listeJeux: data,
      perPage: 20,
      currentPage: 1,
      filter: null,
      filterOn: ["NomJeu", "Marque", "NbJoueurs", "AgeJoueurs"],
      fields: [
        {
          key: "NomJeu",
          sortable: true
        },
        {
          key: "Marque",
          sortable: true
        },
        {
          key: "NbJoueurs",
          sortable: true
        },
        {
          key: "AgeJoueurs",
          sortable: true
        }
      ],
      small: true,
      sortBy: "NomJeu",
      selected: []
    };
  },
  computed: {
    rows() {
      return this.listeJeux.length;
    }
  },
  methods: {
    onRowSelected(items) {
      this.selected = items;
    },
    onPanierSelected(items) {},
    onFiltered(filteredItems) {
      // Trigger pagination to update the number of buttons/pages due to filtering
      this.totalRows = filteredItems.length;
      this.currentPage = 1;
    },
    reformate(data) {
      data = data.replace(/ /g, "_");
      data = data.replace(/,/g, "-");
      data = data.replace(/'/g, "-");

      return data.toLowerCase();
    },
    test() {
      var serverPath = "https://ludo.hollux.pw/api/liste_jeux"; //"https://ludo.hollux.pw/trictrac/6_qui_prend_junior";

      var loadHtml = function(path, callback) {
        var xhr = new XMLHttpRequest();
        xhr.open("GET", path, true);
        xhr.onreadystatechange = function() {
          if (this.readyState !== 4) return;
          if (this.status !== 200) return;
          callback(this.responseText);
        };
        xhr.send();
      };

      loadHtml(serverPath + "index.html", function(html) {
        document.querySelector(".page_content_wrapper").innerHTML = html;
      });
      console.log(false);
    }
  }
};
</script>

<style lang="scss" scoped>
</style>