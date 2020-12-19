<template>
  <v-row justify="center" align="center">
    <v-col 
      v-for="post in posts" 
      :key="post.id"
      cols="12" sm="8" md="6"
    >
      <v-card>
        <v-row>
          <v-col cols="6" sm="6">
            <v-card-title>
              {{ post.psid }}
            </v-card-title>
          </v-col>
          <v-col cols="6" sm="6">
            <v-card-text>
              <p>{{post.created_at}}</p>
            </v-card-text>
          </v-col>
          <v-card-text outlined>
          <v-chip-group
            column
          >
            <v-chip
            label
            outlined
            >
            {{post.headware}}
            </v-chip>

            <v-chip
            label
            outlined
            v-bind:class="active">
              <v-icon>mdi-microphone</v-icon>
            </v-chip>
             <!-- filterで変換するのを要検証 -->

            <!-- <v-chip
            label
            outlined
            >
              <v-icon v-if="post.voice_chat = 0">mdi-microphone-off</v-icon>
            </v-chip> -->

            <v-chip
            label
            outlined
            >
            {{post.require_rank}}
            </v-chip>

            <v-chip
            label
            outlined
            >
            {{post.mainpic}}
            </v-chip>

            <v-chip
            label
            outlined
            >
            {{post.secondpic}}
            </v-chip>

            <v-chip
            label
            outlined
            >
            {{post.thirdpic}}
            </v-chip>
            
          </v-chip-group>
          </v-card-text>
          <v-divider class="mx-4"></v-divider>

          <v-card-text>
            {{post.message}}
          </v-card-text>
        </v-row>
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
      posts: [],
      active: false
    }
  },

  compoted: {
    function(){
      if(this.post.voice_chat !== 1){
        return  {
          active: false
        }
      }
    }
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
        
      this.$router.push('/');
    }
  }

};

</script>
