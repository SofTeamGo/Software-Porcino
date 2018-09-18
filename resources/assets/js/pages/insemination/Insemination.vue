<template>
  <div class="cardbox">
    <div class="cardbox-body">
      <div class="cardbox-heading">
        <div class="cardbox-title">Registrar Inseminación</div>
        <small>Los campos con (*) son obligatorios.</small>
      </div>
      <div class="row">
        <div class="col-md-6">
          <insemination-form :female="female" :females="females" :semen="semen"></insemination-form>
        </div>
        <div class="col-md-4 ml-auto">
          <detail-component></detail-component>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
  export default {
    props: {
      female: {
        required: false,
        type: Number
      },
      females: {
        required: true,
        type: Array
      },
      semen: {
        required: true,
        type: Array
      }
    },

    data() {
      return {
      }
    }
  }
</script>

