<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Message;

class MessageController extends Controller
{
    public function store(Request $request)
    {
        $message = Message::create([
            'body' => $request->input('message'),            
            'user_id' => 1,
        ]);

        return response()->json($request->all());
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
