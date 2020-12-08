<template>
  <v-row>  
    <span  class="headline ml-5">フレンドを検索</span>
    <v-container justify="center">
        <v-row>
            <v-col
            cols="12"
            sm="6"
            >
            <v-select
                :items="['ps4', 'pc']"
                label="ハードウェア"
                required
            >
            </v-select>
            </v-col>
            <v-col
            cols="12"
            sm="6"
            >
            <v-select
                :items="['ON', 'OFF']"
                label="ボイスチャット"
                required
            ></v-select>
            </v-col>
            <v-col
            cols="12"
            sm="6"
            >
            <v-select
                :items="['silver', 'gold', 'plat4', 'plat3', 'dia4', 'dia3', 'dia2', 'master']"
                label="ランク"
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
                label="メイン使用キャラクター"
                multiple
            >
            </v-autocomplete>
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