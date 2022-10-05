<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>新規投稿</title>
    @vite(['resources/js/app.js'])
</head>

<body>
    <header>
        <nav>
            <div>
                <a href="{{ route('posts.index') }}">投稿アプリ</a>
            </div>
        </nav>
    </header>

    <main>
        <article>
            <div>
                <h1>新規投稿</h1>
                {{-- エラーがあったときの処理 --}}
                @if ($errors->any())
                <div>
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
               @endif

                <div>
                    <a href="{{ route('posts.index') }}">&lt; 戻る</a>
                </div>

                {{-- 送信先をposts.storeに設定 --}}
                <form action="{{ route('posts.store') }}" method="post">
                    @csrf
                    <div>
                        <label for="title">タイトル</label>
                        <input type="text" name="title" value="{{ old('title') }}">
                    </div>
                    <div>
                        <label for="content">本文</label>
                        <textarea name="content" >{{ old('title') }}</textarea>
                    </div>
                    <button type="submit">投稿</button>
                </form>
            </div>
        </article>
    </main>

    <footer>
        <p>&copy; 投稿アプリ All rights reserved.</p>
    </footer>
</body>

</html>
