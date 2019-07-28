<template>
    <div class="mt-3">
        <v-card>
            <v-card-title>
                <div class="headline">{{ data.user }}</div>
                <div class="ml-2">{{ data.created_at }}</div>
                <v-spacer></v-spacer>
                <like :content="data"></like>
            </v-card-title>



            <edit-reply v-if="editing" :reply="data"></edit-reply>
            <v-card-text v-else v-html="reply"></v-card-text>
            <v-divider></v-divider>
            <div v-if="!editing">
                <v-card-actions v-if="own">
                    <v-btn icon small>
                        <v-icon color="orange" @click="edit">edit</v-icon>
                    </v-btn>
                    <v-btn icon small @click="destroy">
                        <v-icon color="red">delete</v-icon>
                    </v-btn>
                </v-card-actions>
            </div>
        </v-card>
    </div>
</template>

<script>
import EditReply from './EditReply.vue';
import Like from '../Likes/Like.vue';
export default {
    props:['data', 'index'],
    data(){
        return{
            editing: false
        }
    },
    created(){
        this.listen();
    },
    components:{EditReply, Like},
    computed:{
        own(){
            return User.own(this.data.user_id);
        },
        reply(){
            return md.parse(this.data.reply);
        }
    },
    methods:{
        destroy(){
            EventBus.$emit('destroyReply', this.index)
        },
        edit(){
            this.editing = true;
        },
        listen(){
            EventBus.$on('cancelEditing', () => {
                this.editing = false;
            })
        }
    }
}
</script>

<style>

</style>
