@extends('layouts.app')

@section('content')
    <h1>Modifica evento</h1>
    <hr>

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
            <form action='{{ url("/realized_crop/{$realizedCrop->id}") }}' method="POST">
                {{ csrf_field() }}
                {{ method_field('PATCH') }}

                <fieldset>

                    <legend>Informazioni evento</legend>
                
                    <label for="id_proprietario" class="form-label mt-3">Proprietario</label>
                    <select id="id_proprietario" name="id_proprietario" class="form-control" value="{{ $realizedCrop->id_proprietario }}">
                        @if ( Auth::user()->level == 0 )
                            @foreach($owners as $owner)
                                <option value="{{ $owner->id }}" @selected( $owner->id == $realizedCrop->id_proprietario )>{{ $owner->nome ?? 'No Owner' }} {{ $owner->cognome ?? '' }}</option>
                            @endforeach
                        @elseif ( Auth::user()->level == 1 )
                            <option value="{{ $owner->id }}" @selected( $owner->id == $realizedCrop->id_proprietario )>{{ $owner->nome ?? 'No Owner' }} {{ $owner->cognome ?? '' }}</option>
                        @endif
                    </select>
                    <div class="form-text">Inserisci il proprietario</div>

                    <label for="id_serra" class="form-label mt-3">Serra</label>
                    <select id="id_serra" name="id_serra" class="form-control" value="{{ $realizedCrop->id_serra }}">
                        @foreach($green_houses as $g_house)
                            <option value="{{ $g_house->id }}" @selected( $g_house->id == $realizedCrop->id_serra )>{{ $g_house->smart_farm->nome ?? 'No Serra' }} [{{ $g_house->id ?? '' }}]</option>
                        @endforeach
                    </select>
                    <div class="form-text">Inserisci la serra</div>

                    <label for="id_coltura" class="form-label mt-3">Coltura</label>
                    <select id="id_coltura" name="id_coltura" class="form-control" value="{{ $realizedCrop->id_coltura }}">
                        @foreach($cultivations as $cultivation)
                            <option value="{{ $cultivation->id }}" @selected( $cultivation->id == $realizedCrop->id_coltura )>{{ $cultivation->tipologia ?? 'No Coltura' }}</option>
                        @endforeach
                    </select>
                    <div class="form-text">Inserisci la coltura</div>

                    <label for="data_semina" class="form-label mt-3">Data di semina</label>
                    <input type="date" id="data_semina" name="data_semina" class="form-control" value="{{ $realizedCrop->data_semina->format('Y-m-d') }}">
                    <div class="form-text">Inserisci la data di semina</div>

                    <label for="data_raccolta_teorica" class="form-label mt-3">Data di raccolta teorica</label>
                    <input type="date" id="data_raccolta_teorica" name="data_raccolta_teorica" class="form-control" value="{{ $realizedCrop->data_raccolta_teorica->format('Y-m-d') }}">
                    <div class="form-text">Inserisci la data di raccolta teorica</div>

                    <label for="data_raccolta_effettiva" class="form-label mt-3">Data di raccolta effettiva</label>
                    @if ($realizedCrop->data_raccolta_effettiva == '')
                        <input type="date" id="data_raccolta_effettiva" name="data_raccolta_effettiva" class="form-control" value="{{ old('data_raccolta_effettiva') }}">
                    @else
                        <input type="date" id="data_raccolta_effettiva" name="data_raccolta_effettiva" class="form-control" value="{{ $realizedCrop->data_raccolta_effettiva->format('Y-m-d') }}">
                    @endif
                        <div class="form-text">Inserisci la data di raccolta effettiva</div>

                    <hr />
                    <input type="submit" class="btn btn-success mb-3" value="Modifica" />	
                
                </fieldset>
            
            </form>
        </div>
    </div>
@endsection
