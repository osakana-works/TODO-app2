@extends('layouts.app')

@section('title', 'ログイン')
@section('styles')
    <link rel="stylesheet" href="{{ asset('css/login.css') }}">
@endsection

@section('content')
<body>
    <h1>ログイン</h1>
    
    <form method="POST" action="{{ route('login') }}">
        @csrf
        
        <div class="form-group">
            <label for="email">メールアドレス</label>
            <input type="email" id="email" name="email" value="{{ old('email') }}" required autofocus>
            @error('email')
                <p class="error">{{ $message }}</p>
            @enderror
        </div>
        
        <div class="form-group">
            <label for="password">パスワード</label>
            <input type="password" id="password" name="password" required>
            @error('password')
                <p class="error">{{ $message }}</p>
            @enderror
        </div>
        
        <button type="submit">ログイン</button>
    </form>
    
    <p class="link">
        <a href="{{ route('register') }}">アカウントをお持ちでない方はこちら</a>
    </p>
</body>
@endsection

