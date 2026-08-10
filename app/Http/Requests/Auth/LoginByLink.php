<?php

namespace App\Http\Requests\Auth;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class LoginByLink extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
         return [
            'email' => [
                'required',
                'email',
                'min:10',
                'max:30',
                'exists:users,email'
            ]
        ];
    }
}