<template>
    <div v-if="question">
        <edit-question
            :data=question
            v-if="editing"
        ></edit-question>
        <show-question
            :data=question
            v-else
        ></show-question>

        <v-container>
            <replies :question="question"></replies>
            <create-reply v-if="logIn" :questionSlug="question.slug"></create-reply>

            <div class="mt-4" v-else>
                <router-link to="/login">Нэвтрэх</router-link>
            </div>

        </v-container>

    </div>

</template>

<script>

import EditQuestion from '../Forum/EditQuestion.vue';
import ShowQuestion from '../Forum/ShowQuestion.vue';
import Replies from '../Reply/Replies.vue';
import CreateReply from '../Reply/CreateReply.vue';
export default {
    data(){
        return{
            question:null,
            editing: false,
        }
    },
    components:{ShowQuestion, EditQuestion, Replies, CreateReply},
    created(){
        this.listen();
        this.getQuestion();
    },
    computed:{
        logIn(){
            return User.loggedIn()
        }
    },
    methods:{
        listen(){
            EventBus.$on('startEditing', () => {
                this.editing = true;
            })

            EventBus.$on('cancelEditing', () => {
                this.editing = false;
            })

        },
        getQuestion(){
            axios.get(`/api/question/${this.$route.params.slug}`)
            .then(res => this.question = res.data.data)
            .catch()
        }

    }
}
</script>

<style>

</style>
