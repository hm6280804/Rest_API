<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class signupFormRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name' => ['required', 'string', 'min:3'],
            'email' => ['required', 'string', 'email', 'unique:users,email'],
            'password' => ['required', 'string', 'confirmed'],
            'password_confirmation' => ['required', 'string']
        ];
    }
}
