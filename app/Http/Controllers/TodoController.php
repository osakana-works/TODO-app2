<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Todo;
use App\Http\Requests\TodoRequest;
use App\Models\Category;

class TodoController extends Controller
{
    public function index()
    {
        $todos = Todo::with('category')->get();
        $categories = Category::all();
        return view('index', compact('todos', 'categories'));
    }

    public function store(TodoRequest $request)
    {   
        $validated = $request->validated();
        Todo::create(
            [
                'content' => $validated['content'],
                'category_id' => $validated['category_id'],
            ]
        );

        return redirect('/')->with('message', 'Todoを作成しました。');
    }

    public function update(TodoRequest $request)
    {  
        $validated = $request->validated();

        $id= $request->input('id');
        $todo = Todo::find($id);
        $todo->update([
            'content' => $validated['content'],
            'category_id' => $todo->category_id, 
        ]);

        return redirect('/')->with('message', 'Todoを更新しました。');
    }   

    public function destroy(Request $request)
    {
        $id= $request->input('id');

        $todo = Todo::find($id);
        $todo->delete();

        return redirect('/')->with('message', 'Todoを削除しました。');
    }

    public function search(Request $request)
    {
        $todos = Todo::with('category')
            ->CategorySearch($request->category_id)
            ->KeywordSearch($request->keyword)
            ->get();
        $categories = Category::all();
        return view('index', compact('todos', 'categories'));
    }
}
