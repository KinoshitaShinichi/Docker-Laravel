<?php

use Illuminate\Support\Facades\Route;
// ルーティングを設定するコントローラを宣言する
use App\Http\Controllers\PostController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [PostController::class, 'index']);

/*
 // 投稿の一覧ページ
 Route::get('/posts', [PostController::class, 'index'])->name('posts.index');

 // 投稿の作成ページ
 Route::get('/posts/create', [PostController::class, 'create'])->name('posts.create');

 // 投稿の作成機能
 Route::post('/posts', [PostController::class, 'store'])->name('posts.store');
//  Route::postのpostの意味は「このデータを送るので受け取ってください」という意味。
//  getは「このページの情報をください」という意味。

 // 投稿の詳細ページ
 Route::get('/posts/{post}', [PostController::class, 'show'])->name('posts.show');
 // {post}=idみたいなもの

 // 投稿の更新ページ
 Route::get('/posts/{post}/edit', [PostController::class, 'edit'])->name('posts.edit');
 // {post}=idの編集ページへ

 // 投稿の更新機能
 Route::patch('/posts/{post}', [PostController::class, 'update'])->name('posts.update');
 //更新機能のHTTPリクエストメソッドをPATCHにしていますが、PUTでも構いません。厳密には以下のような役割の違いがありますが、LaravelではどちらのHTTPリクエストメソッドを使っても同じupdateアクションを実行するため、使い分ける必要がないのです。
    //PUT：全体的な更新
    //PATCH：部分的な更新

// 投稿の削除機能
Route::delete('/posts/{post}', [PostController::class, 'destroy'])->name('posts.destroy');
//Route::delete=削除
*/

Route::resource('posts', PostController::class);
