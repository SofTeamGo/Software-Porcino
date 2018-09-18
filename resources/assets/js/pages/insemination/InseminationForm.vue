<template>
  <div class="card card-default">
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
          <label for="reproducer">Semen *</label>
          <select2  
            :options="semenFetch"
            v-model="form.semen"
          >
          </select2>
          <input class="form-control" type="hidden" name="semen" v-model="form.semen"
            :class="{ 'is-invalid': form.errors.has('semen') }">
          <has-error :form="form" field="semen"></has-error>
        </div>
        <div class="form-group">
          <label for="date">Fecha *</label>
          <input type="date" name="date" class="form-control" v-model="form.date" :class="{ 'is-invalid': form.errors.has('date') }">
          <has-error :form="form" field="date"></has-error>
        </div>
        <div class="form-group">
          <label for="time">Hora *</label>
          <input type="time" name="time" class="form-control" v-model="form.time" :class="{ 'is-invalid': form.errors.has('time') }">
          <has-error :form="form" field="time"></has-error>
        </div>
        <div class="form-group">
          <label for="dose">Dósis</label><br>
          <small>(Puede ingresar un número entero o con decimales)</small>
          <input type="decimal" name="dose" class="form-control" v-model="form.dose" :class="{ 'is-invalid': form.errors.has('dose') }">
          <has-error :form="form" field="dose"></has-error>
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
      },
      semen: {
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
        select: 'reproducer',
        form: new Form({
          reproducer: null,
          semen: null,
          date: '',
          time: '',
          dose: '',
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
      },
      semenFetch() {
        return this.semen.map((obj) => { 
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
        this.form.post('/inseminations/store')
        .then(({ data }) => { 
        })
      }
    } 
  }
</script>