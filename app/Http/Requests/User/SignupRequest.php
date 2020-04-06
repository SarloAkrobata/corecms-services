<?php

namespace App\Http\Requests\User;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class SignupRequest extends FormRequest
{
    public function rules()
    {
        return [
            'username' => 'required|string|max:50',
            'email' => 'required|string|email|unique:users',
            'password' => 'required|string|confirmed'
        ];
    }
}
