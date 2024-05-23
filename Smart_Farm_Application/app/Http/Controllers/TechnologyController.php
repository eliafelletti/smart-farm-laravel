<?php

namespace App\Http\Controllers;

use App\Models\SupplierCompany;
use App\Models\Technology;
use App\Models\UserRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Auth;

class TechnologyController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        session([ 
            "levels_tech" => [0, 2]
        ]);
        $this->middleware('auth');
        $this->middleware('authorization:tech');
        $this->middleware('supplier_cp_profile');
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if ( Auth::user()->level == 0 ){
            $technologies = Technology::all();
            $supplierCompanies = SupplierCompany::all();

            return view('technology.index', compact('technologies', 'supplierCompanies'));
        }else if( Auth::user()->level == 2 ){
            // Seleziono l'azienda fornitrice loggata
            $supplier_company = SupplierCompany::where('mail', Auth::user()->email)->first();
            // Seleziono le tecnologie dell'azienda fornitrice loggata
            $technologies = Technology::where('id_azienda_fornitrice', $supplier_company->id)->get();

            // Verifica richieste pendenti
            $requests = UserRequest::where('id_azienda_fornitrice', $supplier_company->id)->get();
            
            $dangling_req = false;
            foreach($requests as $request){
                if ( $request->completata == false ){
                    $dangling_req = true;
                    break;
                }
            }

            return view('technology.index', compact('technologies', 'dangling_req'));
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
            'nome' => 'required|string|max:255',
            'tipologia' => 'required|string|max:255',
            'id_azienda_fornitrice' => 'required|integer'
        ]);

        if($validator->fails()){
            return redirect('/technology')
                        ->withErrors($validator)
                        ->withInput();
        }

        $technology=Technology::create($input);

        return response()->json([
            'message' =>'Tecnologia aggiunta con successo',
            'data' => $technology
        ], 200);
    }

    /**
     * Display the specified resource.
     */
    public function show(Technology $technology)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Technology $technology)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Technology $technology)
    {
        $input = $request->all();

        $validator = Validator::make($input, [
            'nome' => 'required|string|max:255',
            'tipologia' => 'required|string|max:255',
            'id_azienda_fornitrice' => 'required|integer'
        ]);

        if($validator->fails()){
            return redirect('/technology')
                        ->withErrors($validator)
                        ->withInput();
        }

        $technology->update($input);

        return response()->json([
            'message' =>'Tecnologia modificata con successo',
            'data' => $technology
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Technology $technology)
    {
        $technology->delete();

        return response()->json([
            'message'=>'Tecnologia eliminata con successo',
            'data'=>$technology
        ], 200);
    }
}
