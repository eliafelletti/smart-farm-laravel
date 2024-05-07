<?php

namespace App\Http\Controllers;

use App\Models\SupplierCompany;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Auth;

class SupplierCompanyController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        session([ 
            "levels_s_company" => [0, 2]
        ]);
        $this->middleware('auth');
        $this->middleware('authorization:s_company');
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if ( Auth::user()->level == 0 ){
            $supplier_companies = SupplierCompany::all();

            return view('supplier_company.index', compact('supplier_companies'));
        }else if( Auth::user()->level == 2 ){
            $supplier_company = SupplierCompany::where('mail', Auth::user()->email)->first();

            return view('supplier_company.index', compact('supplier_company'));
        } 
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('supplier_company.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $input = $request->all();

        $validator = Validator::make($input, [
            'nome' => 'required|string|max:255',
            'mail' => 'required|email|max:255',
            'telefono' => 'required|string|max:10',
            'fax' => 'nullable|string|max:14',
            'via' => 'required|string|max:255',
            'civico' => 'required|string|max:255',
            'citta' => 'required|string|max:255',
            'cap' => 'required|string|max:255'
        ]);

        if($validator->fails()){
            return redirect('/supplier_company/create')
                        ->withErrors($validator)
                        ->withInput();
        }

        SupplierCompany::create($input);

        return redirect('/supplier_company');
    }

    /**
     * Display the specified resource.
     */
    public function show(SupplierCompany $supplierCompany)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(SupplierCompany $supplierCompany)
    {
        return view('supplier_company.edit', compact('supplierCompany'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, SupplierCompany $supplierCompany)
    {
        $input = $request->all();

        $validator = Validator::make($input, [
            'nome' => 'required|string|max:255',
            'mail' => 'required|email|max:255',
            'telefono' => 'required|string|max:10',
            'fax' => 'nullable|string|max:14',
            'via' => 'required|string|max:255',
            'civico' => 'required|string|max:255',
            'citta' => 'required|string|max:255',
            'cap' => 'required|string|max:255'
        ]);

        if($validator->fails()){
            return redirect('/supplier_company/create')
                        ->withErrors($validator)
                        ->withInput();
        }

        $supplierCompany->update($input);

        return redirect('/supplier_company');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(SupplierCompany $supplierCompany)
    {
        $supplierCompany->delete();

        return response()->json([
            'message'=>'Azienda fornitrice eliminata con successo',
            'data'=>$supplierCompany
        ], 200);
    }
}
