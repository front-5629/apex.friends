<template>
  <v-row justify="center" class="page-btn-row">
    <!-- prev_page_urlが存在するなら表示 -->
    <v-btn
      outlined
      tile
      v-if="hasPrev"
      @click.prevent="move(data.current_page - 1)"
      class="page-btn"
      small
    >前へ</v-btn>
    <!-- 現在のページと±1ページを表示 -->
    <v-btn
      outlined
      tile
      v-for="page in pages"
      :key="page"
      v-text="page"
      @click.prevent="move(page)"
      :class="getPageClass(page)"
      class="page-btn"
      small
    ></v-btn>
    <!-- next_page_urlが存在するなら表示 -->
    <v-btn
      outlined
      tile
      v-if="hasNext"
      @click.prevent="move(data.current_page + 1)"
      class="page-btn"
      small
    >次へ</v-btn>
  </v-row>
</template>

<script>
export default {
  props: {
    data: {}
  },

  methods: {
    // pageにページがあれば移動する
    move(page) {
      if (!this.isCurrentPage(page)) {
        this.$emit("move-page", page);
      }
    },

    isCurrentPage(page) {
      return this.data.current_page == page;
    },

    getPageClass(page) {
      let classes = [];

      if (this.isCurrentPage(page)) {
        classes.push("active");
      }
      return classes;
    }
  },

  computed: {
    hasPrev() {
      return this.data.prev_page_url != null;
    },

    hasNext() {
      return this.data.next_page_url != null;
    },

    // 現在のページ±1のページを返す
    pages() {
      let pages = [];
      let i = "";
      let nextPage = "";

      if (this.data.prev_page_url != null) {
        i = this.data.current_page - 1;
      } else {
        i = 1;
      }

      if (this.data.next_page_url != null) {
        nextPage = this.data.current_page + 1;
      } else {
        nextPage = this.data.current_page;
      }

      for (; i <= nextPage; i++) {
        pages.push(i);
      }

      return pages;
    }
  }
};
</script>

<style lang="scss">
.active {
  background-color: rgb(255, 193, 193);
}
.page-btn-row {
  width: 100%;
  margin-top: 6px;
}
.page-btn {
  opacity: 0.7;
}
</style>
