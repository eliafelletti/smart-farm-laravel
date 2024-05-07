<?php

namespace App\Http\Controllers;

use App\Models\SmartFarm;
use App\Models\Technology;
use App\Models\UsedTechnology;
use App\Models\Owner;
use App\Models\SupplierCompany;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Auth;

class UsedTechnologyController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        session([ 
            "levels_u_tech" => [0, 1, 2]
        ]);
        $this->middleware('auth');
        $this->middleware('authorization:u_tech');
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if ( Auth::user()->level == 0 ){
            $usedTechnologies = UsedTechnology::all();
            $technologies = Technology::all();
            $smartFarms = SmartFarm::all();

            return view('used_technology.index', compact('usedTechnologies', 'technologies', 'smartFarms'));
        }else if( Auth::user()->level == 1 ){
            $owner = Owner::where('mail', Auth::user()->email)->first();
            $smartFarm = SmartFarm::where('id_proprietario', $owner->id)->first();
            $usedTechnologies = UsedTechnology::where('id_smart_farm', $smartFarm->id)->get();

            return view('used_technology.index', compact('usedTechnologies'));
        }else if( Auth::user()->level == 2 ){
            // Seleziono l'azienda fornitrice loggata
            $supplier_company = SupplierCompany::where('mail', Auth::user()->email)->first();
            // Seleziono le tecnologie dell'azienda fornitrice loggata
            $technologies = Technology::where('id_azienda_fornitrice', $supplier_company->id)->get();

            // Seleziono tutti gli id delle tecnologie dell'azienda fornitrice loggata
            $idTechs = [];
            foreach($technologies as $tech){
                array_push($idTechs, $tech->id);
            }

            // Seleziono le tecnologie dell'azienda fornitrice loggata usate nelle smart-farm
            $usedTechnologies = UsedTechnology::whereIn('id_tecnologia', $idTechs)->get()->sortBy('id_smart_farm');

            return view('used_technology.index', compact('usedTechnologies'));
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
            'id_smart_farm' => 'required|integer'
        ]);

        if($validator->fails()){
            return redirect('/used_technology')
                        ->withErrors($validator)
                        ->withInput();
        }

        $usedTechnology = UsedTechnology::create($input);

        return response()->json([
            'message' =>'created',
            'data' => $usedTechnology
        ], 200);
    }

    /**
     * Display the specified resource.
     */
    public function show(UsedTechnology $usedTechnology)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(UsedTechnology $usedTechnology)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, UsedTechnology $usedTechnology)
    {
        $input = $request->all();

        $validator = Validator::make($input, [
            'id_tecnologia' => 'required|integer',
            'id_smart_farm' => 'required|integer'
        ]);

        if($validator->fails()){
            return redirect('/used_technology')
                        ->withErrors($validator)
                        ->withInput();
        }

        $usedTechnology->update($input);
        
        return response()->json([
            'message' => 'updated',
            'data' => $usedTechnology
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(UsedTechnology $usedTechnology)
    {
        $usedTechnology->delete();

        return response()->json([
            'message' => 'deleted',
            'data' => $usedTechnology
        ], 200);
    }
}
