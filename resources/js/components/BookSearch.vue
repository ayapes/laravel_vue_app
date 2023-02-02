<template>
  <h3>書籍検索</h3>
  <div class="mb-5">
    <label for="search" class="form-label">本を検索</label>
    <input type="text" name="search" id="" v-model="keyword" class="form-control">
    <button class="btn btn-primary" v-on:click="search">検索</button>
  </div>
  <div class="booklist" v-for="Book in Books" :key="Book.book_id">
    <p class="booklist_title">{{ Book.title }}</p>
    <p class="booklist_img">
      <!-- 画像データがなければダミー画像表示するv-if -->
      <span v-if="Book.img"><img :src="Book.img" alt=""></span>
      <span v-else><img :src="dummy" alt=""></span>
    </p>
    <div class="booklist_others">
      <p class="booklist_author">著者：{{ Book.author }}</p>
      <p class="booklist_publisher">出版社：{{ Book.publisher }}</p>
      <p class="booklist_isbn">ISBN：{{ Book.ISBN }}</p>
      <p class="booklist_gunre">ジャンル：{{ Book.gunre }}</p>
      <p class="booklist_summary">{{ Book.summary }}</p>
    </div>
  </div>

</template>

<script>
import axios from "axios";

export default {
  name: 'BookSearch',
  data() {
    return {
      APIdata: '',
      Books:'',
      dummy: '/images/bookicon.png',
      keyword: '',
    }
  },
  async mounted() {
    // const url = "/api/books";
    // const response = await axios.get(url);
    // this.data = response.data;
    //  ↓まとめてかいたらこうどす
    axios.get('/api/books')
      .then(response => this.Books = response.data)
  },

  methods: {
    async search() {
      console.log(this.keyword)
      const url = "/api/books/search";
      // axios.post('送信先のurl','データ')
      const response =
        await axios.post(
          url,
          { keyword: this.keyword }
        );
      console.log(response);
      this.Books = response.data;
    }
  },

}
</script>
<style>

</style>