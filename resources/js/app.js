/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */


window.Vue = require('vue').default;
import VueRouter from 'vue-router'
Vue.use(VueRouter);
import routes from './routes'
window.axios = require('axios');

//... configure axios...

Vue.prototype.$http = window.axios; 
Vue.component('example-component', require('./components/ExampleComponent.vue').default);

const app = new Vue({
    el: '#app',
    router:new VueRouter(routes),
});
