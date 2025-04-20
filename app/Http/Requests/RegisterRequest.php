<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'email' => 'required|email|unique:clients,email',
            'name' => 'required|string|min:3',
            'password' => 'required|min:6',
            'password_confirmation' => 'required|min:6',
            'phone_number' => 'nullable|regex:/^\+?[0-9]{5,15}$/',
        ];
    }
}
