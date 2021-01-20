<template>
  <v-row>
    <span class="headline ml-5">クラブ投稿</span>
    <v-container justify="center">
      <v-row>
        <v-col cols="12" sm="6">
          <v-text-field label="クラブ名" v-model="clubsName"> </v-text-field>
        </v-col>
        <v-col cols="12" sm="6">
          <v-select
            :items="['1~10', '10~20', '20~30']"
            label="メンバー数"
            required
          >
          </v-select>
        </v-col>
        <v-col cols="12" sm="6">
          <v-select
            :items="[
              '指定なし',
              'シルバー',
              'ゴールド',
              'プラチナ',
              'ダイヤ',
              'マスター'
            ]"
            label="募集ランク"
            required
            suffix="以上"
          >
          </v-select>
        </v-col>
        <v-col cols="12" sm="6">
          <v-select :items="['ps4', 'pc']" label="ハードウェア" required>
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
        <v-col cols="12" sm="12">
          <!-- text-fieldsのほうがいいかも -->
          <v-textarea
            counter
            label="メッセージ（150文字）"
            :rules="rules"
            :value="value"
          >
          </v-textarea>
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
    return {
      people_id: "",
      herdWare: "",
      mainPic: "",
      secondPic: "",
      thirdPic: "",
      rank: "",
      message: "",
      psid: "",
      voiceChat: { label: "", value: "" },
      vcItem: [
        { label: "ON", value: "1" },
        { label: "OFF", value: "0" }
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
