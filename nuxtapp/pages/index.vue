<template>
  <v-row justify="center" align="center">
    <v-col 
      v-for="post in posts" 
      :key="post.id"
      cols="12" sm="8" md="6"
    >
      <v-card>
        <v-card-title>
          {{ post.people_id }}
        </v-card-title>
        <v-card-text outlined>
          <!-- <tr v-for="post in posts" :key="post.id">
            <td>{{ post.headware }}</td>
            <td>{{ post.message }}</td>
          </tr> -->
        <v-chip-group
          column
        >
          <v-chip>{{post.require_rank}}</v-chip>

          <v-chip>{{post.mainpic}}</v-chip>

          <v-chip>{{post.secondpic}}</v-chip>

          <v-chip>{{post.thirdpic}}</v-chip>
        </v-chip-group>
        </v-card-text>
        <v-divider class="mx-4"></v-divider>

        <v-card-text>
          {{post.message}}
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
      posts: []
    }
  },

  mounted: function() {
    this.$axios
      .$get('http://localhost:8000/api/posts')
      .then(response => {
        this.posts = response
      })

}};

</script>
