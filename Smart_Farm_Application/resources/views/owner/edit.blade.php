@extends('layouts.app')

@section('content')
    <h1>Modifica proprietario</h1>
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
            <form action='{{ url("/owner/$owner->id") }}' method="POST">
                {{ csrf_field() }}
                {{ method_field('PATCH') }}

                <fieldset>

                    <legend> Informazioni proprietario </legend>

                    <label for="cf" class="form-label mt-3">Codice fiscale</label>
                    <input type="text" id="ownercf" name="cf" class="form-control" value="{{ $owner->cf }}">
                    <div class="form-text">Inserisci il codice fiscale del proprietario</div>

                    <label for="nome" class="form-label mt-3">Nome</label>
                    <input type="text" id="nome" name="nome" class="form-control" value="{{ $owner->nome }}">
                    <div class="form-text">Inserisci il nome del proprietario</div>

                    <label for="cognome" class="form-label mt-3">Cognome</label>
                    <input type="text" id="cognome" name="cognome" class="form-control" value="{{ $owner->cognome }}">
                    <div class="form-text">Inserisci il cognome del proprietario</div>

                    <label for="data_nascita" class="form-label mt-3">Data di nascita</label>
                    <input type="date" id="data_nascita" name="data_nascita" class="form-control" value="{{ $owner->data_nascita->format('Y-m-d') }}">
                    <div class="form-text">Inserisci la data di nascita del proprietario</div>

                    <label for="luogo_nascita" class="form-label mt-3">Luogo di nascita</label>
                    <input type="text" id="luogo_nascita" name="luogo_nascita" class="form-control" value="{{ $owner->luogo_nascita }}">
                    <div class="form-text">Inserisci il luogo di nascita del proprietario</div>

                    <label for="telefono" class="form-label mt-3">Telefono</label>
                    <input type="text" id="telefono" name="telefono" class="form-control" value="{{ $owner->telefono }}">
                    <div class="form-text">Inserisci il telefono del proprietario</div>

                    <label for="mail" class="form-label mt-3">Email</label>
                    <input type="email" id="mail" name="mail" class="form-control" value="{{ $owner->mail }}">
                    <div class="form-text">Inserisci l'email del proprietario</div>

                    <label for="via" class="form-label mt-3">Via</label>
                    <input type="text" id="via" name="via" class="form-control" value="{{ $owner->via }}">
                    <div class="form-text">Inserisci la via di residenza del proprietario</div>

                    <label for="civico" class="form-label mt-3">Civico</label>
                    <input type="text" id="civico" name="civico" class="form-control" value="{{ $owner->civico }}">
                    <div class="form-text">Inserisci il civico di residenza del proprietario</div>

                    <label for="citta" class="form-label mt-3">Città</label>
                    <input type="text" id="citta" name="citta" class="form-control" value="{{ $owner->citta }}">
                    <div class="form-text">Inserisci la città di residenza del proprietario</div>

                    <label for="cap" class="form-label mt-3">CAP</label>
                    <input type="text" id="cap" name="cap" class="form-control" value="{{ $owner->cap }}">
                    <div class="form-text">Inserisci il cap dell città di residenza del proprietario</div>

                    <hr />
                    <input type="submit" class="btn btn-primary mb-3" value="Modifica" />	

                </fieldset>

            </form>
        </div>
    </div><br/>
@endsection
