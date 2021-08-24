require('./bootstrap');

import Vue from 'vue';
window.Vue = require('vue');

Vue.component('login-component', require('./components/login.vue').default);
Vue.component('register-component', require('./components/register.vue').default);
Vue.component('app-component', require('./components/App.vue').default);
Vue.component("login-componente" , require("./components/login.vue").default);
const app = new Vue({
    el: '#app'
});