<template>
  <v-row justify="center" align="center">
    <v-col cols="12" sm="8" md="6">
      <v-card>
        <v-card-title>
          <v-icon large left>mdi-twitter</v-icon>nokkin-jiro
        </v-card-title>
        <v-card-text outlined>
          <tr v-for="item in items" :key="item.id">
        <td>{{ item.id }}</td>
        <td>{{ item.psid }}</td>
      </tr>
        </v-card-text>
      </v-card>
    </v-col>
  </v-row>
</template>

<script>
const axios = require('axios');

export default{

  data() {
    return {
      items: []
    }
  },

  mounted: function() {
    this.$axios
      .$get('http://localhost:8000/api/people')
      .then(response => {
        this.items = response
      })

}};

</script>
