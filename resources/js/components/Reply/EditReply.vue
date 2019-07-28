<template>
    <div>
        <vue-simplemde v-model="reply.reply" ref="markdownEditor" preview-class="markdown-body"/>
        <v-card-actions>
            <v-btn icon small>
                <v-icon color="green" @click="update">save</v-icon>
            </v-btn>
            <v-btn icon small @click="cancel">
                <v-icon color="black">cancel</v-icon>
            </v-btn>
        </v-card-actions>
    </div>
</template>

<script>
export default {
    props:['reply'],
    methods:{
        cancel(){
            EventBus.$emit('cancelEditing')
        },
        update(){
            axios.patch(`/api/question/${this.reply.question_slug}/reply/${this.reply.id}`, {body:this.reply.reply})
                .then(res => this.cancel())
        }
    }

}
</script>

<style>

</style>
