<template>
  <v-app>
    <v-app-bar color="red darken-3" :clipped-left="clipped" fixed app>
      <v-btn class="">
        <v-icon>mdi-login-variant</v-icon>
      </v-btn>
      <v-spacer />
      <v-toolbar-title 
        class="font-weight-bold"
      >
        APEX FRIENDS
      </v-toolbar-title>
      <v-spacer />
      <v-btn  right icon @click.stop="rightDrawer = !rightDrawer">
        <v-icon>mdi-menu</v-icon>
      </v-btn>
    </v-app-bar>
    <v-main>
      <v-container>
        <nuxt />
      </v-container>
    </v-main>
    <v-navigation-drawer v-model="rightDrawer" temporary fixed right>
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
    </v-navigation-drawer>

    <v-footer color="red darken-3" padless>
      <v-row justify="space-around" no-gutters>
        <v-btn 
          v-for="icon in icons" 
          :key="icon" 
          class="my-1"
          icon
        >
          <v-icon size="24px">
            {{ icon }}
          </v-icon>
        </v-btn>
        <v-col class="red darken-3 text-center white--text" cols="12">
          {{ new Date().getFullYear() }} —
          <strong>@APEX FRIENDS</strong>
        </v-col>
      </v-row>
    </v-footer>
  </v-app>
</template>

<script>
export default {
  data: ()=>({
    icons: [
      'mdi-home',
      'mdi-magnify',
      'mdi-pencil-plus',
      // 'mdi-microphone',
      // 'mdi-microphone-off',
    ],
    rightDrawer: false,
    menuGroup: null,
  }),

  wqtch:{
    menuGroup(){
      this.rightDrawer = false
    },
  },
};
</script>
