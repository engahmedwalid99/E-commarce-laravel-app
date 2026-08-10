<?php

namespace App\Http\Requests\Auth;

// use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
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
                'min:5',
                'max:255'
            ],
            'email' => [
                'required',
                'string',
                'email',
                'min:10',
                'max:30',
                'unique:users,email'
            ],
            'phone' => [
                'required',
                'numeric',
                'min:11',
                'nullable',
                'unique:users,phone',
                'regex:/^01[0125][0-9]{8}$/',
            ],
            'password' => [
                'required',
                'string',
                'min:8',
                'confirmed'
            ],
            'g-recaptcha-response' => [
                'required'
            ],
            'role' => [
                'required',
                'string',
                'in:user,seller'
            ]
        ];
    }
}