<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
//やり取りするモデルを宣言する
use App\Models\Post;

class PostController extends Controller
{
    // 一覧ページ
    public function index() {
        // DBからpostsテーブルの全データを新しい順で取得する。全データを取得するだけの場合はPost::all()だけでよい
        $posts = Post::latest()->get();
        // 変数$postをposts/index.blade.phpに渡す,その際はcompact関数を使う。引数には$はつけない！
        return view('posts.index', compact('posts'));
    }

    // 作成ページ
    public function create(){
        return view('posts.create');
    }

    //作成機能->ララベルではアクションの引数においてRequestクラスの型宣言を行うことで、フォームから送信された入力内容を取得できる
    public function store(Request $request){//Requestクラスを型宣言としたstore関数を作成。引数は$request
        //バリデーション追加
        $request->validate([
            'title' => 'required',
            'content' => 'required',
        ]);
        $post = new Post(); //Post()をnewしインスタンス化、自由に使えるように
        $post->title = $request->input('title');    //titleをformタグから取得
        $post->content = $request->input('content');    //contentをformタグから取得
        $post->save();  //データに保存
        return redirect()->route('posts.index')->with('flash_message','投稿が完了しました。');
        //index.phpにリダイレクトする、その際メッセージをつけるためwith関数を使用。with()メソッドは上記のように第1引数にキー、第2引数に値を指定することで、セッションにそのデータを保存できます。なお、セッションに保存されたデータはsession()ヘルパーを使えば取得できる
    }

    // 詳細ページ
    public function show(Post $post) {//showページではPost型を宣言し、引数を$postにすることによって中身を取り出している。
        return view('posts.show', compact('post'));
    }

    // 編集ページ
    public function edit(Post $post){
        return view('posts.edit',compact('post'));
    }

    // 更新機能
    //updateアクションの場合はリクエストで取得すると共に「どのデータを更新するか」という情報も必要です。
    //よって、showアクションやeditアクションと同様に、Postモデルのインスタンスを受け取ります。
    //その際は複数のデータを受け取りたい場合は、単純に引数を複数設定するだけでOK.インスタンス化する必要はない。
    public function update(Request $request, Post $post) {
    //バリデーション追加
    $request->validate([
        'title' => 'required',
        'content' => 'required',
    ]);
    $post->title = $request->input('title');
    $post->content = $request->input('content');
    $post->save();
    //リダイレクト先は投稿詳細ページなので、route()メソッドの第2引数にPostモデルのインスタンス（$post）を渡す
    return redirect()->route('posts.show', $post)->with('flash_message', '投稿を編集しました。');
    }

    // 削除機能
    public function destroy(Post $post) {
    $post->delete();

    return redirect()->route('posts.index')->with('flash_message', '投稿を削除しました。');
    }
}

