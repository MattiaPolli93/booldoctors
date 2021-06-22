<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Plan;
use App\User;
use Braintree\Gateway as Gateway;
use Braintree\Transaction as Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PlanController extends Controller
{
    public function setPlan()
    {   
        $gateway = new Gateway([
            'environment' => 'sandbox',
            'merchantId' => 'zq9jmpzj8h55xrrp',
            'publicKey' => '5tx5rpkxj4xtxv7y',
            'privateKey' => '3eb3a36efd748273e51433d2d6723421'
        ]);

        $token = $gateway->ClientToken()->generate();

        $plan = Plan::where('id', 1)->first();        

        return view('admin.sponsor', compact('plan', 'token'));         
    }

    public function payPlan(Request $request)
    {   
        $user_id = Auth::id();
        $user = User::where('id', $user_id)->first();  

        $gateway = new Gateway([
            'environment' => 'sandbox',
            'merchantId' => 'zq9jmpzj8h55xrrp',
            'publicKey' => '5tx5rpkxj4xtxv7y',
            'privateKey' => '3eb3a36efd748273e51433d2d6723421'
        ]);

        $result = $gateway->transaction()->sale([
            'amount' => 2.99,
            'paymentMethodNonce' => $request->payment_method_nonce,
            'customer' =>[
                'firstName' => $user->name,
                'lastName' => $user->surname,
                'email' => $user->email,
            ],
            'options' => [
                'submitForSettlement' => true
            ]
        ]);
        
        if($result->success){            
            return back()->with('message', 'Hai pagato stronzo!');
        } else{
            return back()->with('message', 'Cambia carta che sei senza soldi stronzo!');
        } 
    }
}
