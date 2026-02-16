<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ArticleRequest extends FormRequest
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
        $articleId = $this->route('id')?->id ?? null;

        return [
            'title' => 'required|string|max:255',
            'body' => 'required|string',
            'slug' => 'required|string|unique:articles'.($articleId ? ",slug,$articleId" : ''),
        ];
    }
}
