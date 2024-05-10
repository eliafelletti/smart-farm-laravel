<?php

namespace App\Http\Controllers;

use App\Models\Measure;
use App\Models\GreenHouse;
use App\Models\Owner;
use App\Models\SmartFarm;
use Illuminate\Http\Request;
use Auth;

class MeasureController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        session([ 
            "levels_measure" => [0, 1]
        ]);
        $this->middleware('auth');
        $this->middleware('authorization:measure');
        $this->middleware('owner_profile');
        $this->middleware('owner_smart_farm');
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if ( Auth::user()->level == 0 ){
            $measures = Measure::all()->sortBy('timestamp');

            return view('measure.index', compact('measures'));
        }else if( Auth::user()->level == 1 ){
            $owner = Owner::where('mail', Auth::user()->email)->first();
            $smartFarm = SmartFarm::where('id_proprietario', $owner->id)->first();
            $greenHouses = GreenHouse::where('id_smart_farm', $smartFarm->id)->get();

            $idGreenHouses = [];
            foreach($greenHouses as $gHouse){
                array_push($idGreenHouses, $gHouse->id);
            }

            $measures = Measure::whereIn('id_serra', $idGreenHouses)->get();

            return view('measure.index', compact('measures'));
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Measure $measure)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Measure $measure)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Measure $measure)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Measure $measure)
    {
        //
    }
}
