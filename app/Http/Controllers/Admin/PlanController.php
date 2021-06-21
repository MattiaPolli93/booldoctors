<?php

namespace App\Http\Controllers\Admin;

use App\Detail;
use App\Http\Controllers\Controller;
use App\Plan;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PlanController extends Controller
{
    public function setPlan()
    {
        $plans = Plan::all();

        /* $clientToken = $gateway->clientToken()->generate([
            "customerId" => $aCustomerId
        ]); */

        

        /* dd($plans); */
        /* $doctor = User::where('id', $doctor_id)->first(); */

        /* $details = Detail::where('id', $doctor_id)->first(); */

        return view('admin.sponsor', compact('plans'));
    }
}
