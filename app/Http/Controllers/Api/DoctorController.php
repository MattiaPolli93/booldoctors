<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\UserResource;
use App\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class DoctorController extends Controller
{
    public function searchDoctor(Request $request)
    {   
        /* 
        array di parametri che passo lmao
        dd($request->query('id')); 
        */
        /* if ($request->query('id')) {
            $doctors = User::join('specialization_user', 'users.id', '=', 'specialization_user.user_id')
            ->join('comments', 'users.id', '=', 'comments.user_id')
            ->select('users.*', 'specialization_user.*')
            ->where('specialization_id', $request->query('id'))
            ->get();
        } else {
            $doctors = User::all();
        } */
        
        /* dd($doctors);
        return $doctors; */

        $doctors_due = User::all();            
        return UserResource::collection($doctors_due);
        
    }
}
