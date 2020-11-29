<template>
  <v-row justify="center" align="center">
    <v-col cols="12" sm="8" md="6">
      <v-card>
        <v-card-title>
          <v-icon large left>mdi-twitter</v-icon>nokkin-jiro
        </v-card-title>
        <v-card-text outlined>{{ip}}</v-card-text>
      </v-card>
    </v-col>
  </v-row>
</template>

<script>
const axios = require('axios');

export default{
  async asyncData({ $axios }) {
    const ip = await $axios.$get('http://localhost:8000/api/people')
    return { ip };
}};

</script>
