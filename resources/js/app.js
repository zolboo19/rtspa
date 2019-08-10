/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');

import Vue from 'vue'
import Vuetify from 'vuetify'
Vue.use(Vuetify)

import VueSimplemde from 'vue-simplemde'
Vue.component('vue-simplemde', VueSimplemde)

import md from 'marked'
window.md = md;


import User from './Helpers/User';
window.User = User;
import Exception from './Helpers/Exception';
window.Exception = Exception;

window.EventBus = new Vue();

//User.logOut();
//console.log(User.loggedIn());
//console.log(User.id());
//console.log(User.name());


/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i);
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default));

Vue.component('AppHome', require('./components/AppHome.vue').default);

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

 import router from './Router/router.js';
//import Echo from 'laravel-echo';

const app = new Vue({
    el: '#app',
    router,
    // mounted(){ //шалгаж үзэх зорилгоор оруулсан.
    //     Echo.channel('likeChannel')
    //     .listen('LikeEvent', (e) => {
    //         console.log('ooo my god Realtime app');
    //     })
    // }
});
