<?php

namespace App\Http\Requests\Order;

use Illuminate\Foundation\Http\FormRequest;

class OrderUpdateRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'user_id' => 'required|integer',
            'status' => 'required|integer',
            'address' => 'required|string',
        ];
    }

    public function authorize(): bool
    {
        return true;
    }
}
