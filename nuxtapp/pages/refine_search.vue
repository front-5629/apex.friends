<template>
  <v-card>
    <v-toolbar
      color="cyan"
      dark
      flat
    >
      <v-app-bar-nav-icon></v-app-bar-nav-icon>

      <v-toolbar-title>Your Dashboard</v-toolbar-title>

      <v-spacer></v-spacer>

      <v-btn icon>
        <v-icon>mdi-magnify</v-icon>
      </v-btn>

      <v-btn icon>
        <v-icon>mdi-dots-vertical</v-icon>
      </v-btn>

        <v-tabs>
            <v-tabs-slider color="yellow"></v-tabs-slider>
            <v-tab>
                フレンド
            </v-tab>
            <v-tab>
                クラブ
            </v-tab>

            <v-tab-item>
                <v-card flat>
                <v-card-text>
                    <SearchPeople />
                </v-card-text>
                </v-card>
            </v-tab-item>
            <v-tab-item>
                <v-card flat>
                <v-card-text>
                    <SearchClubs />
                </v-card-text>
                </v-card>
            </v-tab-item>
        </v-tabs>
    </v-toolbar>
    </v-card>
</template>

<script>
  import SearchPeople from '~/components/SearchPeople.vue'
  import SearchClubs from '~/components/SearchClubs.vue'

  export default {

    components: [
        SearchPeople, SearchClubs,
    ]
  }
</script>