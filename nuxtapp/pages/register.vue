<template>
    <v-row justify="center">
        <form v-if="!loggedIn">
            <span>新規登録</span>
            <v-text-field 
            v-model="registerName"
            label="PS or PCID"
            >
            </v-text-field>
            <v-text-field 
            v-model="registerEmail"
            label="メールアドレス"
            >
            </v-text-field>
            <v-text-field 
            v-model="registerPassword"
            label="パスワード"
            >
            </v-text-field>
            <v-btn @click="register">
                登録
            </v-btn>
            <v-btn to="/login" nuxt>
                ログイン画面へ
            </v-btn>
        </form>
        <v-col v-else>
            <span >ログイン中</span>
            <v-btn to="/login" nuxt>
                ログイン画面へ
            </v-btn>
        </v-col>
    </v-row>
</template>

<script>
const axios = require('axios');

export default {
    data: {
        loggedIn: '',
        registerName: '',
        registerEmail: '',
        registerPassword: '',
    },

    methods: {
        register(){
            axios.post('http://127.0.0.1:8000/api/register' , {
                registerName: this.registerName,
                registerEmail: this.registerEmail,
                registerPassword: this.registerPassword
            })
            .then(response => {
                this.loggedIn = data.result;
            })
            .catch(error => {
                console.log("response error", error.response)
            });
        }
    },

}

</script>