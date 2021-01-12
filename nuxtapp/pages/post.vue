<template>
  <!-- heightを有効にしてflatでスクロールバーを実装したため、レスポンシブ対応必要-->
  <v-card height="60rem" flat>
    <v-toolbar>
      <v-tabs>
        <v-tabs-slider color="red"></v-tabs-slider>
        <v-spacer />
        <v-tab>
          フレンド
        </v-tab>
        <v-tab>
          クラブ
        </v-tab>
        <v-spacer />
        <v-tab-item>
          <v-card>
            <v-card-text>
              <PostPeople />
            </v-card-text>
          </v-card>
        </v-tab-item>

        <v-tab-item>
          <v-card>
            <v-card-text>
              <PostClubs />
            </v-card-text>
          </v-card>
        </v-tab-item>
      </v-tabs>
    </v-toolbar>
  </v-card>
</template>

<script>
import PostPeople from "~/components/PostPeople.vue";
import PostClubs from "~/components/PostClubs.vue";

export default {
  components: {
    PostPeople,
    PostClubs
  }
};
</script>
