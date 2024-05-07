<?php

namespace App\Http\Controllers;

use App\Models\RealizedCrop;
use App\Models\Owner;
use App\Models\GreenHouse;
use App\Models\Cultivation;
use App\Models\SmartFarm;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Auth;

class RealizedCropController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        session([ 
            "levels_crop" => [0, 1]
        ]);
        $this->middleware('auth');
        $this->middleware('authorization:crop');
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if ( Auth::user()->level == 0 ){
            $realized_crops = RealizedCrop::all();

            return view('realized_crops.index', compact('realized_crops'));
        }else if( Auth::user()->level == 1 ){
            $owner = Owner::where('mail', Auth::user()->email)->first();
            $realized_crops = RealizedCrop::where('id_proprietario', $owner->id)->get();

            return view('realized_crops.index', compact('realized_crops'));
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $cultivations = Cultivation::all();

        if ( Auth::user()->level == 0 ){
            $owners = Owner::all();
            $green_houses = GreenHouse::all();

            return view('realized_crops.create', compact('owners','green_houses','cultivations'));
        }else if( Auth::user()->level == 1 ){
            $owner = Owner::where('mail', Auth::user()->email)->first();
            $smartFarm = SmartFarm::where('id_proprietario', $owner->id)->first();
            $green_houses = GreenHouse::where('id_smart_farm', $smartFarm->id)->get();

            return view('realized_crops.create', compact('owner','green_houses','cultivations'));
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $input = $request->all();

        $validator = Validator::make($input, [
            'id_proprietario' => 'required|integer',
            'id_serra' => 'required|integer',
            'id_coltura' => 'required|integer',
            'data_semina' => 'required|date',
            'data_raccolta_teorica' => 'required|date',
            'data_raccolta_effettiva' => 'nullable|date'
        ]);

        if($validator->fails()){
            return redirect('/realized_crop/create')
                        ->withErrors($validator)
                        ->withInput();
        }

        RealizedCrop::create($input);

        return redirect('/realized_crop');
    }

    /**
     * Display the specified resource.
     */
    public function show(RealizedCrop $realizedCrop)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(RealizedCrop $realizedCrop)
    {
        $cultivations = Cultivation::all();

        if ( Auth::user()->level == 0 ){
            $owners = Owner::all();
            $green_houses = GreenHouse::all();

            return view('realized_crops.edit', compact('realizedCrop','owners','green_houses','cultivations'));
        }else if( Auth::user()->level == 1 ){
            $owner = Owner::where('mail', Auth::user()->email)->first();
            $smartFarm = SmartFarm::where('id_proprietario', $owner->id)->first();
            $green_houses = GreenHouse::where('id_smart_farm', $smartFarm->id)->get();

            return view('realized_crops.edit', compact('realizedCrop','owner','green_houses','cultivations'));
        }        
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, RealizedCrop $realizedCrop)
    {
        $input = $request->all();

        $validator = Validator::make($input, [
            'id_proprietario' => 'required|integer',
            'id_serra' => 'required|integer',
            'id_coltura' => 'required|integer',
            'data_semina' => 'required|date',
            'data_raccolta_teorica' => 'required|date',
            'data_raccolta_effettiva' => 'nullable|date'
        ]);

        if($validator->fails()){
            return redirect('/realized_crop/create')
                        ->withErrors($validator)
                        ->withInput();
        }

        $realizedCrop->update($input);

        return redirect('/realized_crop');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(RealizedCrop $realizedCrop)
    {
        $realizedCrop->delete();

        return response()->json([
            'message'=>'Evento eliminato con successo',
            'data'=>$realizedCrop
        ], 200);
    }
}
