<template>
  <v-row>  
    <span  class="headline ml-5">フレンド投稿</span>
    <v-container justify="center">
        <v-row>
            <v-col
            cols="12"
            sm="6"
            >
            <v-text-field
            label="ID"
            v-model="psid"
            >
            </v-text-field>
            </v-col>
            <v-col
            cols="12"
            sm="6"
            >
            <v-select
                :items="['PS4', 'PC']"
                label="ハードウェア"
                v-model="hardWare"
            >
            </v-select>
            </v-col>
            <v-col
            cols="12"
            sm="6"
            >
            <v-select
                :items="vcItem"
                item-text="label"
                item-value="value"
                label="ボイスチャット"
                v-model="voiceChat"
                return-object
            ></v-select>
            </v-col>
            <v-col
            cols="12"
            sm="6"
            >
            <v-select
                :items="['ブロンズ', 'シルバー', 'ゴールド',
                         'プラチナ4', 'プラチナ3', 'プラチナ2', 'プラチナ1', 
                         'ダイヤ4', 'ダイヤ3', 'ダイヤ2', 'ダイヤ1', 'マスター', 'プレデター']"
                label="ランク"
                v-model="rank"
            >
            </v-select>
            </v-col>
            <v-col
            cols="12"
            sm="4"
            >
            <v-select
                :items="['レイス', 'パスファインダー','ジブラルタル','ホライゾン','ライフライン',
                         'バンガロール','コースティック','ブラッドハウンド','オクタン','ランパート',
                         'ローバ','ミラージュ','クリプト','レヴナント','ワットソン']"
                label="キャラ選択１"
           
                v-model="mainPic"
            ></v-select>
            </v-col>
            <v-col
            cols="12"
            sm="4"
            >
            <v-select
                :items="['レイス', 'パスファインダー','ジブラルタル','ホライゾン','ライフライン',
                         'バンガロール','コースティック','ブラッドハウンド','オクタン','ランパート',
                         'ローバ','ミラージュ','クリプト','レヴナント','ワットソン']"
                label="キャラ選択２"
             
                v-model="secondPic"
            ></v-select>
            </v-col>
            <v-col
            cols="12"
            sm="4"
            >
            <v-select
                :items="['レイス', 'パスファインダー','ジブラルタル','ホライゾン','ライフライン',
                         'バンガロール','コースティック','ブラッドハウンド','オクタン','ランパート',
                         'ローバ','ミラージュ','クリプト','レヴナント','ワットソン']"
                label="キャラ選択３"
            
                v-model="thirdPic"
            ></v-select>
            </v-col>
            <v-col
            cols="12"
            sm="12"
            >
            <v-textarea
            label="メッセージ（100文字以内）"
            v-model="message"
            >
            </v-textarea>
            </v-col>
        </v-row>
    </v-container>
    <small>*追加してほしい項目等あれば、画面右上のメニューからお問い合わせ下さい</small>
    <v-spacer></v-spacer>
    <v-btn
    color="blue darken-1"
    text
    to="/"
    nuxt
    >
    閉じる
    </v-btn>
    <v-btn
    color="blue darken-1"
    text
    @click="postPeople"
    >
    投稿
    </v-btn>
  </v-row>
</template>

<script>
  const axios = require('axios');

  export default {
    data() {
      return { 
        people_id: '',
        hardWare:'',
        mainPic:'',
        secondPic:'',
        thirdPic:'',
        rank:'',
        message:'',
        psid:'',
        voiceChat: [{label: '' , value: ''}],
        // vcItem:[
        //   {label: 'ON' , value: '1'},
        //   {label: 'OFF' , value: '0'}
        // ]
        vcItem: [{label: 'ON', value:1}]
        //オブジェクトか配列のどちらを受け取るべきかわからない。どちらでもエラーでるのでhtml側で指定方法要検討
      }
    },

    methods: {
      postPeople(){
        let people = {
          'people_id' : 1,
          'hardWare' : this.hardWare,
          'mainpic' : this.mainPic,
          'secondpic' : this.secondPic,
          'thirdpic' : this.thirdPic,
          'require_rank' : this.rank,
          'voice_chat' : this.voiceChat,
          'message' : this.message,
          'psid' : this.psid
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
  }
</script>