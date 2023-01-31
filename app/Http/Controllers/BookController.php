<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
// 追加
use App\Models\Book;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $books = Book::all();
        // eloquantをそのままreturnすると、jsonに変換してくれる。
        return $books;
    }
    public function store(Request $request)
    {
        // モデルの空のインスタンスを生成
        $book = new Book();

        // 受け取ったリクエストのデータすべて取得
        $form = $request->all();

        // 不要な列を削除
        unset($form['_token']);

        // 受け取ったデータをインスタンスに挿入し、DBに保存
        $book->fill($request->all())->save();
    }
}