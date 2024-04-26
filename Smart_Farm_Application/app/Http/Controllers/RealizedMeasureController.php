<?php

namespace App\Http\Controllers;

use App\Models\Measure;
use App\Models\Technology;
use App\Models\RealizedMeasure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class RealizedMeasureController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $realizedMeasures = RealizedMeasure::all();
        
        $technologies = Technology::all();

        $measures = Measure::all();

        return view('realized_measure.index', compact('realizedMeasures', 'technologies', 'measures'));
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
}
