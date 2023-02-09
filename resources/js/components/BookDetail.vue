<template>
  <h3>
    書籍詳細情報
  </h3>
  <!-- <h4>{{bookData}}</h4> -->
  <div class="booklist">
    <p class="booklist_title">{{ bookData.title }}</p>
    <p class="booklist_img">
      <!-- 画像データがなければダミー画像表示するv-if -->
      <span v-if="bookData.img" data-bs-toggle="modal" data-bs-target="#exampleModal"><img :src="bookData.img"
          alt=""></span>
      <span v-else><img :src="dummy" alt=""></span>
    </p>
    <div class="booklist_others">
      <p class="booklist_author">著者：{{ bookData.author }}</p>
      <p class="booklist_publisher">出版社：{{ bookData.publisher }}</p>
      <p class="booklist_isbn">ISBN：{{ bookData.ISBN }}</p>
      <p class="booklist_gunre">ジャンル：{{ bookData.gunre }}</p>
      <p class="booklist_summary">{{ bookData.summary }}</p>
    </div>
  </div>


  <!-- Modal -->
  <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <span v-if="bookData.img"><img :src="bookData.img" alt="" style="width:100%;"></span>
          <span v-else><img :src="dummy" alt="" style="width:100%;"></span>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>
</template>
<script>
import axios from "axios";

export default {
  name: 'BookDetail',
  data() {
    return {
      bookData: {},
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