<template>
  <v-row>
    <span class="headline ml-5">フレンドを検索</span>
    <v-container justify="center">
      <v-row>
        <v-col cols="12" sm="6">
          <v-select :items="['PS4', 'PC']" label="ハードウェア" required>
          </v-select>
        </v-col>
        <v-col cols="12" sm="6">
          <v-select
            :items="['ON', 'OFF']"
            label="ボイスチャット"
            required
          ></v-select>
        </v-col>
        <v-col cols="12" sm="6">
          <v-select
            :items="[
              'ブロンズ',
              'シルバー',
              'ゴールド',
              'プラチナ4',
              'プラチナ3',
              'プラチナ2',
              'プラチナ1',
              'ダイヤ4',
              'ダイヤ3',
              'ダイヤ2',
              'ダイヤ1',
              'マスター',
              'プレデター'
            ]"
            label="ランク"
            required
            suffix="以上"
          >
          </v-select>
        </v-col>
        <v-col cols="12" sm="6">
          <span>以上</span>
        </v-col>
        <v-col cols="12" sm="12">
          <v-autocomplete
            :items="[
              'レイス',
              'パスファインダー',
              'ジブラルタル',
              'ホライゾン',
              'ライフライン',
              'バンガロール',
              'コースティック',
              'ブラッドハウンド',
              'オクタン',
              'ランパート',
              'ローバ',
              'ミラージュ',
              'クリプト',
              'レヴナント',
              'ワットソン'
            ]"
            label="使用レジェンド"
            multiple
          >
          </v-autocomplete>
        </v-col>
      </v-row>
    </v-container>
    <small
      >*追加してほしい項目等あれば、画面右上のメニューからお問い合わせ下さい</small
    >
    <v-spacer></v-spacer>
    <v-btn color="blue darken-1" text to="/" nuxt>
      閉じる
    </v-btn>
    <v-btn color="blue darken-1" text>
      検索
    </v-btn>
  </v-row>
</template>

<script>
const axios = require("axios");

export default {
  data() {
    return {};
  },

  methods: {
    postPeople() {
      //検索フォームの入力内容を引数にcontrollerのshowメソッドにリクエスト→レスポンスをホームの投稿一覧に反映させる
      let searchItem = {
        headware: this.herdWare,
        voice_chat: this.voiceChat,
        require_rank: this.rank,
        picCharactor: this.picCharactor
      };

      this.$axios
        .$get("http://localhost:8000/api/posts", searchItem)
        .then(response => {
          console.log(response.data);
        })
        .catch(error => {
          console.log("response error", error.response);
        });

      this.$router.push("/");
    }
  }
};
</script>
