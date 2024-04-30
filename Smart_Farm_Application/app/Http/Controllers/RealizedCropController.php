<?php

namespace App\Http\Controllers;

use App\Models\RealizedCrop;
use App\Models\Owner;
use App\Models\GreenHouse;
use App\Models\Cultivation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class RealizedCropController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $realized_crops = RealizedCrop::all();

        return view('realized_crops.index', compact('realized_crops'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $owners = Owner::all();
        $green_houses = GreenHouse::all();
        $cultivations = Cultivation::all();

        return view('realized_crops.create', compact('owners','green_houses','cultivations'));
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
        $owners = Owner::all();
        $green_houses = GreenHouse::all();
        $cultivations = Cultivation::all();

        return view('realized_crops.edit', compact('realizedCrop','owners','green_houses','cultivations'));
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
