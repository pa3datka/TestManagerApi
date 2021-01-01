<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            'name' => ['required','string', 'min:2', 'max:30', 'unique:users'],
            'email' => ['required', 'string', 'unique:users', 'email'],
            'password' => ['required', 'min:3', 'string', 'max:255', 'confirmed']
        ];
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array
     */
    public function messages(): array
    {
        return [
            "email.unique" => "Пользователь с таким 'E-mail' уже существует",
            "name.unique" => "Пользователь с таким именем уже существует",
            "password.confirmed" => 'Пароль не совпадает'
        ];
    }
}
