<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Http\Requests\CategoryRequest;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        return view('category', compact('categories'));
    }

    public function store(CategoryRequest $request)
    {   
        Category::create($request->validated());
        return redirect('/categories')->with('message', 'カテゴリーを作成しました。');
    }

    public function update(CategoryRequest $request)
    {   
        $validated = $request->validated();
        $id= $request->input('id');
        $category = Category::find($id);
        $category->update([
            'name' => $validated['name']
        ]);

        return redirect('/categories')->with('message', 'カテゴリーを更新しました。');
    }

    public function destroy(Request $request)
    {   
        $id= $request->input('id');

        $category = Category::find($id);
        $category->delete();

        return redirect('/categories')->with('message', 'カテゴリーを削除しました。');
    }
}
