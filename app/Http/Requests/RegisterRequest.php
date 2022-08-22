<?php

namespace App\Http\Requests;

class RegisterRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => ['required', 'string', 'max:150', 'min:3'],
            'email' => ['required', 'string', 'email', 'max:150', 'min:3', 'unique:users'],
            'password' => ['required', 'string', 'min:8'],
            'confirm_password' => ['required', 'same:password'],
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'You must specify your name',
            'email.required' => 'You must specify your email',
            'email.unique' => 'This email is already used',
            'password.min' => 'Your password must be at least 8 characters',
            'confirm_password.same' => 'Your password and your confirmation password must be identical',
        ];
    }
}
