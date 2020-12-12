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
            <v-btn @click="getUser">
                ユーザー情報取得
            </v-btn>
        </v-col>
    </v-row>
</template>

<script>
const axios = require('axios');

export default {
    data: {
        loggedIn: '',
        email: '',
        password: '',
        result: '',
        message:''
    },

    methods: {
        login(){
            axios.get('http://localhost:8000/sanctum/csrf-cookie')
                .then(response => {
                    axios.post('http://127.0.0.1:8000/api/login' , {
                        email: this.email,
                        password: this.password
                    })
                    .then(response => {
                        loggedIn = response.data.result;
                    })
                    .catch(error => {
                        console.log("response error", error.response)
                    });
                });
        },

        getUser() {
            axios.get('/api/logout')
                .then(response => {
                    console.log(response.data);
                });
        }
    }
}
</script>