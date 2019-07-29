<template>
  <v-toolbar>
    <!-- <v-toolbar-side-icon></v-toolbar-side-icon> -->
    <v-toolbar-title>Хэлэлцүүлэг(Real time forum app)</v-toolbar-title>
    <v-spacer></v-spacer>
    <app-notification v-if="loggedIn"></app-notification>
    <div>
        <router-link
            v-for="link in links"
            :key="link.title"
            :to="link.to"
            v-if="link.show"
        >
            <v-btn flat>{{ link.title }}</v-btn>
        </router-link>
    </div>
  </v-toolbar>
</template>

<script>
import AppNotification from '../components/AppNotification.vue';
export default {
    data(){
        return {
            loggedIn: User.loggedIn(),
            links:[
                { title: 'Хэлэлцүүлэг', to: '/forum' , show: true},
                { title: 'Асуулт', to: '/questionCreate' , show: User.loggedIn()},
                { title: 'Категори', to: '/categoryCreate' , show: User.admin()},
                { title: 'Нэвтрэх', to: '/login' , show: !User.loggedIn()},
                { title: 'Системээс гарах', to: '/logout' , show: User.loggedIn()},
            ]
        }
    },
    components:{AppNotification},
    created(){
        EventBus.$on('logout', () => {
            User.logOut();
        })
    }

}
</script>

<style>

</style>
