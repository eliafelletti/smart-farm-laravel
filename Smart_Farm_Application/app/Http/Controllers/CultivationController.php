<?php

namespace App\Http\Controllers;

use App\Models\Cultivation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CultivationController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        session([ 
            "levels_cultivation" => [0, 1]
        ]);
        $this->middleware('auth');
        $this->middleware('authorization:cultivation');
        $this->middleware('owner_profile');
        $this->middleware('owner_smart_farm');
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $cultivations = Cultivation::all()->sortBy('tipologia');
        
        return view('cultivation.index', compact('cultivations'));
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
            'tipologia' => 'required|string|max:255',
        ]);
 
        if ($validator->fails()) {
            return redirect('/cultivation')
                        ->withErrors($validator)
                        ->withInput();
        }

        $new = Cultivation::create($input);
        
        return response()->json([
            'message' => 'created',
            'data' => $new
        ], 200);
    }

    /**
     * Display the specified resource.
     */
    public function show(Cultivation $cultivation)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Cultivation $cultivation)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Cultivation $cultivation)
    {
        $input = $request->all();

        $validator = Validator::make($input, [
            'tipologia' => 'required|string|max:255',
        ]);
 
        if ($validator->fails()) {
            return redirect('/cultivation')
                        ->withErrors($validator)
                        ->withInput();
        }

        $cultivation->update($input);
        
        return response()->json([
            'message' => 'updated',
            'data' => $cultivation
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Cultivation $cultivation)
    {
        $cultivation->delete();

        return response()->json([
            'message' => 'deleted',
            'data' => $cultivation
        ], 200);
    }
}
