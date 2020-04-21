<template>
  <div>
    <!-- <p>{{ arraySmashUps }}</p>
    <p>{{ objectSmashUp }}</p>-->
    <p>{{allSmashUps}}</p>

    <b-form-group>
      <template v-slot:label>
        <br />
        <b-form-checkbox
          v-model="allSelected"
          :indeterminate="indeterminate"
          aria-describedby="flavours"
          aria-controls="flavours"
          @change="toggleAll"
        >{{ allSelected ? 'Un-select All' : 'Select All' }}</b-form-checkbox>
      </template>
      <b-row>
        <b-col cols="3" v-for="arraySmashUp in arraySmashUps" :key="arraySmashUp.id">
          <b-form-checkbox-group
            :id="arraySmashUp.id"
            v-model="selected"
            :options="arraySmashUp.contenu"
            name="arraySmashUp.id"
            class="ml-4"
            aria-label="Individual flavours"
            stacked
          ></b-form-checkbox-group>
        </b-col>
      </b-row>
    </b-form-group>

    <div>
      Selected:
      <strong>{{ selected }}</strong>
      <br />All Selected:
      <strong>{{ allSelected }}</strong>
      <br />Indeterminate:
      <strong>{{ indeterminate }}</strong>
    </div>
  </div>
</template>

<script>
import { arraySmashUp } from "~/assets/js/randomSmashUp/arraySmashUp.js";
import { objectSmashUp } from "~/assets/js/randomSmashUp/arraySmashUp.js";
export default {
  layout: "randomSmashUp",
  components: {
    arraySmashUp,
    objectSmashUp
  },
  asyncData() {
    return {
      arraySmashUps: arraySmashUp(),
      objectSmashUp: objectSmashUp(),
      allSmashUps: [],
      flavours: ["Orange", "Grape", "Apple", "Lime", "Very Berry"],
      selected: [],
      allSelected: false,
      indeterminate: false
    };
  },
  fetch() {
    this.allSmashUps = this.arraySmashUps;
    // this.arraySmashUps.forEach(arraySmashUp => {
    //   this.allSmashUps.push(arraySmashUp.contenu);
    // });
  },
  methods: {
    toggleAll(checked) {
      this.arraySmashUps.forEach(arraySmashUp => {
        console.log(arraySmashUp.contenu.slice());
        // this.selected = checked ? this.arraySmashUp.contenu.slice() : [];
      });
      //this.selected = checked ? this.arraySmashUps.slice() : [];
    }
  },
  watch: {
    selected(newVal, oldVal) {
      // Handle changes in individual flavour checkboxes
      if (newVal.length === 0) {
        this.indeterminate = false;
        this.allSelected = false;
      } else if (newVal.length === this.flavours.length) {
        this.indeterminate = false;
        this.allSelected = true;
      } else {
        this.indeterminate = true;
        this.allSelected = false;
      }
    }
  }
};
</script>

<style lang="scss" scoped>
.col-4 {
  margin-bottom: 10px;
}
</style>