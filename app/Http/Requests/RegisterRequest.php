<?php

namespace App\Http\Requests;

use Illuminate\Validation\Rules\Password;
use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'email'    => 'required|email|max:255|unique:users,email',
            'username' => 'required|string|min:2|max:32|regex:/^[a-zA-Z0-9_.]+$/|unique:users,username',
            'password' => ['required', Password::defaults()],
            'name'     => 'nullable|string|max:32'
        ];
    }
}
