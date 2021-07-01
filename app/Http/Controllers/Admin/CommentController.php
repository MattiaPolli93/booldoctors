<?php

namespace App\Http\Controllers\Admin;

use App\Comment;
use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    public function showComments(Comment $comments)
    {   
        // prendo i dati del dottore registrato in base al suo id
        $doctor_id = Auth::id();

        $user = User::where('id', $doctor_id)->first();

        // filtro le recensioni in base all'id del dottore
        $comments = Comment::where('user_id', $doctor_id)->get();        

        return view('admin.comments', compact('user', 'comments'));

    }
}
