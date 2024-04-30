<?php

namespace App\Http\Controllers;

use App\Models\SmartFarm;
use App\Models\Technology;
use App\Models\UsedTechnology;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class UsedTechnologyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $usedTechnologies = UsedTechnology::all();

        $technologies = Technology::all();

        $smartFarms = SmartFarm::all();

        return view('used_technology.index', compact('usedTechnologies', 'technologies', 'smartFarms'));
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
