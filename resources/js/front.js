/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');
window.axios = require('axios');

import Vue from 'vue';
import router from './router';
import App from './views/App.vue';
// import Main from './components/Main.vue';

const app = new Vue({
  el : '#root',
  render: h => h(App),
  router
});