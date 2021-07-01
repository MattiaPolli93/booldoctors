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
        // prendo i dati del dottore registrato in base al suo id
        $doctor_id = Auth::id();

        $user = User::where('id', $doctor_id)->first();

        // filtro i messaggi in base all'id del dottore
        $messages = Message::where('user_id', $doctor_id)->get();          
        

        return view('admin.messages', compact('user', 'messages'));

    }
}
