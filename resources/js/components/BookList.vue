<template>
    <h3>書籍情報</h3>
    <div class="booklist" v-for="datum in data">
    <p class="booklist_title">{{ datum.title }}</p>
    <p class="booklist_img"><img :src="datum.img" alt=""></p>
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
    name: 'Book',
    data(){
      return {
        data:'',
      }
    },
    async mounted() {
        const url_b = "/api/books";
        const response_b = await axios.get(url_b);
        this.data = response_b.data;
    }
}
</script>
<style>


</style>