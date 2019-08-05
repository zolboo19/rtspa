<template>
    <div>
        <reply
                v-for="(reply, index) in contents"
                :key="reply.id"
                :data="reply"
                :index=index
            >
            </reply>
    </div>
</template>

<script>
import Reply from './Reply.vue';
export default {
    props:['question'],
    data(){
        return{
            contents:this.question.replies
        }
    },
    components:{Reply},
    created(){
        this.listen();
    },
    methods:{
        listen(){
            EventBus.$on('createReply', (Reply) =>{
                this.contents.unshift(Reply);
            })

            EventBus.$on('destroyReply', (index) => {
                axios.delete(`/api/question/${this.question.slug}/reply/${this.contents[index].id}`)
                    .then(res => {
                        this.contents.splice(index, 1)
                    })
            })

            console.log(User.id());
            Echo.private(`App.User.` + User.id())
                .notification((notification) => {
                    //console.log(notification.type);
                    this.contents.unshift(notification.reply)
                });
        }
    }
}
</script>

<style>

</style>
