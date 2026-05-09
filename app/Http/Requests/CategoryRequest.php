<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CategoryRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'required|max:10|string|unique:categories,name,' . $this->input('id'),
            'id' => 'required|integer|exists:categories,id',
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => 'カテゴリを入力してください',
            'name.string' => 'カテゴリを文字列で入力してください。',
            'name.max' => 'カテゴリを10文字以内で入力してください',
            'name.unique' => 'カテゴリが既に存在しています',
        ];
    }
}
