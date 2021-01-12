<template>
  <v-row>
    <span class="headline ml-5">フレンドを検索</span>
    <v-container justify="center">
      <v-row>
        <v-col cols="12" sm="6">
          <v-autocomplete :items="['ps4', 'pc']" label="ハードウェア" multiple>
          </v-autocomplete>
        </v-col>
        <v-col cols="12" sm="6">
          <v-select
            :items="['指定なし', 'オン', 'オフ']"
            label="ボイスチャット"
            required
          ></v-select>
        </v-col>
        <v-col cols="12" sm="6">
          <v-select
            :items="['指定なし', 'gold', 'plat', 'dia', 'master']"
            label="募集ランク"
            required
          >
          </v-select>
        </v-col>
        <v-col cols="12" sm="6">
          <span>以上</span>
        </v-col>
        <v-col cols="12" sm="6">
          <v-autocomplete
            :items="['1~10', '10~20', '20~30']"
            label="メンバー数"
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
