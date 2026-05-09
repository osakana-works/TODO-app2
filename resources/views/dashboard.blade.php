@extends('layouts.app')

@section('title', 'ダッシュボード')

@section('styles')
    <link rel="stylesheet" href="{{ asset('css/dashboard.css') }}">
@endsection

@section('content')
<body>
        <div class="container">
        <h1>ダッシュボード</h1>
        
        <div class="card">
            <h2>ようこそ、{{ $user->name }}さん！</h2>
            <p>メールアドレス: {{ $user->email }}</p>
            <p>登録日: {{ $user->created_at->format('Y年m月d日') }}</p>
        </div>

        <div class="btn-container">
            <button onclick="window.location.href='/'" class="todolist-btn">TODOリストへ</button>

            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit" class="logout-btn">ログアウト</button>
            </form>
        </div>
    </div>
</body>
@endsection
