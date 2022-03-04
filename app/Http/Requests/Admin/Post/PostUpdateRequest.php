<?php

namespace App\Http\Requests\Admin\Post;

use App\Models\Category;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class PostUpdateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'title' => ['required', 'string'],
            'slug' => ['required', 'string', 'unique:posts,slug,' . $this->post->id],
            'categories' => ['nullable', 'array', Rule::in(Category::pluck('id')->toArray())],
            'content' => ['required']
        ];
    }
}
