<?php

namespace App\Http\Controllers;

use App\Models\Owner;
use App\Models\SupplierCompany;
use App\Models\UserRequest;
use App\Models\SmartFarm;
use App\Models\UsedTechnology;
use App\Models\Technology;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Auth;

class UserRequestController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        session([ 
            "levels_u_request" => [0, 1, 2]
        ]);
        $this->middleware('auth');
        $this->middleware('authorization:u_request');
        $this->middleware('supplier_cp_profile');
        $this->middleware('owner_profile');
        $this->middleware('owner_smart_farm');
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if ( Auth::user()->level == 0 ){
            $userRequests = UserRequest::all()->sortByDesc('created_at');

            return view('user_request.index', compact('userRequests'));
        }elseif ( Auth::user()->level == 1 ){
            $owner = Owner::where('mail', Auth::user()->email)->first();
            $userRequests = UserRequest::where('id_proprietario', $owner->id)->orderBy('created_at', 'desc')->get();

            return view('user_request.index', compact('userRequests'));
        }elseif ( Auth::user()->level == 2 ){
            $supplierCp = SupplierCompany::where('mail', Auth::user()->email)->first();
            $userRequests = UserRequest::where('id_azienda_fornitrice', $supplierCp->id)->orderBy('created_at', 'desc')->get();

            return view('user_request.index', compact('userRequests'));
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        if ( Auth::user()->level == 1 || Auth::user()->level == 2 ){
            $owner = Owner::where('mail', Auth::user()->email)->first();
            $supplierCp = SupplierCompany::where('mail', Auth::user()->email)->first();

            if ( !empty($owner) ){
                // Creazione catalogo
                $smartFarm = SmartFarm::where('id_proprietario', $owner->id)->first();
                $usedTechnologies = UsedTechnology::where('id_smart_farm', $smartFarm->id)->get();

                $idUsedTechs = [];
                foreach($usedTechnologies as $uTech){
                    array_push($idUsedTechs, $uTech->id_tecnologia);
                }

                $catalogue = Technology::whereNotIn('id', $idUsedTechs)->orderBy("nome")->get();

                // Verifica UserRequests non completate
                $unsatisfied_u_req = false;
                $user_requests = UserRequest::where('id_proprietario', $owner->id,)->get();
                foreach( $user_requests as $user_request ){
                    if ( $user_request->completata != 1 ){
                        $unsatisfied_u_req = true;
                        break;
                    }
                }

                return view('user_request.create', compact('owner', 'catalogue', 'unsatisfied_u_req'));
            }else{
                // Verifica UserRequests non completate
                $unsatisfied_u_req = false;
                $user_requests = UserRequest::where('id_azienda_fornitrice', $supplierCp->id)->get();
                foreach( $user_requests as $user_request ){
                    if ( $user_request->completata != 1 ){
                        $unsatisfied_u_req = true;
                        break;
                    }
                }

                return view('user_request.create', compact('supplierCp', 'unsatisfied_u_req'));
            }
        }else{
            redirect('/home');
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $input = $request->all();
        $validator = null;

        if ( Auth::user()->level == 1 ){
            $validator = Validator::make($input, [
                'tipologia_mittente' => 'required|string|max:255',
                'descrizione' => 'required|max:65535',
                'data' => 'required|date',
                'id_proprietario' => 'required|integer',
            ]);

            $input['completata'] = false;
            $input['id_azienda_fornitrice'] = null;
        }elseif ( Auth::user()->level == 2 ){
            $validator = Validator::make($input, [
                'tipologia_mittente' => 'required|string|max:255',
                'descrizione' => 'required|max:65535',
                'data' => 'required|date',
                'id_azienda_fornitrice' => 'required|integer',
            ]);

            $input['completata'] = false;
            $input['id_proprietario'] = null;
        }

        if($validator->fails()){
            return redirect('/user_request/create')
                        ->withErrors($validator)
                        ->withInput();
        }

        UserRequest::create($input);

        if ( Auth::user()->level == 1 ){
            return redirect('/used_technology');
        }elseif ( Auth::user()->level == 2 ){
            return redirect('/technology');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(UserRequest $userRequest)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(UserRequest $userRequest)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, UserRequest $userRequest)
    {
        $input = $request->all();

        $input['completata'] = true;

        $userRequest->update($input);
        
        return response()->json([
            'message' => 'updated',
            'data' => $userRequest
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(UserRequest $userRequest)
    {
        if ( Auth::user()->level == 0 ){
            $userRequest->delete();

            return response()->json([
                'message' => 'deleted',
                'data' => $userRequest
            ], 200);
        }else{
            return redirect('/home');
        }
    }
}
