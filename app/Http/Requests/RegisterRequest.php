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
            'name' => 'required|string',
            'username' => 'required|string',
            'email' => 'required|email',
            // 'password' => 'required|string'
            // 'password' => 'required|string|min:6|confirmed',
            'password' => 'required|string|min:6',
        ];
    }

    // public function messages()
    // {
    //     return [
    //         // 'password.required' => 'La contraseña es obligatoria.',
    //         'password.confirmed' => 'La confirmación de la contraseña no coincide.',
    //     ];
    // }
}
