import Axios from "axios"
import Vue from "vue"
import Element from 'element-ui'
import 'element-ui/lib/theme-chalk/index.css';

require('./bootstrap');
window.Vue = require('vue')

Vue.use(Element)

Vue.component('search-component', require('./components/SearchComponent.vue').default);

const app = new Vue({
    el: '#app',
});

