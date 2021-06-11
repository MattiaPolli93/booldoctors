<?php

namespace App\Http\Controllers;
use App\User;
use App\Specialization;
use Carbon\Carbon;
use App\Plan;
use Illuminate\Http\Request;

class GuestController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $doctors = User::all();
        $specializations = Specialization::all();

        $sponsored_doctors = [];
        $now = Carbon::now('Europe/Rome');
        
        // ciclo su tutti i dottori
        foreach ($doctors as $doctor) {
            $ordered_plan = [];
            // prendo i dati della pivot del singolo dottore
            foreach ($doctor->plans as $plan) {
                $ordered_plan[] = $plan->pivot->expire_date;
            }
            // controllo l'ultima data di scadenza del piano
            if ($ordered_plan[count($ordered_plan) - 1] > $now) {
                // se il piano non è scaduto, inserisco il dottore tra i sponsorizzati
                $sponsored_doctors[] = $doctor;
            }
        }
        dd($sponsored_doctors);
        return view('homepage', compact('sponsored_doctors', 'specializations'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function storeMessage(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $doctor = User::where('id', $id)->first();

        return view('show', compact('doctor'));
    }

}
