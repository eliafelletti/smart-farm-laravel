<?php

namespace App\Http\Controllers;

use App\Models\Technology;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class TechnologyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $technologies = Technology::all();

        return view('technology.index', compact('technologies'));
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
