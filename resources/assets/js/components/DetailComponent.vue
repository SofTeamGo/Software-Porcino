<template>
  <div class="card border-dark mb-3">
    <div class="card-header text-center">Detalles</div>
    <div class="card-body text-dark">
      <div v-if="female.length > 0" class="table-responsive">
        <h5 class="card-title">Datos del Animal</h5>
        <table class="table table-sm">
          <tbody>
            <tr>
              <th scope="row">1</th>
              <td>Mark</td>
            </tr>
            <tr>
              <th scope="row">2</th>
              <td>Jacob</td>
            </tr>
            <tr>
              <th scope="row">3</th>
              <td colspan="2">Larry the Bird</td>
            </tr>
          </tbody>
        </table>
        <h5 class="card-title">Ultimo Evento</h5>
        <table class="table table-sm">
          <tbody>
            <tr>
              <th scope="row">1</th>
              <td>Mark</td>
            </tr>
            <tr>
              <th scope="row">2</th>
              <td>Jacob</td>
            </tr>
            <tr>
              <th scope="row">3</th>
              <td colspan="2">Larry the Bird</td>
            </tr>
          </tbody>
        </table>
      </div>
      <h6 v-if="flag" class="card-subtitle mb-2 text-muted">Seleccione una reproductora!</h6>
      <div v-show="loader" class="sk-cube-grid">
        <div class="sk-cube sk-cube1"></div>
        <div class="sk-cube sk-cube2"></div>
        <div class="sk-cube sk-cube3"></div>
        <div class="sk-cube sk-cube4"></div>
        <div class="sk-cube sk-cube5"></div>
        <div class="sk-cube sk-cube6"></div>
        <div class="sk-cube sk-cube7"></div>
        <div class="sk-cube sk-cube8"></div>
        <div class="sk-cube sk-cube9"></div>
      </div>
    </div>
    <div class="card-footer text-muted">
      <a class="nav-link text-center" href="#">Más Info.</a>
    </div>
  </div>
</template>

<script>
  export default {
    data() {
      return {
        female: [],
        flag: true,
        loader: false
      }
    },

    mounted() {
      this.$root.$on('eventing', data => {
        this.flag = false
        this.loader = true
        this.female = []
        setTimeout(() => {
          this.female.push({id:1, code:'1F'})
          this.loader = false
        }, 3000);
      });
    }

  }
</script>

