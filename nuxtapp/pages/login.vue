<template>
     <!-- ログイン機能は投稿が増えるまで実装しない
     現在ログインできるが保持されず、getUser logoutなどが意味がない。ログイン成功した時点で接続されてない気がする。
     認証のsession cookie等を調べて保持できるようにする必要がある -->
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
        <span v-else>ログイン中</span>
        <v-col>
            <v-btn @click="logout">
                ログアウト
            </v-btn>
            <v-btn @click="getUser">
                ユーザーを表示
            </v-btn>
            <p>{{getUserMessage}}</p>
        </v-col>
        <span>{{user.name}}</span>
        <span>{{user.name}}</span>
    </v-row>
</template>

<script>
const axios = require('axios');

export default {
    data() {
        return{
        loggedIn: '',
        email: '',
        password: '',
        getUserMessage: '',
        user: {}
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
        },

        getUser() {
            axios.get('http://localhost:8000/api/user')
                .then(response => {
                    this.getUserMessage = response.data;
                    this.user = response.data;
                    })
                    .catch(error => {
                    console.log(error)
                    this.getUserMessage = '取得できません。'
        })
        }

    }
}
</script>