<template>
  <v-row justify="center" align="center">
    <v-col 
      v-for="post in posts" 
      :key="post.id"
      cols="12" sm="8" md="6"
    >
      <v-card>
        <v-card-title>
          {{ post.psid }}
        </v-card-title>
        <v-card-text outlined>
        <v-chip-group
          column
        >
          <v-chip>{{post.require_rank}}</v-chip>

          <v-chip>{{post.mainpic}}</v-chip>

          <v-chip>{{post.secondpic}}</v-chip>

          <v-chip>{{post.thirdpic}}</v-chip>
        </v-chip-group>
        </v-card-text>
        <v-divider class="mx-4"></v-divider>

        <v-card-text>
          {{post.message}}
        </v-card-text>

      </v-card>
    </v-col>
    <v-btn @click="postPeople">
      ボタン
    </v-btn>
  </v-row>
</template>

<script>
const axios = require('axios');

export default{

  data() {
    return {
      posts: []
    }
  },

  beforeCreate:
    function(){
      this.$axios.$get('/sanctum/csrf-cookie').then(response => {
        // ログイン処理…
      });
    },

  mounted:
    function() {
      this.$axios
        .$get('http://127.0.0.1:8000/api/posts')
        .then(response => {
          this.posts = response
        })
    },

  methods: {
    postPeople() {
      let people = {
        'people_id' : 3,
        'headware' : 'ps4',
        'mainpic' : 'オクタン',
        'secondpic' : 'レイス',
        'thirdpic' : 'コースティック',
        'require_rank' : 'plat3',
        'voice_chat' : 0,
        'message' : '楽しもうや',
        'psid' : 'yamaguchi'
      }


      this.$axios
        .post('http://localhost:8000/api/posts', people)
        .then(response => {
          console.log(response.data);
        })
        .catch( error =>{
          console.log("response error", error.response)
        })
    }
  }

};

</script>
