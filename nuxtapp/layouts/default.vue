<template>
  <v-app>
    <v-app-bar app hide-on-scroll>
      <!-- ログイン画面への移動ボタン ログイン機能実装までCO中　-->
      <!-- <v-btn icon to="/login" nuxt>
        <v-icon color="red">mdi-login-variant</v-icon>
      </v-btn>-->

      <v-spacer />
      <v-toolbar-title class="app-title">APEX FRIENDS</v-toolbar-title>
      <v-spacer />
      <!-- <v-btn icon @click.stop="rightDrawer = !rightDrawer">
        <v-icon color="red">mdi-menu</v-icon>
      </v-btn>-->
    </v-app-bar>
    <v-main>
      <v-container>
        <nuxt />
      </v-container>
    </v-main>
    <!-- navタブ実装までCO -->
    <!-- <v-navigation-drawer v-model="rightDrawer" temporary fixed right>
      <v-list nav>
        <v-list-item-group
          v-model="menuGroup"
          active-class="red--text text--accent-4"
          @click.native="right = !right"
        >
          <v-list-item>
            <v-list-item-title>使い方</v-list-item-title>
          </v-list-item>

          <v-list-item>
            <v-list-item-title>ヘルプ</v-list-item-title>
          </v-list-item>

          <v-list-item>
            <v-list-item-title>お問い合わせ</v-list-item-title>
          </v-list-item>
        </v-list-item-group>
      </v-list>
    </v-navigation-drawer>-->

    <v-footer padless app>
      <v-row justify="space-around" align="center">
        <v-col cols="4">
          <v-btn block depressed to="/" nuxt @click="$vuetify.goTo(0)">
            <v-icon size="24px">mdi-home</v-icon>
          </v-btn>
        </v-col>

        <!-- 検索機能実装までco -->
        <!-- <v-col cols="4">
          <v-btn  block depressed nuxt to="/refine_search"> 
            <v-icon size="24px">mdi-magnify</v-icon>
          </v-btn>
        </v-col>-->

        <v-col cols="4">
          <v-btn block depressed nuxt to="/post">
            <v-icon size="24px">mdi-pencil-plus</v-icon>
          </v-btn>
        </v-col>
      </v-row>
    </v-footer>
  </v-app>
</template>

<script>
export default {
  data: () => ({
    rightDrawer: false,
    menuGroup: null
  }),

  watch: {
    menuGroup() {
      this.rightDrawer = false;
    }
  }
};
</script>

<style lang="scss">
.app-title {
  font-size: 1.5rem;
  color: rgb(221, 7, 7);
  font-weight: 500;
}
</style>
