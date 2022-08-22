<?php

namespace App\Http\Requests;

class LoginRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [            
            'email' => ['required', 'email'],
            'password' => ['required', 'string']            
        ];
    }

    public function messages()
    {
        return [
            'email.required' => 'You must specify your email',            
            'password.required' => 'You must specify your password',
        ];
    }
}
