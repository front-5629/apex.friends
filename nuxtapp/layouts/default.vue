<template>
  <v-app>
    <v-app-bar :clipped-left="clipped" fixed app>
      <v-app-bar-nav-icon @click.stop="drawer = !drawer" />
      <v-spacer />
      <v-toolbar-title v-text="title" />
      <v-spacer />
      <v-btn icon @click.stop="rightDrawer = !rightDrawer">
        <v-icon>mdi-menu</v-icon>
      </v-btn>
    </v-app-bar>
    <v-main>
      <v-container>
        <nuxt />
      </v-container>
    </v-main>
    <v-navigation-drawer v-model="rightDrawer" :right="right" temporary fixed>
      <v-list>
        <v-list-item @click.native="right = !right">
          <v-list-item-action>
            <v-icon light>mdi-repeat</v-icon>
          </v-list-item-action>
          <v-list-item-title>Switch drawer (click me)</v-list-item-title>
        </v-list-item>
      </v-list>
    </v-navigation-drawer>

    <v-footer v-bind="localAttrs" :padless="padless">
      <v-card flat tile width="100%" class="red lighten-1 text-center">
        <v-card-text>
          <v-btn v-for="icon in icons" :key="icon" class="mx-4" icon>
            <v-icon size="24px">{{ icon }}</v-icon>
          </v-btn>
        </v-card-text>

        <v-divider></v-divider>

        <v-card-text class="white--text">
          {{ new Date().getFullYear() }} —
          <strong>@APEX FRIENDS</strong>
        </v-card-text>
      </v-card>
    </v-footer>
    <!-- footerコピペの為 icon紐付け等行う -->
  </v-app>
</template>

<script>
export default {
  data() {
    return {
      // clipped: false,
      // drawer: false,
      // fixed: false,
      // items: [
      //   {
      //     icon: "mdi-apps",
      //     title: "Welcome",
      //     to: "/"
      //   },
      //   {
      //     icon: "mdi-chart-bubble",
      //     title: "Inspire",
      //     to: "/inspire"
      //   }
      // ],
      // miniVariant: false,
      // right: true,
      // rightDrawer: false,
      title: "APEX FRIENDS"
    };
  }
};
</script>
