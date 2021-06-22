<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Plan;
use App\User;
use Braintree\Gateway as Gateway;
use Braintree\Transaction as Transaction;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PlanController extends Controller
{
    public function setPlan($id)
    {   
        $gateway = new Gateway([
            'environment' => 'sandbox',
            'merchantId' => 'zq9jmpzj8h55xrrp',
            'publicKey' => '5tx5rpkxj4xtxv7y',
            'privateKey' => '3eb3a36efd748273e51433d2d6723421'
        ]);

        $token = $gateway->ClientToken()->generate();

        $plan = Plan::find($id);        

        return view('admin.sponsor', compact('plan', 'token'));         
    }

    public function payPlan(Request $request, $id)
    {   
        $user_id = Auth::id();
        $user = User::where('id', $user_id)->first();  
        $plan = Plan::find($id);
        $data = $request->all();
        
        $gateway = new Gateway([
            'environment' => 'sandbox',
            'merchantId' => 'zq9jmpzj8h55xrrp',
            'publicKey' => '5tx5rpkxj4xtxv7y',
            'privateKey' => '3eb3a36efd748273e51433d2d6723421'
        ]);

        $result = $gateway->transaction()->sale([
            'amount' => $data['amount'],
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
        $extendPlan = $user->plans()->get()->last();

        $currentExpireDate = $extendPlan->pivot->expire_date;
       
        $now = Carbon::now('Europe/Rome');

        if($result->success){   
            if($currentExpireDate < $now){
                $currentExpireDate = $now->addHour($plan->period);                                
            } else {
                $currentExpireDate = Carbon::parse($currentExpireDate)->addHour($plan->period);
            } 
            $user->plans()->attach($user, [
                'user_id' => $user->id,
                'plan_id' => $plan->id,
                'expire_date' => $currentExpireDate
            ]);         
            return back()->with('message', 'Transazione riuscita');
        } else{
            return back()->with('message', 'Transazione fallita');
        } 
    }
}
