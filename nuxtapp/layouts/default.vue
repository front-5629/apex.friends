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
    title: 'APEX FRIENDS',
  }),
};
</script>
