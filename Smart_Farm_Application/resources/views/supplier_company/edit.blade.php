@extends('layouts.app')

@section('content')
    @if( Auth::user()->level == 0 )
        <h1>Modifica azienda fornitrice</h1>
    @elseif ( Auth::user()->level == 2 )
        <h1>Modifica profilo</h1>
    @endif
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
            <form action='{{ url("/supplier_company/$supplierCompany->id") }}' method="POST">
                {{ csrf_field() }}
                {{ method_field('PATCH') }}

                <fieldset>

                    <legend> Informazioni azienda fornitrice </legend>


                    <label for="nome" class="form-label mt-3">Nome</label>
                    <input type="text" id="nome" name="nome" class="form-control" value="{{ $supplierCompany->nome }}">
                    <div class="form-text">Inserisci il nome dell'azienda fornitrice</div>

                    <label for="mail" class="form-label mt-3">Email</label>
                    @if ( Auth::user()->level == 0 )
                        <input type="email" id="mail" name="mail" class="form-control" value="{{ $supplierCompany->mail }}">
                        <div class="form-text">Inserisci l'email dell'azienda fornitrice</div>
                    @elseif ( Auth::user()->level == 2 )
                        <input type="email" id="mail" name="mail" class="form-control" value="{{ $supplierCompany->mail }}" readonly>
                        <div class="form-text">Email dell'azienda fornitrice</div>
                    @endif

                    <label for="telefono" class="form-label mt-3">Telefono</label>
                    <input type="text" id="telefono" name="telefono" class="form-control" value="{{ $supplierCompany->telefono }}">
                    <div class="form-text">Inserisci il telefono dell'azienda fornitrice</div>

                    <label for="fax" class="form-label mt-3">Fax</label>
                    <input type="text" id="fax" name="fax" class="form-control" value="{{ $supplierCompany->fax }}">
                    <div class="form-text">Inserisci il fax dell'azienda fornitrice</div>

                    <label for="via" class="form-label mt-3">Via</label>
                    <input type="text" id="via" name="via" class="form-control" value="{{ $supplierCompany->via }}">
                    <div class="form-text">Inserisci la via della sede dell'azienda fornitrice</div>

                    <label for="civico" class="form-label mt-3">Civico</label>
                    <input type="text" id="civico" name="civico" class="form-control" value="{{ $supplierCompany->civico }}">
                    <div class="form-text">Inserisci il civico della sede dell'azienda fornitrice</div>

                    <label for="citta" class="form-label mt-3">Città</label>
                    <input type="text" id="citta" name="citta" class="form-control" value="{{ $supplierCompany->citta }}">
                    <div class="form-text">Inserisci la città della sede dell'azienda fornitrice</div>

                    <label for="cap" class="form-label mt-3">CAP</label>
                    <input type="text" id="cap" name="cap" class="form-control" value="{{ $supplierCompany->cap }}">
                    <div class="form-text">Inserisci il cap della sede dell'azienda fornitrice</div>

                    <hr />
                    <input type="submit" class="btn btn-primary mb-3" value="Modifica" />	

                </fieldset>

            </form>
        </div>
    </div><br/>
@endsection
