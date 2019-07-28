<template>
    <v-container>
        <form @submit.prevent="login">
            <v-text-field
            v-model="form.email"
            label="Цахим хаяг"
            type="email"
            ></v-text-field>

            <v-text-field
            v-model="form.password"
            label="Нэвтрэх нууц үг"
            type="password"
            ></v-text-field>


            <v-btn type="submit" color="green">Нэвтрэх</v-btn>
            <!-- <v-btn @click="clear">clear</v-btn> -->

            <router-link to="/signup">
                <v-btn color="blue">Бүртгүүлэх</v-btn>
            </router-link>
        </form>
    </v-container>
</template>

<script>
export default {
    data(){
        return {
            form:{
                email: null,
                password: null
            }
        }
    },
    created(){
        if(User.loggedIn()){
            this.$router.push({name: 'forum'});
        }
    },
    methods:{
        login(){
            //alert('Login Ажиллаж байна.');
            User.login(this.form);
            //this.$router.push({name: 'forum'});
        }
    }

}
</script>

<style>

</style>
