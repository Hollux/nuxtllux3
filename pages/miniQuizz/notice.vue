<template>
  <div class="notice">
    <b-button v-b-modal.modal-1 variant="warning">revoir la notice</b-button>

    <b-modal id="modal-1" size="xl" hide-header no-close-on-backdrop visible>
      <p>Les règles sont simples :</p>
      <ul>
        <li>Titre basique, jamais de nom précis du titre (ex: "Harry Potter" et non "Harry Potter et la coupe de feu").</li>
        <li><b>Chaque détail est IMPORTANT.</b></li>
        <li>Bon jeu !</li>
      </ul>
      <template v-slot:modal-footer="{ ok }">
        <div class="modal-footer-center">
          <b-button variant="primary" @click="ok()">OK</b-button>
        </div>
      </template>
    </b-modal>
  </div>
</template>

<script>
export default {};
</script>

<style lang="scss" scoped>
  .modal-footer-center {
    display: flex;
    flex-wrap: wrap;
    align-items: center;
    width: 100%;
    justify-content: center;
  }

</style>