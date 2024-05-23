@extends('layouts.app')

@section('content')
<h1>Creazione nuova richiesta</h1>
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
        <form action="{{ url('/user_request') }}" method="POST">
            {{ csrf_field() }}
            
            <fieldset>
                
                <legend>Informazioni richiesta</legend>
                
                <label for="tipologia_mittente" class="form-label mt-3">Tipologia mittente</label>
                @if ( Auth::user()->level == 1 )
                    <select id="tipologia_mittente" name="tipologia_mittente" class="form-control">
                        <option value="{{ Auth::user()->level }}">Owner</option>
                    </select>
                @elseif ( Auth::user()->level == 2 ) 
                    <select id="tipologia_mittente" name="tipologia_mittente" class="form-control">
                        <option value="{{ Auth::user()->level }}">Supplier Company</option>
                    </select>
                @endif
                <div class="form-text">Tipologia del mittente della richiesta</div>
                
                <label for="descrizione" class="form-label mt-3">Descrizione</label>
                <textarea id="descrizione" name="descrizione" class="form-control" rows="10" cols="10" value="{{ old('descrizione') }}"></textarea>
                <div class="form-text">Inserisci la descrizione della richiesta</div>

                <label for="data" class="form-label mt-3">Data</label>
                <input type="date" id="data" name="data" class="form-control" value="{{ date('Y-m-d') }}" readonly>
                <div class="form-text">Data della richiesta</div>

                @if ( Auth::user()->level == 1 )
                    <label for="id_proprietario" class="form-label mt-3">Proprietario</label>
                    <select id="id_proprietario" name="id_proprietario" class="form-control">
                        <option value="{{ $owner->id }}">{{ $owner->nome }} {{ $owner->cognome }}</option>
                    </select>
                    <div class="form-text">Proprietario richiedente</div>
                @elseif ( Auth::user()->level == 2 )
                    <label for="id_azienda_fornitrice" class="form-label mt-3">Azienda Fornitrice</label>
                    <select id="id_azienda_fornitrice" name="id_azienda_fornitrice" class="form-control">
                        <option value="{{ $supplierCp->id }}">{{ $supplierCp->nome }}</option>
                    </select>
                    <div class="form-text">Azienda Fornitrice richiedente</div>
                @endif

                <hr/>
                <input type="submit" class="btn btn-primary mb-3" value="Invia Richiesta" />

            </fieldset>

        </form> 
    </div>

    @if ( Auth::user()->level == 1 )
        <div class="col-md-6">
            <br/><h2 class="fs-5">Catalogo</h2>
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th scope="col">Tecnologia</th>
                        <th scope="col">Tipologia</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach($catalogue as $item)
                        <tr data-id='{{ $item->id }}'>
                            <td>{{ $item->nome }}</td>
                            <td>{{ $item->tipologia }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    @endif
</div><br/>
@endsection
