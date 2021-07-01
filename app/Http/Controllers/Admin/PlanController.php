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
        // prendo i dati del dottore tramite il suo id
        $user_id = Auth::id();

        $user = User::where('id', $user_id)->first();
        /* dd($user); */
        $gateway = new Gateway([
            'environment' => 'sandbox',
            'merchantId' => 'zq9jmpzj8h55xrrp',
            'publicKey' => '5tx5rpkxj4xtxv7y',
            'privateKey' => '3eb3a36efd748273e51433d2d6723421'
        ]);

        $token = $gateway->ClientToken()->generate();

        // controllo se esiste già un piano di sponsorizzazione
        $plan = Plan::find($id);
        
        // prendo la data della fine sponsorizzazione
        $extendPlan = $user->plans()->get()->last();
        
        // accedo all'ultima entry di questo user nella tabella pivot            
        $now = Carbon::now('Europe/Rome');

            // se non ha mai fatto una sponsorizzazione
            if ($extendPlan == null) {
                $currentExpireDate = $now->addHour($plan->period);
            } else {

                // prendo l'ultima expire date dalla pivot
                $currentExpireDate = $extendPlan->pivot->expire_date;
                
                // se la sponsorizzazione non è ancora scaduta, aggiunto le ore alla attuale expire date
                if($currentExpireDate < $now){
                    $currentExpireDate = $now->addHour($plan->period);                                
                } else {
                    // altrimenti la aggiungo all'ora odierna
                    $currentExpireDate = Carbon::parse($currentExpireDate)->addHour($plan->period);
                } 
            }

            

        return view('admin.sponsor', compact('plan', 'token', 'user', 'extendPlan', 'currentExpireDate'));
    }

    public function payPlan(Request $request, $id)
    {   
        // prendo i dati del dottore tramite il suo id
        $user_id = Auth::id();
        $user = User::where('id', $user_id)->first(); 
        // controllo il piano selezionato          
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
        
        if($result->success){   
            // accedo all'ultima entry di questo user nella tabella pivot
            $extendPlan = $user->plans()->get()->last();
            $now = Carbon::now('Europe/Rome');

                //controllo se non ha mai fatto una sponsorizzazione
                if ($extendPlan == null) {
                    $currentExpireDate = $now->addHour($plan->period);
                } else {

                    // prendo l'ultima expire date dalla pivot
                    $currentExpireDate = $extendPlan->pivot->expire_date;
                    
                    // se la sponsorizzazione non è ancora scaduta, aggiungo le ore alla attuale data di scadenza
                    if($currentExpireDate < $now){
                        $currentExpireDate = $now->addHour($plan->period);                                
                    } else {
                        // altrimenti la aggiungo all'ora odierna
                        $currentExpireDate = Carbon::parse($currentExpireDate)->addHour($plan->period);
                    } 
                }

            // inserisco i dati nella pivot
            $user->plans()->attach($user, [
                'user_id' => $user->id,
                'plan_id' => $plan->id,
                'expire_date' => $currentExpireDate
            ]);
            return view('admin.checkout', compact('user','plan', 'result'));
        } else{
            return view('admin.checkout', compact('user','plan', 'result'));
        }
    }
}
