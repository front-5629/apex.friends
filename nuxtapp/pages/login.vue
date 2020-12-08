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
        loggedIn: false,
        email: '',
        password: ''
    },

    methods: {
        login(){
            axios.get('/sanctum/csrt-cookie')
                .then(response => {
                    const url = 'http://127.0.0.1:8000/api/Login';
                    const params = {
                        email: this.email,
                        password: this.password
                    };
                    axios.post(url, params)
                        .then(response => {
                            this.loggedIn = response.data.result;
                        })
                        .catch(error => {
                           console.log("response error", error.response)
                        });
                });
        },
        //login()が４０４エラー
        getUser() {
            axios.get('/api/user')
                .then(response => {
                    console.log(response.data);
                });
        }
    }
}
</script>
