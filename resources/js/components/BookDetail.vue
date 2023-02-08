<template>
    <h3>
        書籍詳細情報
    </h3>
    <h4>{{bookData}}</h4>
</template>
<script>
import axios from "axios";

export default {
    name: 'BookDetail',
    data() {
    return {
      bookData:{},
      dummy: '/images/bookicon.png',
    }
  },
  async mounted() {
    // const url = `/api/books/${this.$route.params.id}`;
    // const response = await axios.get(url);
    // this.bookData = response.data;
    
    // ↓api/books/1はBookControllerのshow()で指定されるようになった。
    axios.get(`/api/books/${this.$route.params.id}`)
      .then(response => this.bookData = response.data)
  },
}
</script>