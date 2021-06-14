<?php

namespace App\Http\Controllers\Admin;

use App\Detail;
use App\Http\Controllers\Controller;
use App\Specialization;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;



class UserController extends Controller
{

    protected $validation = ([
        'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        'bio' => 'nullable|string',
        'address' => 'required|string|max:100',
        'phone' => 'nullable|string|max:25'
    ]);


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $doctor_id = Auth::id();

        $user = User::where('id', $doctor_id)->first();

        $details = Detail::where('id', $doctor_id)->first();

        return view('admin.index', compact('user', 'details'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $specializations = Specialization::all();

        return view('admin.create', compact('specializations'));


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
        return redirect()->route('admin.profile.index')->with('message', 'le tue informazioni sono state aggiunte!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user, Detail $details, $id)
    {

        $doctor = User::where('id', $id)->first();

        $details = Detail::all();


        return view('admin.edit', compact('doctor', 'details'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id, Detail $details)
    {

        $user_id = Auth::id();

        // validazione dei dati inseriti
        $validation = $this->validation;
        $request->validate($validation);

        $doctor = User::where('id', $id)->first();

        $data = $request->all();;



        $details->update($data);

        dd($details);



        return redirect()->route('admin.profile.index', compact('details'))->with('message', 'Il profilo è stato modificato');

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
