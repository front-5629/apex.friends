<template>
  <v-row>  
    <span  class="headline ml-5">フレンド投稿</span>
    <v-container justify="center">
        <v-row>
            <v-col
            cols="12"
            sm="6"
            >
            <v-autocomplete
                :items="['ps4', 'pc']"
                label="ハードウェア"
                multiple
            >
            </v-autocomplete>
            </v-col>
            <v-col
            cols="12"
            sm="6"
            >
            <v-select
                :items="['指定なし' ,'ON', 'OFF']"
                label="ボイスチャット"
                required
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
                required
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
            sm="12"
            >
            <v-autocomplete
                :items="['レイス', 'パスファインダー','ジブラルタル','ホライゾン','ライフライン',
                         'バンガロール','コースティック','ブラッドハウンド','オクタン','ランパート',
                         'ローバ','ミラージュ','クリプト','レヴナント','ワットソン']"
                label="使用キャラクター"
                multiple
            >
            </v-autocomplete>
            </v-col>
            <v-col
            cols="12"
            sm="12"
            >
            <v-textarea
            counter
            label="メッセージ（100文字）"
            :rules="rules"
            :value="value"
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
    >
    検索
    </v-btn>
  </v-row>
</template>

<script>
  export default {
    data: () => ({
      rules: [v => v.length <= 100 || '100文字以上は投稿できません'],
      value: '',
    }),
  }
</script>