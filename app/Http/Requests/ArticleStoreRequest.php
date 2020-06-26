<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class ArticleStoreRequest extends FormRequest
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
            'author_id' => ['required', 'numeric', 'exists:users,id'],
            'title' => ['required', 'string', 'max:255'],
            'summary' => ['required', 'string', 'max:255'],
            'cover_image' => ['required', 'image ', 'mimes:jpeg,png,jpg,gif,svg', 'dimensions:ratio=16/9'],
            'category_id' => ['required', 'numeric', 'exists:categories,id'],
            'tags.*' => ['sometimes','nullable'],
            'body' => ['required', 'string']
        ];
    }

    protected function prepareForValidation()
    {
        $this->merge([
            'author_id' => Auth::id()
        ]);
    }
}
