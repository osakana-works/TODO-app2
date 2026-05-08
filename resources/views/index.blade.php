@extends('layouts.app')

@section('title', 'Todo List')

@section('styles')
    <link rel="stylesheet" href="{{ asset('css/index.css') }}">
@endsection

@section('content')
    <div class="messages">
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
    </div>

    <h1>新規作成</h1>
        <form action="/todos" method="POST" class="add-form">
            @csrf
            <input type="text" name="content" placeholder="Enter todo content" required>
            <select name="category_id" required>
                <option value="">Select category</option>
                @foreach($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                @endforeach
            </select>
            <button class="btn" type="submit" >作成</button>
        </form>
    <h1>Todo検索</h1>
        <form action="/todos/search" method="get" class="add-form">
            @csrf
            <input type="text" name="keyword" value="{{ old('keyword') }}" placeholder="Enter todo content">
            <select name="category_id">
                <option value="">Select category</option>
                @foreach($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                @endforeach
            </select>
            <button class="btn" type="submit" >検索</button>
        </form>
    </div>

    <div class="container">
        <table>
            <thead>
                <tr>
                    <th>Todo</th>
                    <th>カテゴリ</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @foreach($todos as $todo)
                    <tr>
                        <td>
                            <form action="/todos/update" method="POST">
                                @csrf
                                @method('PATCH')
                                    <input type="text" name="content" value="{{ $todo->content }}" required>
                                    <input type="hidden" name="id" value="{{ $todo->id }}">
                        </td>
                        <td>
                                    <p>{{ $todo->category->name }}</p>
                        </td>
                        <td class="action-cell">
                                    <button class="btn update-btn" type="submit">更新</button>
                            </form>

                            <form action="/todos/delete" method="POST">
                                @csrf
                                @method('DELETE')
                                    <input type="hidden" name="id" value="{{ $todo->id }}">
                                    <button class="btn delete-btn" type="submit">削除</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection