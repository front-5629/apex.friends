<template>
  <v-container>
    <transition>
      <v-row v-show="isShow">
        <v-btn
          right
          fixed
          rounded
          @click="viewPosts"
          width="90px"
          class="friend-btn"
          >フレンド</v-btn
        >
        <v-btn
          right
          fixed
          rounded
          @click="viewClubs"
          width="90px"
          class="club-btn"
          >クラブ</v-btn
        >
      </v-row>
    </transition>

    <v-row
      v-if="this.$store.state.postFlag.flag === 'posts'"
      justify="center"
      align="center"
    >
      <v-col v-for="post in posts" :key="post.id" cols="12" sm="8" md="6">
        <v-card>
          <v-row class="ma-0">
            <v-col cols="7" class="pt-0 pr-0 pb-0">
              <v-card-title>
                {{ post.psid }}
              </v-card-title>
            </v-col>
            <v-col cols="5" class="pa-0">
              <v-card-text>
                {{ post.created_at | dateFilter }}
              </v-card-text>
            </v-col>
          </v-row>

          <v-card-text>
            <v-row class="px-3">
              <v-chip label outlined>
                {{ post.headware }}
              </v-chip>
              <v-chip label outlined class="mx-3">
                <v-icon>{{ post.voice_chat | convertMicicon }}</v-icon>
              </v-chip>
              <v-chip label outlined>
                {{ post.require_rank }}
              </v-chip>
            </v-row>

            <v-row align="center" class="px-3">
              <v-chip label outlined class="px-3 mt-2">
                {{ post.mainpic }}
              </v-chip>
              <span class="title px-1 mt-2">＞</span>
              <v-chip label outlined class="px-3 mt-2">
                {{ post.secondpic }}
              </v-chip>
              <span class="body-2 px-1 mt-2">＞</span>
              <v-chip label outlined class="px-3 mt-2">
                {{ post.thirdpic }}
              </v-chip>
            </v-row>
          </v-card-text>

          <v-divider class="mx-4"></v-divider>

          <v-row class="ma-0">
            <v-card-text class="px-5">
              {{ post.message }}
            </v-card-text>
          </v-row>
        </v-card>
      </v-col>
      <!-- 表示されない。スタイルを適用する必要あり -->
      <Pagination :data="posts" @move-page="movePage($event)"></Pagination>
    </v-row>

    <v-row v-else justify="center" align="center">
      <v-col v-for="club in clubs" :key="club.id" cols="12" sm="8" md="6">
        <v-card>
          <v-row class="ma-0">
            <v-col cols="7" class="pt-0 pr-0 pb-0">
              <v-card-title>
                {{ club.clubs_name }}
              </v-card-title>
            </v-col>
            <v-col cols="5" class="pa-0">
              <v-card-text>
                <p>{{ club.created_at | dateFilter }}</p>
              </v-card-text>
            </v-col>
          </v-row>
          <v-card-text outlined>
            <v-chip-group column>
              <v-chip label outlined>
                {{ club.clubs_headware }}
              </v-chip>

              <v-chip label outlined>
                <v-icon>{{ club.voice_chat | convertMicicon }}</v-icon>
              </v-chip>

              <v-chip label outlined> {{ club.require_rank }} 以上 </v-chip>

              <v-chip label outlined> {{ club.clubs_member }}人 </v-chip>
            </v-chip-group>
          </v-card-text>
          <v-divider class="mx-4"></v-divider>

          <v-row class="ma-0">
            <v-card-text class="px-5">
              {{ club.message }}
            </v-card-text>
          </v-row>
        </v-card>
      </v-col>
    </v-row>
  </v-container>
</template>

<script>
const axios = require("axios");
const moment = require("moment");
import Pagination from "~/components/Pagination.vue";

export default {
  components: {
    Pagination
  },

  data() {
    return {
      page: 1,
      posts: [],
      clubs: {},
      scrollY: 0,
      isShow: true
    };
  },

  mounted: function() {
    // this.$axios.$get("http://127.0.0.1:8000/api/posts").then(response => {
    //   this.posts = response;
    // });

    this.$axios.$get("http://127.0.0.1:8000/api/clubs").then(response => {
      this.clubs = response;
    });

    this.getPosts();

    window.addEventListener("scroll", this.onScroll);
  },

  // 　絞り込み検索機能までCO
  //最初にapi/postをmutationする
  // created: function() {
  //   const res = this.$axios.$get("http://127.0.0.1:8000/api/posts");
  //   this.$store.commit("post/setPost", res);
  // },

  //storeのpostの中身を取得してpostsに代入
  //エラーでないが表示されない
  // mounted: function() {
  //   const post = this.$store.getters["post/getPost"];
  //   this.posts = post;
  // },

  watch: {
    scrollY(newValue, oldValue) {
      this.$set(this, "isShow", newValue < oldValue);
    }
  },

  methods: {
    getPosts() {
      const url = "http://127.0.0.1:8000/api/posts?page=" + this.page;
      this.$axios
        .$get(url)
        .then(res => {
          this.posts = res.data;
        })
        .catch(error => {
          console.log(error);
        });
    },

    viewPosts() {
      this.$store.commit("postFlag/setPost", "posts");
    },

    viewClubs() {
      this.$store.commit("postFlag/setPost", "clubs");
    },

    onScroll() {
      this.$set(this, "scrollY", window.pageYOffset);
    },

    movePage(page) {
      this.page = page;
      this.getItems();
    }
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

<style lang="scss">
.friend-btn {
  margin-right: 100px;
  z-index: 1;
}

.club-btn {
  z-index: 1;
}
</style>
