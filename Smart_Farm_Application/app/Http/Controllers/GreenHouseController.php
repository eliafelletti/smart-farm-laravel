<?php

namespace App\Http\Controllers;

use App\Models\GreenHouse;
use App\Models\SmartFarm;
use App\Models\Owner;
use App\Models\Measure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Auth;

class GreenHouseController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        session([ 
            "levels_green_house" => [0, 1]
        ]);
        $this->middleware('auth');
        $this->middleware('authorization:green_house');
        $this->middleware('owner_profile');
        $this->middleware('owner_smart_farm');
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if ( Auth::user()->level == 0 ){
            $greenHouses = GreenHouse::all();
            $smartFarms = SmartFarm::all();

            return view('green_house.index', compact('greenHouses', 'smartFarms'));
        }else if( Auth::user()->level == 1 ){
            $owner = Owner::where('mail', Auth::user()->email)->first();
            $smartFarm = SmartFarm::where('id_proprietario', $owner->id)->first();
            $greenHouses = GreenHouse::where('id_smart_farm', $smartFarm->id)->get();

            return view('green_house.index', compact('greenHouses', 'smartFarm'));
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
        $input = $request->all();

        $validator = Validator::make($input, [
            'numero_piante' => 'required|string|max:255',
            'id_smart_farm' => 'required|integer'
        ]);
 
        if ($validator->fails()) {
            return redirect('/green_house')
                        ->withErrors($validator)
                        ->withInput();
        }

        $new = GreenHouse::create($input);
        
        return response()->json([
            'message' => 'created',
            'data' => $new
        ], 200);
    }

    /**
     * Display the specified resource.
     */
    public function show(GreenHouse $greenHouse)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(GreenHouse $greenHouse)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, GreenHouse $greenHouse)
    {
        $input = $request->all();

        $validator = Validator::make($input, [
            'numero_piante' => 'required|string|max:255',
            'id_smart_farm' => 'required|integer'
        ]);
 
        if ($validator->fails()) {
            return redirect('/green_house')
                        ->withErrors($validator)
                        ->withInput();
        }

        $greenHouse->update($input);
        
        return response()->json([
            'message' => 'updated',
            'data' => $greenHouse
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(GreenHouse $greenHouse)
    {
        $greenHouse->delete();

        return response()->json([
            'message' => 'deleted',
            'data' => $greenHouse
        ], 200);
    }


    /**
     * Monitor greenhouse parameters
     */
    public function monitor(GreenHouse $greenHouse){
        $owner = Owner::where("mail", Auth::user()->email)->first();
        if ( !empty($owner) ){
            $smartFarm = SmartFarm::where("id_proprietario", $owner->id)->first();
        }

        if ( !empty($smartFarm) ){
            // Verifica che la serra appartenga all'owner loggato
            if ( $smartFarm->id != $greenHouse->id_smart_farm ){
                return redirect('/green_house');
            }else{
                $labels = Measure::select('timestamp')->where('id_serra', $greenHouse->id)->orderBy('timestamp')->get()->reverse()->take(10)->reverse()->values();
                $labels_display = [];
                foreach ($labels as $label) {
                    $label = $label->timestamp;
                    array_push($labels_display, ['timestamp' => $label]);
                }

                $data_temperatura = [
                    'labels' => $labels_display,
                    'data' => Measure::select('temperatura')->where('id_serra', $greenHouse->id)->orderBy('timestamp')->get()->reverse()->take(10)->reverse()->values(),
                ];

                $data_umidita = [
                    'data' => Measure::select('umidita')->where('id_serra', $greenHouse->id)->orderBy('timestamp')->get()->reverse()->take(10)->reverse()->values(),
                ];

                $data_luminosita = [
                    'data' => Measure::select('luminosita')->where('id_serra', $greenHouse->id)->orderBy('timestamp')->get()->reverse()->take(10)->reverse()->values(),
                ];

                $data_co2 = [
                    'data' => Measure::select('co2')->where('id_serra', $greenHouse->id)->orderBy('timestamp')->get()->reverse()->take(10)->reverse()->values(),
                ];

                $data_irrigazione = [
                    'data' => Measure::select('irrigazione')->where('id_serra', $greenHouse->id)->orderBy('timestamp')->get()->reverse()->take(10)->reverse()->values(),
                ];

                return view('green_house.monitor', compact('greenHouse', 'data_temperatura', 'data_umidita', 'data_luminosita', 'data_co2', 'data_irrigazione'));
            }
        }else{
            return redirect('/green_house');
        }
    }
}
