<?php

namespace App\Http\Requests\Auth;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class UpdatePassword extends FormRequest
{

    public function authorize(): bool
    {
        return true;
    }


    public function rules(): array
    {
        return [
            'current_password' => 'required|string|min:8',
            'password' => [
                'required',
                'string',
                'min:8',
                'confirmed'
            ],
        ];
    }
}
