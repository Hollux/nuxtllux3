<template>
  <b-container fluid>
    <p>
      Page test commande
      <b-button v-on:click="test()">test</b-button>
    </p>
    <b-row>
      <b-col lg="2" class="my-1">
        <b-input-group size="sm">
          <b-form-input v-model="filter" type="search" id="filterInput" placeholder="Rechercher"></b-form-input>
          <b-input-group-append>
            <b-button :disabled="!filter" @click="filter = ''">Clear</b-button>
          </b-input-group-append>
        </b-input-group>
      </b-col>
      <b-col lg="1" class="my-1">
        <b-form-checkbox id="checkbox-1" v-model="edit">edit</b-form-checkbox>
      </b-col>

      <b-col lg="9" class="my-1">
        <b-form-group
          label="Filter On"
          label-cols-sm="2"
          label-align-sm="right"
          label-size="sm"
          class="mb-0"
        >
          <b-form-checkbox-group v-model="filterOn" class="mt-1">
            <b-form-checkbox
              v-for="(field, index) in fields"
              :key="index"
              :value="field"
            >{{ field.key}}</b-form-checkbox>
          </b-form-checkbox-group>
        </b-form-group>
      </b-col>
    </b-row>

    <b-table
      striped
      hover
      selectable
      responsive="sm"
      :sort-by.sync="sortBy"
      :filter="filter"
      :filterIncludedFields="filterIncludedFields"
      @filtered="onFiltered"
      @row-selected="onRowSelected"
      :per-page="perPage"
      :current-page="currentPage"
      :items="listeJeux"
      :fields="filterOn"
      :small="small"
    >
      <template v-slot:cell(NomJeu)="data">
        <b-link
          target="_blank"
          :href="'https://www.trictrac.net/jeu-de-societe/'+reformate(data.value)"
        >{{ data.value.toLowerCase() }}</b-link>
      </template>

      <template v-if="edit" v-slot:cell(Marque)="data">
        <b-form-input v-model="data.value" />
      </template>

      <template v-if="edit" v-slot:cell(NbJoueurs)="data">
        <b-form-input v-model="data.value" />
      </template>

      <template v-if="edit" v-slot:cell(TempsJeu)="data">
        <b-form-input v-model="data.value" />
      </template>

      <template v-if="edit" v-slot:cell(AgeJoueurs)="data">
        <b-form-input v-model="data.value" />
      </template>

      <template v-if="edit" v-slot:cell(TempsJeu)="data">
        <b-form-input v-model="data.value" />
      </template>

      <template v-if="edit" v-slot:cell(SurPlace)="data">
        <b-form-input v-model="data.value" />
      </template>

      <template v-if="edit" v-slot:cell(hlx)="data">
        <b-form-input v-model="data.value" />
      </template>

      <!-- <template v-for="(filter, index) in filterOn" v-slot:cell(filter.key)="data">
        <b-form-input v-model="data.value" :key="index" />
      </template>-->
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
      sortable="true"
    ></b-table>
  </b-container>
</template>

<script>
import axios from "~/plugins/axios";

export default {
  async asyncData({ params }) {
    const { data } = await axios.get(`https://ludo.hollux.pw/api/liste_jeux`);
    return {
      edit: false,
      editableOptions: [true, false],
      listeJeux: data,
      perPage: 20,
      currentPage: 1,
      filter: null,
      filterIncludedFields: [
        "CodeJeu",
        "NomJeu",
        "Marque",
        "NbJoueurs",
        "AgeJoueurs",
        "TempsJeu",
        "SurPlace",
        "hlx"
      ],
      filterOn: [
        { key: "NomJeu", checked: true, sortable: true },
        { key: "Marque", checked: true, sortable: true },
        { key: "NbJoueurs", checked: true, sortable: true },
        { key: "AgeJoueurs", checked: false, sortable: true }
      ],
      fields: [
        { key: "CodeJeu", checked: true, sortable: true },
        { key: "Marque", checked: true, sortable: true },
        { key: "NbJoueurs", checked: true, sortable: true },
        { key: "AgeJoueurs", checked: false, sortable: true },
        { key: "TempsJeu", checked: false, sortable: true },
        { key: "SurPlace", checked: false, sortable: true },
        { key: "hlx", checked: true, sortable: true }
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