<template>
  <form @submit.prevent="login" @keydown="form.onKeydown($event)">
    <div class="form-group">
      <label>Username</label>
      <input v-model="form.username" type="text" name="username"
        class="form-control" :class="{ 'is-invalid': form.errors.has('username') }">
      <has-error :form="form" field="username"></has-error>
    </div>

    <div class="form-group">
      <label>Password</label>
      <input v-model="form.password" type="password" name="password"
        class="form-control" :class="{ 'is-invalid': form.errors.has('password') }">
      <has-error :form="form" field="password"></has-error>
    </div>
    <button :disabled="form.busy" type="submit" class="btn btn-primary">Log In</button>
  </form>
</template>

<script>
  import { Form, HasError, AlertError } from 'vform'
  export default {
    components: {
      'has-error': HasError
    },

    data () {
      return {
        // Create a new form instance
        form: new Form({
          username: '',
          password: '',
          remember: false
        })
      }
    },

    methods: {
      login () {
        // Submit the form via a POST request
        this.form.post('/login')
          .then(({ data }) => { console.log(data) })
      }
    }  
  }
</script>