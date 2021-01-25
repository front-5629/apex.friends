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
            :items="memberItem"
            label="メンバー数"
            required
            v-model="clubsMember"
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
            v-model="requireRank"
          >
          </v-select>
        </v-col>
        <v-col cols="12" sm="6">
          <v-select
            :items="['PS4', 'PC']"
            label="ハードウェア"
            v-model="clubsHeadware"
            required
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
        <v-col cols="12" sm="12">
          <v-textarea
            counter
            label="メッセージ（150文字）"
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
      <v-btn color="blue darken-1" outlined @click="postClubs">
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
      clubsName: "",
      clubsMember: "",
      clubsHeadware: "",
      requireRank: "",
      message: "",
      rules: [text => text.length <= 150 || "150文字を超えています"],
      voiceChat: { label: "", value: "" },
      vcItem: [
        { label: "ON", value: "1" },
        { label: "OFF", value: "0" }
      ],
      memberItem: [
        1,
        2,
        3,
        4,
        5,
        6,
        7,
        8,
        9,
        10,
        11,
        12,
        13,
        14,
        15,
        16,
        17,
        18,
        19,
        20
      ]
    };
  },

  methods: {
    postClubs() {
      let clubs = {
        //people_idはnot nullなのでsqlの設定を変えるまでは１を仮に入れておく
        //そもそもログイン機能実装までpeople_idとの紐付けは必要ないので
        people_id: 1,
        clubs_name: this.clubsName,
        clubs_member: this.clubsMember,
        clubs_headware: this.clubsHeadware,
        require_rank: this.requireRank,
        voice_chat: this.voiceChat.value,
        message: this.message
      };

      this.$axios
        .post("http://localhost:8000/api/clubs", clubs)
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
