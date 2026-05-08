@extends('layouts.app')

@section('title', 'Categories')
@section('styles')
    <link rel="stylesheet" href="{{ asset('css/category.css') }}">
@endsection

@section('content')
    @if(session('message'))
        <div class="success-message">
            <p>{{ session('message') }}</p>
        </div>
    @endif

    @if($errors->any())
        <div class="error-messages">
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="/categories" method="POST">
        @csrf
        <input type="text" name="name" placeholder="Enter category name" required>
        <button class="btn" type="submit">作成</button>
    </form>

    <table>
        <thead>
            <tr>
                <th>カテゴリ名</th>
                <th></th>
            </tr>
        </thead>

        <tbody>
            @foreach($categories as $category)
                <tr>
                    <td>
                        <form action="/categories/update" method="POST" class="action-cell">
                            @csrf
                            @method('PATCH')
                            <input type="text" name="name" required value="{{ $category->name }}">
                            <input type="hidden" name="id" value="{{ $category->id }}">
                            <button class="btn update-btn" type="submit">更新</button>
                        </form>
                    </td>

                    <td class="action-cell">
                        <form action="/categories/delete" method="POST">
                            @csrf
                            @method('DELETE')
                            <input type="hidden" name="id" value="{{ $category->id }}">
                            <button class="btn delete-btn" type="submit">削除</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection