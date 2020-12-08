<template>
  <v-row>  
    <span  class="headline ml-5">フレンド投稿</span>
    <v-container justify="center">
        <v-row>
            <v-col
            cols="12"
            sm="6"
            >
            <v-select
                :items="['ps4', 'pc']"
                item-value
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
                :items="['指定なし' ,'ON', 'OFF']"
                :item-text="['指定なし' ,'ON', 'OFF']"
                :item-value="['null' ,'1', '0']"
                label="ボイスチャット"
              
                v-model="voiceChat"
            ></v-select>
            </v-col>
            <v-col
            cols="12"
            sm="6"
            >
            <v-select
                :items="['silver', 'gold', 'plat4', 'plat3', 'plat2', 'plat1', 'dia4', 
                         'dia3', 'dia2', 'dia1', 'master', 'predator']"
                label="募集ランク"
            
                v-model="rank"
            >
            </v-select>
            </v-col>
            <v-col
            cols="12"
            sm="6"
            >
                <span>以上</span>
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
        hardWare:'',
        voiceChat:'',
        rank:'',
        mainPic:'',
        secondPic:'',
        thirdPic:'',
        message:'',
      }
    },

    methods: {
      postPeople(){
        let people = {
          'hardWare': this.hardWare,
          'voiceChat': this.voiceChat,
          'rank': this.rank,
          'mainPic': this.mainPic,
          'secondPic': this.secondPic,
          'thirdPic': this.thirdPic,
          'message': this.message,
        };

        this.$axios.$post('/v1/posts',people).then(response => {
          // console.log(response.data.hardWare);
          // console.log(response.data.voiceChat);
          // console.log(response.data.rank);
          // console.log(response.data.mainPic);
          // console.log(response.data.secondPic);
          // console.log(response.data.thirdPic);
          // console.log(response.data.message);
        })
        .catch( error =>{
          console.log("response error", error.response)
        })
      }
    }
  }
</script>