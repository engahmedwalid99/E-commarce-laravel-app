<?php

namespace App\Http\Requests\News;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class newsletterRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'email' => [
                'email',
                'required',
                'min:5',
                'max:40',
                'unique:newsletter,email'
            ]
        ];
    }

    public function messages(): array
    {
        return [
            'email.unique' => 'This email is already subscribed to our newsletter.',
        ];
    }
}