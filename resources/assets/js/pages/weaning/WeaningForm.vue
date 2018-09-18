<template>
  <div class="card card-default">
    <vue-snotify/>
    <div class="card-body">
      <form @submit.prevent="store" @keydown="form.onKeydown($event)">
        <alert-error :form="form" message="Hubo algunos problemas con los campos."></alert-error>
        <div class="form-group">
          <label for="reproducer">Reproductora *</label>
          <select2  
            :options="femalesFetch"
            v-model="form.reproducer"
            :flag="true"
          >
          </select2>
          <input class="form-control" type="hidden" name="reproducer" v-model="form.reproducer"
            :class="{ 'is-invalid': form.errors.has('reproducer') }">
          <has-error :form="form" field="reproducer"></has-error>
        </div>
        <div class="form-group">
          <label for="date">Fecha *</label>
          <input type="date" name="date" class="form-control" v-model="form.date" :class="{ 'is-invalid': form.errors.has('date') }">
          <has-error :form="form" field="date"></has-error>
        </div>
        <div class="form-group">
          <label for="quantity">Cantidad *</label><br>
          <input type="number" name="quantity" class="form-control" v-model="form.quantity" :class="{ 'is-invalid': form.errors.has('quantity') }">
          <has-error :form="form" field="quantity"></has-error>
        </div>
        <div class="form-group">
          <label for="weight">Peso Total *</label><br>
          <small>(Puede ingresar un número entero o con decimales)</small>
          <input type="decimal" name="weight" class="form-control" v-model="form.weight" :class="{ 'is-invalid': form.errors.has('weight') }">
          <has-error :form="form" field="weight"></has-error>
        </div>
        <div class="form-group">
          <label for="average">Peso Promedio(cría)</label><br>
          <small>(Puede ingresar un número entero o con decimales)</small>
          <input type="decimal" name="average" class="form-control" v-model="form.average" :class="{ 'is-invalid': form.errors.has('average') }">
          <has-error :form="form" field="average"></has-error>
        </div>
        <div class="form-group">
          <label for="observation">Observación</label>
          <textarea class="form-control" name="observation" rows="2" v-model="form.observation">
          </textarea>
        </div>
        <button :disabled="form.busy" type="submit" class="btn btn-primary">
          <i v-if="form.busy" class="fa fa-spinner fa-spin"></i> 
          <i v-else class="fa fa-floppy-o" aria-hidden="true"></i>
          Guardar
        </button>
      </form>
    </div>
  </div>
</template>

<script>
  import Select2 from '../../components/Select2.vue';
  import { Form, HasError, AlertError } from 'vform'

  export default {
    props: {
      female: {
        required: false,
        type: Number
      },
      females: {
        required: true,
        type: Array
      }
    },

    components: {
      'select2': Select2,
      'has-error': HasError,
      'alert-error': AlertError
    },

    data() {
      return {
        form: new Form({
          reproducer: null,
          date: '',
          quantity: null,
          weight: null,
          average: null,
          observation: ''
        })
      }
    },

    computed: {
      femalesFetch() {
        return this.females.map((obj) => { 
          let nObj = {}
          nObj['id'] = obj.id
          nObj['text'] = obj.code
          return nObj
        })
      }
    },

    mounted() {
      let female = this.females.filter(o => o.id === this.female)
      if (female.length > 0) {
        this.form.reproducer = this.female
        this.$root.$emit('eventing', this.female);
      }
    },

    methods: {
      store() {
        this.form.post('/weanings/store')
        .then(({ data }) => { 
          if (data.success) {
            this.$snotify.confirm('Ver ficha de la reproductora?', 'Registrado!', {
              closeOnClick: false,
              position: "rightTop",
              buttons: [
                {text: 'Si', action: () => window.location.href = `/female/${data.reproducer}`, bold: false},
                {text: 'No', action: (toast) => { this.$snotify.remove(toast.id); } },
              ]
            })
          }
        })
      }
    } 
  }
</script>