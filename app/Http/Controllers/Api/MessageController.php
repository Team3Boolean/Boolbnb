<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Message;

class MessageController extends Controller
{
    public function index()
    {
        $messages = Message::all();
        return response()->json([
            "success" => true,
            "results" => $messages
        ]);
    }
    public function store(Request $request){
        $request->validate([
            'text' => 'required|max:255|min:10',
            'email' => 'required',
            'ip' => 'required'
        ]);

        $message = Message::create($request->validated());

        return $message;

    }
}
