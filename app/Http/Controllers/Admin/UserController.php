<?php

namespace App\Http\Controllers\Admin;

use App\Detail;
use App\Http\Controllers\Controller;
use App\Service;
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
        'phone' => 'nullable|string|max:25',
        'service_name' => 'nullable|string',
        'service_price' => 'nullable|numeric'
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

    // /**
    //  * Show the form for creating a new resource.
    //  *
    //  * @return \Illuminate\Http\Response
    //  */
    // public function create()
    // {
    //     $specializations = Specialization::all();

    //     return view('admin.create', compact('specializations'));


    // }

    // /**
    //  * Store a newly created resource in storage.
    //  *
    //  * @param  \Illuminate\Http\Request  $request
    //  * @return \Illuminate\Http\Response
    //  */
    // public function store(Request $request, $id)
    // {
    //     // validazione dei dati inseriti
    //     $validation = $this->validation;
    //     $request->validate($validation);

    //     /* // imposto lo user_id
    //     $data['user_id'] = Auth::id();

    //     // prendo tutti i dati da salvare
    //     $data = $request->all();

    //     //inserimento dei dati
    //     $details = Detail::create($data);   */
    //     $doctor = User::where('id', $id)->first();
    //     Detail::create([
    //         'address' => request('address'),
    //         'phone' => request('phone'),
    //         'bio' => request('bio'),
    //         //prende lo user_id
    //         'user_id' => auth()->id()
    //     ]);

    //     if (!isset($data['specializations'])) {
    //         $data['specializations'] = [];
    //     }
    //     $doctor->specializations()->sync($data['specializations']);

    //     // reindirizzamento alla pagina index
    //     return redirect()->route('admin.profile.index')->with('message', 'le tue informazioni sono state aggiunte!');
    // }

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
    public function edit(User $user, Service $services, Specialization $specializations, $id)
    {

        $user_id = Auth::id();
        $details = Detail::where('user_id', $id)->first();
        $specializations = Specialization::all();

        if ($details->user_id != $user_id) {
            abort('403');
        }
        $doctor = User::where('id', $id)->first();



        return view('admin.edit', compact('doctor', 'details', 'specializations'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        $user_id = Auth::id();

        // validazione dei dati inseriti
        $validation = $this->validation;
        $request->validate($validation);

        $data = $request->only('bio', 'address', 'phone');

        $doctor = User::where('id', $id)->first();
        
        // salvataggio dei dati modificati
        $doctor->details->update($data);
        
        if ($request->service_name || $request->service_price) {
            // salvataggio nella tabella service
            $newService = new Service();
            $newService->user_id = $user_id;
            $newService->service = $request->service_name;
            $newService->price = $request->service_price;
            $newService->save();
        }

        // controllo specializzazioni
        $spec = $request->only('field');
        if ( !isset($spec['field']) ) {
            $spec['field'] = [];
        }
        $doctor->specializations()->sync($spec['field']);

        return redirect()->route('admin.profile.index', $doctor)->with('message', 'Il profilo è stato modificato');

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
