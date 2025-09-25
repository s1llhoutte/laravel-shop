<?php

namespace App\Http\Requests\Product;

use Illuminate\Foundation\Http\FormRequest;

class UpdateRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'title' => 'nullable|string',
            'description' => 'nullable|string',
            'content' => 'nullable|string',
            'preview_image' => 'nullable|file',
            'price' => 'nullable|integer',
            'count' => 'nullable|integer',
            'is_published' => 'nullable|boolean',
            'category_id' => 'nullable|integer|exists:categories,id',
            'tags' => 'nullable|array',
            'colors' => 'nullable|array',
        ];
    }
}
