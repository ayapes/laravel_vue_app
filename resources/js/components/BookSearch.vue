<template>
    <h3>書籍検索</h3>
    <div class="mb-5">
      <label for="search" class="form-label">本を検索</label>
      <input type="text" name="search" id="" v-model="keyword" class="form-control">
    </div>
    <div class="booklist" v-for="datum in data" :key="datum.book_id">
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
    name: 'BookSearch',
    data() {
      return {
        data: '',
        dummy: '/images/bookicon.png',
        keyword: '',
      }
    },

    methods: {
      async search() {
        console.log(this.keyword)
      const url = "/api/books";
      const response = await axios.post(url,this.keyword);
      this.data = response.data;
      }
    },

  }
  </script>
  <style>
  
  </style>