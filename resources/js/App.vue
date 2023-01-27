<template>
    <h1>Hello World</h1>
    <h3>本のタイトル</h3>
    <ul v-for="datum in data" class="list-group">
        <li  class="list-group-item">{{ datum.title }}</li>
    </ul>
<h3>ユーザー一覧</h3>
    <ul v-for="user in users" class="list-group list-group-horizontal w-50">
        <li class="list-group-item w-50 p-2">{{ user.name }}</li>
        <li class="list-group-item w-50 p-2">{{ user.email }}</li>
    </ul>
</template>

<script>
import axios from "axios";

export default {
    name: 'App',
    data(){
      return {
        data:'',
        users:'',
      }
    },
    async mounted() {
        const url_b = "http://127.0.0.1:8000/api/books";
        const response_b = await axios.get(url_b);
        console.log(response_b.data);
        this.data = response_b.data;

        const url_u = "http://127.0.0.1:8000/api/users";
        const response_u = await axios.get(url_u);
        console.log(response_u.data);
        this.users = response_u.data;
    }
}
</script>