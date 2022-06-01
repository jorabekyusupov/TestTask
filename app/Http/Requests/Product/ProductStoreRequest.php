<?php

namespace App\Http\Requests\Product;

use Illuminate\Foundation\Http\FormRequest;

class ProductStoreRequest extends FormRequest
{
    public function rules()
    {
        return [
            'name' => 'required|string|max:255',
            'description' => 'required',
            'price' => 'required|numeric',
            'category_id' => 'required|integer',
            'quantity' => 'required|integer',
//            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
//            'images' => 'required|array',
//            'images.*' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ];
    }

    public function authorize()
    {
        return true;
    }
}
