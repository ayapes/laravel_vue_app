<template>
    <h1>本の貸し出しデータベース</h1>
<BookList/>
<UserList/>
</template>

<script>
import axios from "axios";
import BookList from './components/BookList.vue';
import UserList from './components/UserList.vue';

export default {
    name: 'App',
    components:{
        BookList,
        UserList
    },

    data(){
      return {
// 
      }
    },
    async mounted() {
// 
    }
}
</script>