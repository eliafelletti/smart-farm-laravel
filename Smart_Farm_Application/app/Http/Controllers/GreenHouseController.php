<?php

namespace App\Http\Controllers;

use App\Models\GreenHouse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class GreenHouseController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $greenHouses = GreenHouse::all();

        return view('green_house.index', compact('greenHouses'));
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
}
