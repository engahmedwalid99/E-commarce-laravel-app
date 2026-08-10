<?php

namespace App\Http\Requests\products;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class AddProductRequest extends FormRequest
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
     * @return array<string, ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'product_name' => [
                'required',
                'min:5',
                'max:20',
                'string'
            ],
            'product_description' => [
                'min:15',
                'max:255',
                'required',
                'string'
            ],
            'price' => [
                'required',
                'numeric',
            ],
            'old_price' => [
                'numeric',
                'nullable'
            ],
            'file' => [
                // 'required',
                'image',
                'max:2048',
                'mimes:jpg,jpeg,png,webp'
            ]
        ];
    }
}
