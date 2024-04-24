<?php

namespace App\Http\Controllers;

use App\Models\Owner;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class OwnerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $owners = Owner::all();

        return view('owner.index', compact('owners'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('owner.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $input = $request->all();

        $validator = Validator::make($input, [
            'cf' => 'required|string|min:16|max:16',
            'nome' => 'required|string|max:255',
            'cognome' => 'required|string|max:255',
            'data_nascita' => 'required|date',
            'luogo_nascita' => 'required|string|max:255',
            'telefono' => 'required|string|max:10',
            'mail' => 'required|email|max:255',
            'via' => 'required|string|max:255',
            'civico' => 'required|string|max:255',
            'citta' => 'required|string|max:255',
            'cap' => 'required|string|max:255'
        ]);

        if($validator->fails()){
            return redirect('/owner/create')
                        ->withErrors($validator)
                        ->withInput();
        }

        Owner::create($input);

        return redirect('/owner');
    }

    /**
     * Display the specified resource.
     */
    public function show(Owner $owner)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Owner $owner)
    {
        return view('owner.edit', compact('owner'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Owner $owner)
    {
        $input = $request->all();

        $validator = Validator::make($input, [
            'cf' => 'required|string|max:16',
            'nome' => 'required|string|max:255',
            'cognome' => 'required|string|max:255',
            'data_nascita' => 'required|date',
            'luogo_nascita' => 'required|string|max:255',
            'telefono' => 'required|string|max:10',
            'mail' => 'required|email|max:255',
            'via' => 'required|string|max:255',
            'civico' => 'required|string|max:255',
            'citta' => 'required|string|max:255',
            'cap' => 'required|string|max:255'
        ]);

        if($validator->fails()){
            return redirect("/owner/{$owner->id}/edit")
                        ->withErrors($validator)
                        ->withInput();
        }

        $owner->update($input);

        return redirect('/owner');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Owner $owner)
    {
        $owner->delete();

        return response()->json([
            'message'=>'Proprietario eliminato con successo',
            'data'=>$owner
        ], 200);
    }
}
