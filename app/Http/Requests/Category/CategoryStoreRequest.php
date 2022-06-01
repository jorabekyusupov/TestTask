<?php

namespace App\Http\Requests\Category;

use Illuminate\Foundation\Http\FormRequest;

class CategoryStoreRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'name' => 'required|string|max:255',
            'parent_id' => 'nullable|integer',
            'status' => 'nullable|integer',
        ];
    }

    public function authorize(): bool
    {
        return true;
    }
}
