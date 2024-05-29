@extends('layouts.app')

@section('content')
<h1>Creazione nuova smart-farm</h1>
<hr/>

@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<div class="row">
    <div class="col-md-6">
        <form action="{{ url('/smart_farm') }}" method="POST">
            {{ csrf_field() }}
            
            <fieldset>
                
                <legend>Informazioni smart-farm</legend>
                
                <label for="nome" class="form-label mt-3">Nome</label>
                <input type="text" id="nome" name="nome" class="form-control" value="{{ old('nome') }}">
                <div class="form-text">Inserisci il nome della smart-farm</div>
                
                <label for="dimensione" class="form-label mt-3">Dimensione [m2]</label>
                <input type="number" id="dimensione" name="dimensione" class="form-control" max="99999999" step="0.01" value="{{ old('dimensione') }}">
                <div class="form-text">Inserisci la dimensione della smart-farm</div>

                <label for="telefono" class="form-label mt-3">Telefono</label>
                <input type="tel" id="telefono" name="telefono" class="form-control" value="{{ old('telefono') }}">
                <div class="form-text">Inserisci il telefono della smart-farm</div>
                
                <label for="mail" class="form-label mt-3">Mail</label>
                <input type="email" id="mail" name="mail" class="form-control" value="{{ old('mail') }}">
                <div class="form-text">Inserisci l'email della smart-farm</div>

                <label for="via" class="form-label mt-3">Via</label>
                <input type="text" id="via" name="via" class="form-control" value="{{ old('via') }}">
                <div class="form-text">Inserisci la via della smart-farm</div>

                <label for="civico" class="form-label mt-3">Civico</label>
                <input type="text" id="civico" name="civico" class="form-control" value="{{ old('civico') }}">
                <div class="form-text">Inserisci il civico della smart-farm</div>

                <label for="citta" class="form-label mt-3">Città</label>
                <input type="text" id="citta" name="citta" class="form-control" value="{{ old('citta') }}">
                <div class="form-text">Inserisci la città in cui è situata la smart-farm</div>

                <label for="cap" class="form-label mt-3">CAP</label>
                <input type="text" id="cap" name="cap" class="form-control" value="{{ old('cap') }}">
                <div class="form-text">Inserisci il CAP della smart-farm</div>

                <label for="id_proprietario" class="form-label mt-3">Proprietario</label>
                <select id="id_proprietario" name="id_proprietario" class="form-control">
                    @if ( Auth::user()->level == 0 )
                        @foreach($owners as $owner)
                            <option value="{{ $owner->id }}">{{ $owner->nome ?? 'No Owner' }} {{ $owner->cognome ?? '' }}</option>
                        @endforeach
                    @elseif ( Auth::user()->level == 1 )
                        <option value="{{ $owner->id }}">{{ $owner->nome ?? 'No Owner' }} {{ $owner->cognome ?? '' }}</option>
                    @endif
                </select>
                <div class="form-text">Inserisci il proprietario della smart-farm</div>

                <hr />
                <input type="submit" class="btn btn-success mb-3" value="Aggiungi" />	

            </fieldset>

        </form> 
    </div>
</div><br/>
@endsection
