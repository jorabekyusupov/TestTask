<?php

namespace App\Http\Requests\Order;

use Illuminate\Foundation\Http\FormRequest;

class OrderStoreRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'user_id' => 'required|integer',
            'status' => 'required',
            'address' => 'required|string',

        ];
    }

    public function authorize(): bool
    {
        return true;
    }
}
