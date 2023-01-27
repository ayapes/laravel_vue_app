<template>
    <h3>本のタイトル</h3>
    <ul v-for="datum in data" class="list-group">
        <li  class="list-group-item">{{ datum.title }}</li>
    </ul>
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
        console.log(response_b.data);
        this.data = response_b.data;
    }
}
</script>