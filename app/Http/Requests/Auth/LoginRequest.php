<?php

namespace App\Http\Requests\Auth;

// use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;
class LoginRequest extends FormRequest
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
                'string',
                'email',
                'min:10',
                'max:30',
                'exists:users,email',
            ],
            'password' => [
                'required',
                'string',
                'min:8',
            ],
            'remember' => [
                'nullable',
                'in:on,of'
            ],
            'g-recaptcha-response' => [
                'required',
            ],
        ];
    }

    public function messages(): array{
        return [
            'g-recaptcha-response.required' => 'Please verify that you are not a robot.',
        ];
    }
}