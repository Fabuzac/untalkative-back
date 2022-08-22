<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use App\Http\Requests\RegisterRequest;
use App\Http\Requests\LoginRequest;

class AuthenticationController extends Controller
{
    public function register(Request $request, RegisterRequest $validation)
    {
        // CHECK FORM INPUT
        $validator = Validator::make(
            $request->all(), 
            $validation->rules(), 
            $validation->messages()
        );

        if($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 401);
        }

        // CREATE IN TABLE USER
        $user = User::create([
            'email' => $request->input('email'),
            'name' => $request->input('name'),
            'password' => bcrypt($request->input('password')),
            'api_token' => Str::random(60),
        ]);

        return response()->json($user);
    }

    public function login(Request $request, LoginRequest $validation)
    {
        $email = $request->input('email');

        // CHECK FORM INPUT
        $validator = Validator::make(
            $request->all(), 
            $validation->rules(), 
            $validation->messages()
        );

        if($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 401);
        }

        // INPUT CHECK
        if(Auth::attempt(['email' => $email, 'password' => $request->input('password')])) {
            
            $user = User::where('email', $email)->firstOrFail();

            return response()->json($user);

        } else {
            return response()->json(['errors' => 'Wrong login ID'], 401);
        };
    }
}
