<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="{{ asset('css/normalize.css') }}">
    <link rel="stylesheet" href="{{ asset('css/common.css') }}">
    @yield('styles')

    <title>@yield('title', 'todo-app')</title>
</head>
<body>
    <header class="header">
        <div class="header__inner">
            <a href="/">todo</a>
            <a href="/categories">カテゴリ一覧</a>
        </div>
    </header>

    <main>
        @yield('content')
    </main>

    <footer class="footer">
        <p>&copy; 2026 todo-app</p>
    </footer>
</body>
</html>
