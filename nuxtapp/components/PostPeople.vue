<template>
  <v-row>
    <span class="headline ml-5">フレンド投稿</span>
    <v-container justify="center">
      <v-row>
        <v-col cols="12" sm="6" class="postItem">
          <v-text-field label="ID" v-model="psid" :rules="idRules"></v-text-field>
          <p v-if="errors['psid']" class="error-message">※{{ errors["psid"][0] }}</p>
        </v-col>
        <v-col cols="12" sm="6" class="postItem">
          <v-select :items="['PS4', 'PC']" label="ハードウェア" v-model="herdWare"></v-select>
          <p v-if="errors['headware']" class="error-message">※{{ errors["headware"][0] }}</p>
        </v-col>
        <v-col cols="12" sm="6" class="postItem">
          <v-select
            :items="vcItem"
            item-text="label"
            item-value="value"
            label="ボイスチャット"
            v-model="voiceChat"
            return-object
          ></v-select>
          <p v-if="errors['voice_chat']" class="error-message">※{{ errors["voice_chat"][0] }}</p>
        </v-col>
        <v-col cols="12" sm="6" class="postItem">
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
            v-model="rank"
          ></v-select>
          <p v-if="errors['require_rank']" class="error-message">※{{ errors["require_rank"][0] }}</p>
        </v-col>
        <v-col cols="12" sm="4" class="postItem">
          <v-select :items="picList" label="キャラ優先度１" v-model="mainPic"></v-select>
          <p v-if="errors['mainpic']" class="error-message">※{{ errors["mainpic"][0] }}</p>
        </v-col>
        <v-col cols="12" sm="4" class="postItem">
          <v-select :items="picList" label="キャラ優先度２" v-model="secondPic"></v-select>
          <p v-if="errors['secondpic']" class="error-message">※{{ errors["secondpic"][0] }}</p>
        </v-col>
        <v-col cols="12" sm="4" class="postItem">
          <v-select :items="picList" label="キャラ優先度３" v-model="thirdPic"></v-select>
          <p v-if="errors['thirdpic']" class="error-message">※{{ errors["thirdpic"][0] }}</p>
        </v-col>
        <v-col cols="12" sm="12" class="postItem">
          <v-textarea counter label="メッセージ（100文字以内）" v-model="message" :rules="messageRules"></v-textarea>
          <p v-if="errors['message']" class="error-message">※{{ errors["message"][0] }}</p>
        </v-col>
        <v-col></v-col>
      </v-row>
    </v-container>
    <v-row class="pl-6">※全項目入力が必要です</v-row>
    <v-row justify="end" class="mr-2">
      <v-btn color="blue darken-1" text to="/" nuxt class="caption mr-2">閉じる</v-btn>
      <v-btn color="blue darken-1" outlined @click="postPeople">投稿</v-btn>
    </v-row>
  </v-row>
</template>

<script>
const axios = require("axios");

export default {
  data() {
    return {
      people_id: "",
      herdWare: "",
      mainPic: "",
      secondPic: "",
      thirdPic: "",
      rank: "",
      message: "",
      psid: "",
      errors: "",
      messageRules: [text => text.length <= 100 || "100文字を超えています"],
      idRules: [text => text.length <= 20 || "20文字を超えています"],
      voiceChat: { label: "", value: "" },
      vcItem: [
        { label: "ON", value: "1" },
        { label: "OFF", value: "0" }
      ],
      picList: [
        "レイス",
        "パスファインダー",
        "ジブラルタル",
        "ホライゾン",
        "ライフライン",
        "バンガロール",
        "コースティック",
        "ブラッドハウンド",
        "ヒューズ",
        "オクタン",
        "ランパート",
        "ローバ",
        "ミラージュ",
        "クリプト",
        "レヴナント",
        "ワットソン"
      ]
    };
  },

  methods: {
    postPeople() {
      let people = {
        //people_idはnot nullなのでsqlの設定を変えるまでは１を仮に入れておく
        //そもそもログイン機能実装までpeople_idとの紐付けは必要ないので
        people_id: 1,
        headware: this.herdWare,
        mainpic: this.mainPic,
        secondpic: this.secondPic,
        thirdpic: this.thirdPic,
        require_rank: this.rank,
        voice_chat: this.voiceChat.value,
        message: this.message,
        psid: this.psid
      };

      this.$axios
        // .post("http://localhost:8000/api/posts", people)
        .post("https://apexfriends-api.herokuapp.com/api/posts", people)
        .then(response => {
          console.log(response.data);
          this.$router.push("/");
        })
        .catch(error => {
          this.errors = error.response.data.errors;
        });
    }
  }
};
</script>

<style lang="scss">
.error-message {
  color: rgb(221, 7, 7);
}

.postItem {
  padding-top: 10px;
  padding-bottom: 0;
}
</style>
