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
        /* $doctors = User::all(); */
        /* $doctors = User::where('specialization', 'like', '%' . $request->specialization['specialization'] . '%')->get() */;
        /* $doctors = DB::table('users')
                    ->join('comments','users.id','=','comments.user_id')
                    ->select('comments.user_id', DB::raw('count(*) as total'))
                    ->groupBy('comments.user_id')
                    ->get(); */
        /* $q = $_GET['id']; */
         
        $prova = request('id');
        $doctors = User::all();
        /* dd($doctors); */
        /* dd(request('id')); */ 
        /* return response()->json($doctors); */
        return UserResource::collection($doctors);
        
    }
}
