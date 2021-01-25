<template>
  <v-row>
    <span class="headline ml-5">フレンド投稿</span>
    <v-container justify="center">
      <v-row>
        <v-col cols="12" sm="6">
          <v-text-field label="ID" v-model="psid"> </v-text-field>
        </v-col>
        <v-col cols="12" sm="6">
          <v-select
            :items="['PS4', 'PC']"
            label="ハードウェア"
            v-model="herdWare"
          >
          </v-select>
        </v-col>
        <v-col cols="12" sm="6">
          <v-select
            :items="vcItem"
            item-text="label"
            item-value="value"
            label="ボイスチャット"
            v-model="voiceChat"
            return-object
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
            v-model="rank"
          >
          </v-select>
        </v-col>
        <v-col cols="12" sm="4">
          <v-select
            :items="picList"
            label="キャラ優先度１"
            v-model="mainPic"
          ></v-select>
        </v-col>
        <v-col cols="12" sm="4">
          <v-select
            :items="picList"
            label="キャラ優先度２"
            v-model="secondPic"
          ></v-select>
        </v-col>
        <v-col cols="12" sm="4">
          <v-select
            :items="picList"
            label="キャラ優先度３"
            v-model="thirdPic"
          ></v-select>
        </v-col>
        <v-col cols="12" sm="12">
          <v-textarea
            counter
            label="メッセージ（100文字以内）"
            v-model="message"
            :rules="rules"
          >
          </v-textarea>
        </v-col>
      </v-row>
    </v-container>
    <v-row justify="end" class="mr-2">
      <v-btn color="blue darken-1" text to="/" nuxt class="caption mr-2">
        閉じる
      </v-btn>
      <v-btn color="blue darken-1" outlined @click="postPeople">
        投稿
      </v-btn>
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
      rules: [text => text.length <= 100 || "100文字を超えています"],
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
        .post("http://localhost:8000/api/posts", people)
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
