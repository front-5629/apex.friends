<template>
    <v-row justify="center">
        <form v-if="!loggedIn">
            <span>ログインフォーム</span>
            <v-text-field 
            v-model="email"
            label="メールアドレス"
            >
            </v-text-field>
            <v-text-field 
            v-model="password"
            label="パスワード"
            >
            </v-text-field>
            <v-btn @click="login">
                ログイン
            </v-btn>
            <v-btn to="/register" nuxt>
                新規登録へ
            </v-btn>
            
        </form>
        <v-col v-else>
            <span >ログイン中</span>
            <v-btn @click="logout">
                ログアウト
            </v-btn>
        </v-col>
    </v-row>
</template>

<script>
const axios = require('axios');

export default {
    data() {
        return{
        loggedIn: '',
        email: '',
        password: ''
        }
    },

    methods: {
        login(){
            axios.get('http://localhost:8000/sanctum/csrf-cookie')
                .then(response => {
                    axios.post('http://localhost:8000/api/login' , {
                        email: this.email,
                        password: this.password
                    })
                    .then(response => {
                        // loggedIn = response.loggedIn;
                        this.loggedIn = response.data.loggedIn;
                    })
                    .catch(error => {
                        console.log('responseError', error)
                    });
                });
        },

        logout() {
            axios.post('http://localhost:8000/api/logout')
                .then(response => {
                    this.loggedIn = response.data.loggedIn;
                    this.$router.push('/');
                });
        }
    }
}
</script>