/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

 require('./bootstrap');

 window.Vue = require('vue');
 window.axios = require('axios');

 import Vue from 'vue';
 import App from './views/App';

const app = new Vue({
  el : '#app',
  render: h => h(App)
});