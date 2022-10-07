<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    <!-- CSS only (現在Viteが機能していないのでcdnを使用)-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    {{-- @vite('resources/js/app.js') --}}
</head>

<body style="padding: 60px 0;">
    @include('layouts.header')

    <main>
        <article>
            <div class="container">
                <h1 class="fs-2 my-3">@yield('title')</h1>
                @yield('content')
            </div>
        </article>
    </main>

    @include('layouts.footer')
</body>

</html>
