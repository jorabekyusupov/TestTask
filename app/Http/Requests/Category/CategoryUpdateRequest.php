<?php

namespace App\Http\Requests\Category;

use Illuminate\Foundation\Http\FormRequest;

class CategoryUpdateRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'name' => 'nullable|string|max:255',
            'parent_id' => 'nullable|integer',
            'status' => 'nullable|integer'
        ];
    }

    public function authorize(): bool
    {
        return true;
    }
}
