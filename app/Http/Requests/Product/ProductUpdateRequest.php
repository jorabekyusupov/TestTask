<?php

namespace App\Http\Requests\Product;

use Illuminate\Foundation\Http\FormRequest;

class ProductUpdateRequest extends FormRequest
{
    public function rules()
    {
        return [
            'name' => 'nullable|string|max:255',
            'description' => 'nullable',
            'price' => 'nullable|numeric',
            'category_id' => 'nullable|integer'
        ];
    }

    public function authorize()
    {
        return true;
    }
}
