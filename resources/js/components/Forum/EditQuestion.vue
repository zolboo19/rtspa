<template>
<v-container>
            <form @submit.prevent="update">
                <v-text-field
                    v-model="form.title"
                    label="Асуулгын гарчиг"
                    type="text"
                ></v-text-field>

                <vue-simplemde v-model="form.body" ref="markdownEditor" preview-class="markdown-body"/>

                <v-card-actions>
                    <v-btn icon small type="submit">
                        <v-icon color="teal">save</v-icon>
                    </v-btn>
                    <v-btn icon small @click="cancel">
                        <v-icon>delete</v-icon>
                    </v-btn>
                </v-card-actions>


            </form>
    </v-container>
</template>

<script>
export default {
    props: ['data'],
    data(){
        return{
            form:{
                title: null,
                body: null,
            }
        }
    },
    methods:{
        cancel(){
            EventBus.$emit('cancelEditing');
        },
        update(){
            axios.patch(`/api/question/${this.form.slug}`, this.form)
                .then(res => this.cancel())
                .catch(error => console.log(error.response.data))
        }
    },
    created(){
        this.form = this.data
    }

}
</script>

<style>

</style>
