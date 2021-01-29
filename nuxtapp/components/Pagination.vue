<template>
  <v-container>
    <ul class="pagination">
      <!-- prev_page_urlが存在するなら表示 -->
      <li class="page-item" v-if="hasPrev">
        <a
          class="page-link"
          href="#"
          @click.prevent="move(data.current_page - 1)"
          >前へ</a
        >
      </li>
      <li :class="getPageClass(page)" v-for="page in pages" :key="page">
        <a
          class="page-link"
          href="#"
          v-text="page"
          @click.prevent="move(page)"
        ></a>
      </li>
      <!-- next_page_urlが存在するなら表示 -->
      <li class="page-item" v-if="hasNext">
        <a
          class="page-link"
          href="#"
          @click.prevent="move(data.current_page + 1)"
          >次へ</a
        >
      </li>
    </ul>
  </v-container>
</template>

<script>
export default {
  props: {
    // paginate()で取得したデータ
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
      let classes = ["page-item"];

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

    // 1~last_page(存在する最後のページ)までをpages[]に代入
    pages() {
      let pages = [];

      for (let i = 1; i <= this.data.last_page; i++) {
        pages.push(i);
      }

      return pages;
    }
  }
};
</script>
