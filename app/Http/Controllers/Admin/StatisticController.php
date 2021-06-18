<?php

namespace App\Http\Controllers\Admin;

use App\Comment;
use App\Http\Controllers\Controller;
use App\Message;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class StatisticController extends Controller
{
    public function showStats(User $user, Message $messages, Comment $comments)
    {
        $doctor_id = Auth::id();

        $user = User::where('id', $doctor_id)->first();

        $messages = Message::where('user_id', $doctor_id)->get();

        $comments = Comment::where('user_id', $doctor_id)->get();   


        return view('admin.statistics', compact('user', 'messages', 'comments'));
    }
}
