<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Message;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MessageController extends Controller
{
    public function showMessages(Message $messages)
    {   
        $doctor_id = Auth::id();

        $user = User::where('id', $doctor_id)->first();

        $messages = Message::where('user_id', $doctor_id)->get();          
        

        return view('admin.messages', compact('user', 'messages'));

    }
}
