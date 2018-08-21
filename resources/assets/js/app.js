import './bootstrap'
import Vue from 'vue'
import Snotify from 'vue-snotify'

Vue.use(Snotify)

Vue.component('example-component', require('./components/ExampleComponent.vue'));
Vue.component('example-form', require('./components/Form.vue'));

const app = new Vue({
    el: '#app'
});
