<template>
  <v-app>
    <v-app-bar color="red darken-3" :clipped-left="clipped" fixed app>
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

    <v-footer color="red darken-3" padless>
      <v-row justify="center" no-gutters>
        <v-btn v-for="link in links" :key="link" color="white" text rounded class="my-2">{{ link }}</v-btn>
        <v-col class="red darken-3 py-4 text-center white--text" cols="12">
          {{ new Date().getFullYear() }} —
          <strong>@APEX FRIENDS</strong>
        </v-col>
      </v-row>
    </v-footer>
    <!-- footerコピペの為 links紐付け等行う -->
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
