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
          <b-button variant="outline-warning" class="ok" @click="ok()">OK</b-button>
        </div>
      </template>
    </b-modal>
  </div>
</template>

<script>
export default {};
</script>

<style lang="scss" scoped>
  p, ul, li {
    font-family: 'Raleway', sans-serif
  }
  .modal-body {
    padding:2rem;
    padding-bottom:1rem;
  }
  .modal-footer-center {
    display: flex;
    flex-wrap: wrap;
    align-items: center;
    width: 100%;
    justify-content: center;
  }
  .btn-outline-warning {
    font-family: 'Raleway', sans-serif;
    color:#373760;
    border: 2px solid #ffd400;
    border-radius: 0;
    font-weight: 300;
    text-transform: lowercase;
    background-color: #ffffff;
  }
  .btn-outline-warning:hover, .btn-outline-warning:not(:disabled):not(.disabled):active, .btn-outline-warning:not(:disabled):not(.disabled).active, .show > .btn-outline-warning.dropdown-toggle {
    color:#ffffff;
    background-color: #ffd400;
    border-color: #ffd400;
  }
  .btn-outline-warning:focus, .btn-outline-warning.focus {
    box-shadow: 0 0 0 0.05rem rgba(222, 170, 12, 0.5);
  }

</style>