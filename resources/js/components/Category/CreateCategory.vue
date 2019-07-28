<template>
    <v-container>
        <v-form @submit.prevent="submit">
            <v-text-field
                label="Ангилалын нэр"
                v-model="form.name"
                required
            >
            </v-text-field>
            <v-btn type="submit" color="pink" v-if="editSlug">Засах</v-btn>
            <v-btn type="submit" color="teal" v-else>Үүсгэх</v-btn>
        </v-form>

        <v-card>
        <v-toolbar color="indigo" dark>
            <v-toolbar-side-icon></v-toolbar-side-icon>

                <v-toolbar-title>Хэлэлцүүлгийн ангилалууд</v-toolbar-title>
            </v-toolbar>
            <v-list>
                <v-list-tile v-for="(category, index) in categories" :key="category.id">
                    <v-list-tile-action>
                        <v-btn icon smal @click="edit(index)">
                            <v-icon color="green">edit</v-icon>
                        </v-btn>
                    </v-list-tile-action>

                    <v-list-tile-content>
                        <v-list-tile-title>{{ category.name }}</v-list-tile-title>
                    </v-list-tile-content>

                    <v-list-tile-action>
                        <v-btn icon small @click="destroyCategory(category.slug)">
                            <v-icon color="red">delete</v-icon>
                        </v-btn>
                    </v-list-tile-action>

                </v-list-tile>
            </v-list>
        </v-card>
    </v-container>
</template>

<script>
export default {
    data(){
        return{
            form:{
                name:null
            },
            categories:{},
            editSlug: null
        }
    },
    created(){

        if(!User.admin()){
            this.$router.push('/forum')
        }

        axios.get('/api/category')
            .then(res => this.categories = res.data.data)
            .catch(error => console.log(error.response.data))
    },
    methods:{
        submit(){
            this.editSlug ? this.updateCategory() : this.createCategory()
        },
        updateCategory(){
            axios.patch(`/api/category/${this.editSlug}`, this.form)
                .then(res => {
                    //console.log(res.data)
                    this.categories.unshift(res.data)
                    this.form.name = null
                })
                .catch(error => console.log(error.response.data))
        },
        createCategory(){
            axios.post('/api/category', this.form)
                .then(res => {
                    //console.log(res.data)
                    this.categories.unshift(res.data)
                    this.form.name = null
                })
                .catch(error => console.log(error.response.data))
        },
        destroyCategory(slug, index){
            axios.delete(`/api/category/${slug}`)
                .then(res => this.categories.splice(index, 1))
                .catch(error =>console.log(error.response.data))
        },
        edit(index){
            this.form.name = this.categories[index].name
            this.editSlug = this.categories[index].slug
            this.categories.splice(index, 1)
        }
    }

}
</script>

<style>

</style>
