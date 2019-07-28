import Vue from 'vue'
import VueRouter from 'vue-router'

Vue.use(VueRouter)

import Login from '../components/Login/Login.vue';
import Sigup from '../components/Login/Signup.vue';
import Forum from '../components/Forum/Forum.vue';
import Logout from '../components/Login/Logout.vue';
import Read from '../components/Forum/Read.vue';
import CreateQuestion from '../components/Forum/CreateQuestion.vue';
import CreateCategory from '../components/Category/CreateCategory.vue';

const routes = [
    { path: '/login', component: Login },
    { path: '/logout', component: Logout},
    { path: '/signup', component: Sigup},
    { path: '/forum', component: Forum, name: 'forum'},
    { path: '/question/:slug', component: Read, name: 'read'},
    { path: '/questionCreate', component: CreateQuestion},
    { path: '/categoryCreate', component: CreateCategory},

  ]

const router = new VueRouter({
    routes, // short for `routes: routes`
    hashbang: false,
    mode: 'history'
})

export default router
