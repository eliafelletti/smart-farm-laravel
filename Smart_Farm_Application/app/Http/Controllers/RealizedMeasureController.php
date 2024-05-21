<?php

namespace App\Http\Controllers;

use App\Models\Measure;
use App\Models\Technology;
use App\Models\RealizedMeasure;
use App\Models\Owner;
use App\Models\SmartFarm;
use App\Models\GreenHouse;
use App\Models\UsedTechnology;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Auth;

class RealizedMeasureController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        session([ 
            "levels_r_measure" => [0, 1]
        ]);
        $this->middleware('auth');
        $this->middleware('authorization:r_measure');
        $this->middleware('owner_profile');
        $this->middleware('owner_smart_farm');
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if ( Auth::user()->level == 0 ){
            $realizedMeasures = RealizedMeasure::all()->sortBy('id_misura');
            $technologies = Technology::all();
            $measures = Measure::all();

            return view('realized_measure.index', compact('realizedMeasures', 'technologies', 'measures'));
        }else if( Auth::user()->level == 1 ){
            $owner = Owner::where('mail', Auth::user()->email)->first();
            $smartFarm = SmartFarm::where('id_proprietario', $owner->id)->first();
            $greenHouses = GreenHouse::where('id_smart_farm', $smartFarm->id)->get();

            $idGreenHouses = [];
            foreach($greenHouses as $gHouse){
                array_push($idGreenHouses, $gHouse->id);
            }

            $measures = Measure::whereIn('id_serra', $idGreenHouses)->get();

            $idMeasures = [];
            foreach($measures as $measure){
                array_push($idMeasures, $measure->id);
            }

            $realizedMeasures = RealizedMeasure::whereIn('id_misura', $idMeasures)->orderBy('id_misura')->get();

            // Array associativo vuoto che conterrà dati in forma id_misura => [dati_misura]
            $techInMeasure = [];

            foreach ($realizedMeasures as $rMeasure) {
                // Seleziono le informazioni della misura realizzata corrente
                $measureID = $rMeasure->id_misura;
                $techNome = $rMeasure->tecnologia->nome;
                $measureNome = $rMeasure->id_misura . "[" . $rMeasure->misura->serra->smart_farm->nome . " (" . $rMeasure->misura->id_serra . ")]";
                $updatedAt = $rMeasure->updated_at->format('d/m/Y H:i:s');
                
                // Controllo che la misura realizzata corrente non sia già stata inserita 
                if ( !isset($techInMeasure[$measureID]) ) {
                    // Set di una nuova misura
                    $techInMeasure[$measureID] = [
                        'misura' => $measureNome,
                        'updated_at' => $updatedAt,
                        'technologies' => [],
                    ];
                }
            
                // Aggiunta del nome della tecnologia, all'interno dell'array che contiene
                // i nomi delle tecnologie utilizzate nella misurazione corrente
                array_push($techInMeasure[$measureID]['technologies'], $techNome);
            }

            // Sovrascrivo nome variabile di ritorno
            $realizedMeasures = $techInMeasure;

            return view('realized_measure.index', compact('realizedMeasures'));
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
            'id_tecnologia' => 'required|integer',
            'id_misura' => 'required|integer'
        ]);

        if($validator->fails()){
            return redirect('/realized_measure')
                        ->withErrors($validator)
                        ->withInput();
        }

        $realizedMeasure = RealizedMeasure::create($input);

        return response()->json([
            'message' =>'created',
            'data' => $realizedMeasure
        ], 200);
    }

    /**
     * Display the specified resource.
     */
    public function show(RealizedMeasure $realizedMeasure)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(RealizedMeasure $realizedMeasure)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, RealizedMeasure $realizedMeasure)
    {
        $input = $request->all();

        $validator = Validator::make($input, [
            'id_tecnologia' => 'required|integer',
            'id_misura' => 'required|integer'
        ]);

        if($validator->fails()){
            return redirect('/realized_measure')
                        ->withErrors($validator)
                        ->withInput();
        }

        $realizedMeasure->update($input);
        
        return response()->json([
            'message' => 'updated',
            'data' => $realizedMeasure
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(RealizedMeasure $realizedMeasure)
    {
        $realizedMeasure->delete();

        return response()->json([
            'message' => 'deleted',
            'data' => $realizedMeasure
        ], 200);
    }

    /**
     * Create and store five entries for each new measure.
     */
    public function store_factory_data()
    {
        $last_realized_measure = RealizedMeasure::latest('created_at')->first();
        $last_valid_timestamp = $last_realized_measure->created_at;

        $new_measures = Measure::where('created_at', '>', $last_valid_timestamp)->get();

        foreach( $new_measures as $new_measure ){
            $gHouse = GreenHouse::where('id', $new_measure->id_serra)->first();
            $smartFarm = SmartFarm::where('id', $gHouse->id_smart_farm)->first();

            $usedTechs = UsedTechnology::where('id_smart_farm', $smartFarm->id)->get();

            foreach( $usedTechs as $tech ){
                $values = [
                    "id_tecnologia" => $tech->id_tecnologia,
                    "id_misura" => $new_measure->id
                ];

                RealizedMeasure::create($values);
            }
        }
    }
}
