import './bootstrap'
import Vue from 'vue'
import Snotify from 'vue-snotify'

Vue.use(Snotify)

Vue.component('login-form', require('./pages/auth/Login.vue'));
Vue.component('example-form', require('./components/Form.vue'));

const app = new Vue({
    el: '#app'
});
