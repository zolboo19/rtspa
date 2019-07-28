<template>
    <div class="mt-4">
        <vue-simplemde v-model="body" ref="markdownEditor" preview-class="markdown-body"/>
        <v-btn small dark color="green" @click="submit">
            Сэтгэгдэл үлдээх
        </v-btn>
    </div>
</template>

<script>
export default {
    props:['questionSlug'],
    data(){
        return{
            body: null
        }
    },
    methods:{
        submit(){
            axios.post(`/api/question/${this.questionSlug}/reply`, {body:this.body})
                .then(res => {
                    this.body = ''
                    EventBus.$emit('createReply', res.data.Reply)
                    window.scrollTo(0,0);
                })
                .catch(error => console.error(error.response.data)
                )
        }
    }
}
</script>

<style>

</style>
