<template>
    <div class="text-xs-center" data-app>
        <v-menu offset-y absolute>
        <v-btn slot="activator" color="primary" dark>Dropdown</v-btn>
        <v-list close-delay>
            <v-list-tile v-for="(item, index) in items" :key="index" @click="">
            <v-list-tile-title>{{ item.title }}</v-list-tile-title>
            </v-list-tile>
        </v-list>
        </v-menu>
    </div>
</template>

<script>
export default {
    data(){
        return{
            read: {},
            unread:{},
            unreadCount: 0,
            items: [
                    { title: 'Click Me' },
                    { title: 'Click Me' },
                    { title: 'Click Me' },
                    { title: 'Click Me 2' },
                ],
        }
    },
    created(){
        if(User.loggedIn()){
            this.getNotifications();
        }
    },
    methods:{
        getNotifications(){
            axios.post('/api/notifications/')
                .then(
                    res => {
                    this.read = res.data.readx,
                    this.unread = res.data.unreadx,
                    this.unreadCount = res.data.unreadx.length
                    }
                )
                .catch(error => console.log(error.response.data))
        }
    }

}
</script>

<style>

</style>
