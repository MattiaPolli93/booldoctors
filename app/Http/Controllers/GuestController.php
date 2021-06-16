<?php

namespace App\Http\Controllers;

use App\Message;
use App\User;
use App\Specialization;
use App\Comment;
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
            
            if ($ordered_plan != null) {
                // controllo l'ultima data di scadenza del piano
                if ($ordered_plan[count($ordered_plan) - 1] > $now) {
                    // se il piano non è scaduto, inserisco il dottore tra i sponsorizzati
                    $sponsored_doctors[] = $doctor;
                }
            }
        }
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
    public function storeMessage(Request $request, User $user, $id)
    {
        $request->validate([
            'email' => 'required|email|max:50',
            'message' => 'required|string',
        ]);
        $user = User::find($id);
        $newMessage = new Message();
        $newMessage->user_id = $user->id;
        $newMessage->email = $request->email;
        $newMessage->message = $request->message;
        $newMessage->added_on = Carbon::now('Europe/Rome');
        $newMessage->save();

        return back()->with('message', 'Il tuo messaggio è stato inviato con successo');
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */  

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function storeComment(Request $request, User $user, $id)
    {
        $request->validate([
            'username' => 'nullable|string|max:30',
            'comment' => 'nullable|string',
            'rate' => 'required|string|in:1,2,3,4,5',
        ]);

        $user = User::find($id);
        $newComment = new Comment();
        $newComment->user_id = $user->id;
        if ($request->username != NULL) {
            $newComment->username = $request->username;
        }
        $newComment->comment = $request->comment;
        $newComment->rate = $request->rate;
        $newComment->added_on = Carbon::now('Europe/Rome');
        $newComment->save();

        return back()->with('message', 'La tua recensione è stata inserita con successo');
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

    public function searchDoctors() {
        return view('search');
    }

}
