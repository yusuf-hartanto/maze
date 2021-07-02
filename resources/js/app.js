require('./bootstrap');

import Vue from 'vue'
import router from './router.js'
import App from './layouts/App'

import { BootstrapVue } from 'bootstrap-vue'
import 'bootstrap-vue/dist/bootstrap-vue.css'
import Vuelidate from 'vuelidate';

Vue.use(BootstrapVue)
Vue.use(Vuelidate)

axios.defaults.baseURL = process.env.MIX_APP_URL

const app = new Vue({
    el: '#app',
    components: {
        App
    },
    router
});