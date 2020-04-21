<template>
  <div class="notice">
    <b-button v-b-modal.modal-1 variant="warning">Notice</b-button>

    <b-modal id="modal-1" size="xl" hide-header no-close-on-backdrop invisible>
      <p>Les règles sont simple :</p>
      <ul>
        <li>Titre basique, jamais de nom précis du titre (ex: Harry Potter et non Harry Potter et la coupe de feu).</li>
        <li>Chaque Detail Est IMPORTANT</li>
        <li>Bon jeu !</li>
      </ul>
      <template v-slot:modal-footer="{ ok }">
        <b-button variant="primary" @click="ok()">OK</b-button>
      </template>
    </b-modal>
  </div>
</template>

<script>
export default {};
</script>

<style lang="scss" scoped>
</style>