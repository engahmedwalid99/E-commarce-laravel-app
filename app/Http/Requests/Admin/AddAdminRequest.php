<?php

namespace App\Http\Requests\Admin;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class AddAdminRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name' => [
                'required',
                'string',
                'max:20',
                'min:5'
            ],
            'email' => [
                'required', 
                'string',
                'email',
                'unique:users,email'
            ],
            'phone' => [
                'required',
                'numeric',
                // 'regex:/^01[0125][0-9]{8}$/',
                'regex:/^01[0125][0-9]{8}$/',
                'unique:users,phone',
                'min:10',
                // 'max:13'
            ],
            'password' => [
                'required',
                'string',
                'min:5'
            ]
        ];
    }
}
