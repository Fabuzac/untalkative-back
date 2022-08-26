<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Message;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class MessageController extends Controller
{

    public function index()
    {
        // return view('plan', [
        //     'user' => Auth::user(),
        //     'plans' => $plans = Plan::all()
        // ]);

        $message = Message::all();

        return response()->json($message);
    }


   

    public function store(Request $request)
    {
        $token = $request->header('API-TOKEN');        

        if($token === User::where('api_token', $token)) {            

            return response()->json([ 'token' => $token]);
        }

        return response()->json([ 
            'error' => "out of the condition",
        ]);

    }

    public function show($id)
    {
        $messages = Message::find($id);

        if(!$messages) {
            return response()->json(['message' => 'No messages']);
        }

        return response()->json($messages);
    }
}
