<?php

namespace App\Http\Controllers;

use App\Detail;
use App\Service;
use App\Specialization;
use App\User;
use App\Plan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DoctorController extends Controller
{

    protected $validation = [
        'name' => 'required|string|max:50',
        'surname' => 'required|string|max:50',
    ];
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $doctors = User::all();
        $specializations = Specialization::all();             

        return view('homepage', compact('doctors', 'specializations'));
    }

    /**
     * Show the form for creating a new resource.
     *                                                      
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $specializations = Specialization::all();        

        return view('user.create', compact('specializations'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // validazione dei dati inseriti
        $validation = $this->validation;
        $request->validate($validation);

        /* // imposto lo user_id
        $data['user_id'] = Auth::id();

        // prendo tutti i dati da salvare
        $data = $request->all();     
                
        //inserimento dei dati
        $details = Detail::create($data);   */   
        
        Detail::create([
            'address' => request('address'),
            'phone' => request('phone'),
            'bio' => request('bio'),
            //prende lo user_id
            'user_id' => auth()->id()
        ]);

        // reindirizzamento alla pagina index
        return redirect()->route('user.profile.index')->with('message', 'le tue informazioni sono state aggiunte!');
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

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        
        $doctor = User::where('id', $id)->first();

        $details = Detail::all();       
        

        return view('user.edit', compact('doctor', 'details'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Detail $details, $id)
    {
        $user_id = Auth::id();
        

        // validazione dei dati inseriti
        $validation = $this->validation;
        $request->validate($validation);

        $doctor = User::where('id', $id)->first();

        $data = $request->all();;
        
        

        $details->update($data);

        dd($details);

       

        return redirect()->route('user.profile.index', compact('details'))->with('message', 'Il profilo è stato modificato');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
