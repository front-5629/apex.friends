<template>
  <v-row justify="center" align="center">
    <v-col v-for="post in posts" :key="post.id" cols="12" sm="8" md="6">
      <v-card>
        <v-row>
          <v-col cols="6" sm="6">
            <v-card-title>
              {{ post.psid }}
            </v-card-title>
          </v-col>
          <v-col cols="6" sm="6">
            <v-card-text>
              <p>{{ post.created_at | dateFilter }}</p>
            </v-card-text>
          </v-col>
          <v-card-text outlined>
            <v-chip-group column>
              <v-chip label outlined>
                {{ post.headware }}
              </v-chip>

              <v-chip label outlined>
                <v-icon>{{ post.voice_chat | convertMicicon }}</v-icon>
              </v-chip>

              <v-chip label outlined>
                {{ post.require_rank }}
              </v-chip>

              <v-chip label outlined>
                {{ post.mainpic }}
              </v-chip>

              <v-chip label outlined>
                {{ post.secondpic }}
              </v-chip>

              <v-chip label outlined>
                {{ post.thirdpic }}
              </v-chip>
            </v-chip-group>
          </v-card-text>
          <v-divider class="mx-4"></v-divider>

          <v-card-text>
            {{ post.message }}
          </v-card-text>
        </v-row>
      </v-card>
    </v-col>
  </v-row>
</template>

<script>
const axios = require("axios");
const moment = require("moment");

export default {
  data() {
    return {
      posts: {}
    };
  },

  //storeの投稿閲覧機能作成中なのでCO
  // mounted: function() {
  //   this.$axios.$get("http://127.0.0.1:8000/api/posts").then(response => {
  //     this.posts = response;
  //   });
  // },

  //最初にapi/postをmutationする
  created: function() {
    const res = this.$axios.$get("http://127.0.0.1:8000/api/posts");
    this.$store.commit("post/setPost", res);
  },

  //storeのpostの中身を取得してpostsに代入
  //エラーでないが表示されない
  mounted: function() {
    const post = this.$store.getters["post/getPost"];
    this.posts = post;
  },

  filters: {
    //voice_chatの真偽値に応じてv-iconの表示を変える処理
    convertMicicon(value) {
      if (value === 1) {
        value = "mdi-microphone";
        return value;
      } else {
        value = "mdi-microphone-off";
        return value;
      }
    },

    dateFilter(value) {
      return moment(value).format("YYYY-MM-DD HH:MM");
    }
  }
};
</script>
