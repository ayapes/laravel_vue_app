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
        
        // 特に返すものがないのでreturnは必要ない
        // return △△△;
    }
    public function search(Request $request)
    {
        // キーワードを受け取れているか確認
        // dd($request->keyword);
        // 教科書P246参照
        //  'LIKE',あいまい検索してください指示
        // '%'.$request->keyword.'%' 検索前後に余計な文字ついててもOK
        $items = Book::where('title', 'like','%'.$request->keyword.'%')
        ->orWhere('author', 'like','%'.$request->keyword.'%')
        ->orWhere('publisher', 'like','%'.$request->keyword.'%')
        ->orWhere('ISBN', 'like','%'.$request->keyword.'%')
        ->orWhere('summary', 'like','%'.$request->keyword.'%')
        ->get();
        
        return $items;
    }
}