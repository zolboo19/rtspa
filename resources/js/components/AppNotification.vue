<template>
    <div class="text-xs-center" data-app>
        <v-menu offset-y absolute>
        <v-btn slot="activator" icon>
            <v-icon color="red">
                add_alert
            </v-icon>
        </v-btn>
        <v-list>
            <v-list-tile>
                <v-list-tile-title>Мэдэгдлүүд</v-list-tile-title>
            </v-list-tile>
            <v-divider></v-divider>
            <v-list-tile v-for="item in unread" :key="item.id">
                <router-link :to="item.data.path">
                    <v-list-tile-title @click="readIt(item)">{{ item.data.question }}</v-list-tile-title>
                </router-link>
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
            unreadCount: 0,
        }
    },
    created(){
        if(User.loggedIn()){
            this.getNotifications();
        }
    },
    methods:{
        getNotifications(){
            axios.post('/api/notifications')
                .then(
                    res => {
                    this.read = res.data.readx;
                    this.unread = res.data.unreadx;
                    this.unreadCount = res.data.unreadx.length;
                    }
                )
                .catch(error => console.log(error.response.data))
        },
        readIt(notification){
            axios.post('/api/markAsRead', {id:notification.id})
        }
    }

}
</script>

<style>

</style>
