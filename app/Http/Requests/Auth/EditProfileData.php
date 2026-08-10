<?php

namespace App\Http\Requests\Auth;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class EditProfileData extends FormRequest
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
            'phone' => [
                'required',
                'numeric',
                'min:11',
                'nullable',
                'regex:/^01[0125][0-9]{8}$/',
                Rule::unique('users')->ignore(auth()->id())
            ],
            'email' => [
                'required',
                'string',
                'email',
                'min:10',
                'max:30',
                Rule::unique('users', 'email')->ignore(auth()->id()),
            ],
        ];
    }
}