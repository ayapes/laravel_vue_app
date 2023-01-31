<template>
    <h3>書籍の登録</h3>
    <!-- <form>はclickイベントが発生するとページを移動させる効果がある -->
    <!-- <form> -->
        <label for="title">タイトル</label>
        <!-- 双方向データーバインディング　v-model P65 -->
        <input type="text" id="title" v-model="book.title" />
        <br>
        <label for="author">著者</label>
        <input type="text" id="title" v-model="book.author" />
        <br>
        <label for="publisher">出版社</label>
        <input type="text" id="title" v-model="book.publisher" />
        <br>
        <label for="ISBN">ISBN</label>
        <input type="text" id="title" v-model="book.ISBN" />
        <br>
        <label for="summary">説明</label>
        <input type="text" id="title" v-model="book.summary" />
        <br>
        <label for="gunre">ジャンル</label>
        <input type="text" id="title" v-model="book.gunre" />
        <button v-on:click="send">送信</button>
    <!-- </form> -->
    <h5>v-modelの動作確認</h5>
    <div>{{ book.title }}</div>
</template>

<script>

import axios from "axios";

export default {
    name: "BookAdd",
    data() {
        return {
            // 入力フォームのデータを保存するオブジェクト
            book: {
                title: '',
                author:'',
                publisher:'',
                ISBN:'',
                summary:'',
                gunre:'',
                available: true,

            }
        }
    },

    methods: {
        // クリックイベントの発火時に動作するメソッド
        async send() {
            console.log('click');
            const url = "/api/books";
            // axios.post('送信先','送信データthis.')
            const response = await axios.post(url, this.book);
            console.log(response);
        }

    }
};
</script>