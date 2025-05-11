<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

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
     * @return array<string, ValidationRule|array|string>
     */
    public function rules(): array
    {
        $rule = Rule::unique('articles', 'name');

        if ($this->isMethod('PATCH')) {
            $rule->ignore($this->route('id'), 'id');
        }
        return [
            'name' => ['required',  'string', 'max:255', 'min:3', $rule],
            'state' => ['required', 'string', 'in:draft,published'],
            'likes_count' => ['nullable', 'integer', 'min:0'],
            'category_id' => ['required', 'integer', 'exists:article_categories,id'],
            'body' => ['required', 'string', 'min:3'],
        ];
    }
}
