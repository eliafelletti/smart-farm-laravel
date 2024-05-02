<?php

namespace App\Http\Controllers;

use App\Models\Owner;
use App\Models\SmartFarm;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Auth;

class SmartFarmController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if ( Auth::user()->level == 0 ){
            $smartFarms = SmartFarm::all();

            return view('smart_farm.index', compact('smartFarms'));
        }else if( Auth::user()->level == 1 ){
            $owner = Owner::where('mail', Auth::user()->email)->first();
            $smartFarm = SmartFarm::where('id_proprietario', $owner->id)->first();

            return view('smart_farm.index', compact('smartFarm'));
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        if ( Auth::user()->level == 0 ){
            $owners = Owner::all();

            return view('smart_farm.create', compact('owners'));
        }else if( Auth::user()->level == 1 ){
            $owner = Owner::where('mail', Auth::user()->email)->first();

            return view('smart_farm.create', compact('owner'));
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $input = $request->all();

        $validator = Validator::make($input, [
            'nome' => 'required|string|max:255',
            'dimensione' => 'required|numeric|max:99999999',
            'telefono' => 'required|string|max:10',
            'mail' => 'required|string|max:255',
            'via' => 'required|string|max:255',
            'civico' => 'required|string|max:255',
            'citta' => 'required|string|max:255',
            'cap' => 'required|string|max:5',
            'id_proprietario' => 'required|integer'
        ]);
 
        if ($validator->fails()) {
            return redirect('/smart_farm/create')
                        ->withErrors($validator)
                        ->withInput();
        }

        SmartFarm::create($input);

        return redirect('/smart_farm');
    }

    /**
     * Display the specified resource.
     */
    public function show(SmartFarm $smartFarm)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(SmartFarm $smartFarm)
    {
        if ( Auth::user()->level == 0 ){
            $owners = Owner::all();

            return view('smart_farm.edit', compact('smartFarm', 'owners'));
        }else if( Auth::user()->level == 1 ){
            $owner = Owner::where('mail', Auth::user()->email)->first();

            return view('smart_farm.edit', compact('smartFarm', 'owner'));
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, SmartFarm $smartFarm)
    {
        $input = $request->all();

        $validator = Validator::make($input, [
            'nome' => 'required|string|max:255',
            'dimensione' => 'required|numeric|max:99999999',
            'telefono' => 'required|string|max:10',
            'mail' => 'required|string|max:255',
            'via' => 'required|string|max:255',
            'civico' => 'required|string|max:255',
            'citta' => 'required|string|max:255',
            'cap' => 'required|string|max:5',
            'id_proprietario' => 'required|integer'
        ]);
 
        if ($validator->fails()) {
            return redirect('/smart_farm'.'/'.$smartFarm->id.'/edit')
                        ->withErrors($validator)
                        ->withInput();
        }

        $smartFarm->update($input);

        return redirect('/smart_farm');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(SmartFarm $smartFarm)
    {
        $smartFarm->delete();

        return response()->json([
            'message' => 'deleted',
            'data' => $smartFarm
        ], 200);
    }
}
