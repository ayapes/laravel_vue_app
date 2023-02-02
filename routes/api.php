<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

// Laravel8から使うコントローラのuseが必要
use App\Http\Controllers\BookController;
use App\Http\Controllers\UserController;

// Laravel8から書き方が変更された
// apiに対応したrestfulにしておく

// apiResource=>get.post.put,deleteに対応したルーティングを自動で生成する
Route::apiResource('/books',BookController::class);

Route::post('/books/search', [BookController::class, 'search']);

Route::apiResource('/users',UserController::class);

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });
