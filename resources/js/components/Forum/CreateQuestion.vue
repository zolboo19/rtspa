<template>
    <v-container>
            <form @submit.prevent="create">
                <v-text-field
                    v-model="form.title"
                    label="Асуулгын гарчиг"
                    type="text"
                ></v-text-field>

                <v-select
                    v-model="form.category_id"
                    :items="categories"
                    item-text="name"
                    item-value="id"
                    label="Асуултын ангилалыг сонгоно уу?"
                ></v-select>

                <vue-simplemde v-model="form.body" ref="markdownEditor" preview-class="markdown-body"/>

                <v-btn type="submit" color="green">Асуулт асуух</v-btn>
            </form>
    </v-container>
</template>

<script>

export default {
    data(){
        return {
            form:{
                title: null,
                body: null,
                category_id: null,
            },
            categories:[],
            errors:{}
        }
    },
    created(){
        axios.get('/api/category')
            .then(res => this.categories = res.data.data)
            .catch(error => console.log(error.response.data))
    },
    methods:{
        create(){
            axios.post('/api/question', this.form)
                //.then(res => console.log(res.data))
                .then(res => this.$router.push(res.data.path))
                .catch(error => this.errors = error.response.data.error)
        }
    }

}
</script>

<style>

</style>
