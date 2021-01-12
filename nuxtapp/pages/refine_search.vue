<template>
  <v-card>
    <v-toolbar flat>
      <v-tabs>
        <v-tabs-slider color="red"></v-tabs-slider>
        <v-spacer />
        <v-tab>
          フレンド
        </v-tab>

        <v-tab>
          クラブ
        </v-tab>
        <v-spacer />
        <v-tab-item>
          <v-card>
            <v-card-text>
              <SearchPeople />
            </v-card-text>
          </v-card>
        </v-tab-item>

        <v-tab-item>
          <v-card>
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
import SearchPeople from "~/components/SearchPeople.vue";
import SearchClubs from "~/components/SearchClubs.vue";

export default {
  components: {
    SearchPeople,
    SearchClubs
  }
};
</script>
