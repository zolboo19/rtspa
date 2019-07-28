<template>
    <div class="text-center" data-app>
    <v-menu offset-y>
        <v-btn icon slot="activator">
                <v-icon color="red">add_alert</v-icon> {{ unreadCount }}
        </v-btn>
        <v-list>
            <v-list-tile v-for="item in unread" :key="item.id">
                <v-list-tile-title>{{ item.data.question }}</v-list-tile-title>
            </v-list-tile>
            <v-divider></v-divider>
            <v-list-tile v-for="item in read" :key="item.id">
                <v-list-tile-title>{{ item.data.question }}</v-list-tile-title>
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
            unreadCount: 0
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
