<template>
  <h3>書籍情報</h3>
  <div class="mb-5">
    <label for="search" class="form-label">本を検索</label>
    <input type="text" name="search" id="" v-model="keyword" class="form-control">
  </div>
  <div class="booklist" v-for="datum in search_data" :key="datum.book_id">
    <p class="booklist_title">{{ datum.title }}</p>
    <p class="booklist_img">
      <!-- 画像データがなければダミー画像表示するv-if -->
      <span v-if="datum.img"><img :src="datum.img" alt=""></span>
      <span v-else><img :src="dummy" alt=""></span>
    </p>
    <div class="booklist_others">
      <p class="booklist_author">著者：{{ datum.author }}</p>
      <p class="booklist_publisher">出版社：{{ datum.publisher }}</p>
      <p class="booklist_isbn">ISBN：{{ datum.ISBN }}</p>
      <p class="booklist_gunre">ジャンル：{{ datum.gunre }}</p>
      <p class="booklist_summary">{{ datum.summary }}</p>
    </div>
  </div>

</template>

<script>
import axios from "axios";

export default {
  name: 'BookList',
  data() {
    return {
      data: [],
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
      .then(response => this.data = response.data);
  },
  // methods: {
  //   search() {
  //     console.log(this.keyword)
  //     // value→なんでもいい仮引数
  //     // filter()は続けて使える（メソッドチェーン）
  //     this.data = this.data.filter(value => value.title.includes(this.keyword));
  //     console.log(this.data);
  //   }
  // },

  computed:  {
    
    search_data() {
      return this.data.filter(value => {
        return value.title.includes(this.keyword) ||
          value.author.includes(this.keyword) ||
          value.publisher.includes(this.keyword) ||
          value.ISBN.includes(this.keyword) ||
          value.summary.includes(this.keyword)
      });
    },

  },


}
</script>
<style>

</style>