@extends('layouts.app')

@section('content')
    @if ( Auth::user()->level == 0 )
        <h1>Tecnologie</h1>
    @elseif ( Auth::user()->level == 2 )
        <h1>Tecnologie Proprietarie</h1>
    @endif
    <hr/>

    <div class="alert alert-danger" hidden="true">
        @if ($errors->any())
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        @endif
    </div>
    
    @if ( Auth::user()->level == 0 )
        <div class="row">
            <div class="col-md-6">
                <form action="{{ route('technology.store') }}" method="POST">
                    {{ csrf_field() }}

                    <fieldset>
                        <legend> Informazioni tecnologie </legend>

                        <label for="technology-name" class="form-label mt-3">Nome tecnologia</label>
                        <input type="text" name="nome" id="technology-name"  class="form-control" value="{{ old('nome') }}">
                        <div class="form-text">Inserisci il nome della tecnologia che potrà essere usata in serra</div>

                        <label for="technology-type" class="form-label mt-3">Tipologia tecnologia</label>
                        <select id="technology-type" name="tipologia" class="form-control">
                            <option value="CO2">CO2</option>
                            <option value="Irrigazione">Irrigazione</option>
                            <option value="Luminosità">Luminosità</option>
                            <option value="Temperatura">Temperatura</option>
                            <option value="Umidità">Umidità</option>
                        </select>
                        <div class="form-text">Inserisci la tipologia della tecnologia che potrà essere usata in serra</div>

                        <label for="id_azienda_fornitrice" class="form-label mt-3">Azienda Fornitrice</label>
                        <select id="id_azienda_fornitrice" name="id_azienda_fornitrice" class="form-control">
                            @foreach($supplierCompanies as $sComp)
                                <option value="{{ $sComp->id }}">{{ $sComp->nome }}</option>
                            @endforeach
                        </select>
                        <div class="form-text">Inserisci l'azienda fornitrice della tecnologia che potrà essere usata in serra</div>

                        <hr />
                        <input type="submit" id="btn-aggiungi" class="btn btn-primary mb-3" value="Aggiungi" />

                    </fieldset>

                </form>
            </div>
        </div>
        <hr/><br/>
    @endif

    <table class="table table-striped">
        <thead>
            <tr>
                @if ( Auth::user()->level == 0 )
                    <th scope="col">#</th>
                @endif

                <th scope="col">Nome</th>
                <th scope="col">Tipologia</th>

                @if ( Auth::user()->level == 0 )
                    <th scope="col">Azienda Fornitrice</th>
                @endif

                <th scope="col">Ultima modifica</th>

                @if ( Auth::user()->level == 0 )
                    <th scope="col"></th>
                    <th scope="col"></th>
                    <th scope="col"></th>
                @endif
            </tr>
        </thead>
        <tbody>
            @foreach ($technologies as $technology)
                <tr data-id="{{ $technology->id }}">
                    @if ( Auth::user()->level == 0 )
                        <td>{{ $technology->id }}</td>
                    @endif

                    <td>{{ $technology->nome }}</td>
                    <td>{{ $technology->tipologia }}</td>

                    @if ( Auth::user()->level == 0 )
                        <td>{{ $technology->azienda_fornitrice->nome ?? 'No Azienda Fornitrice' }}</td>
                    @endif

                    <!-- Colonna nascosta contenente id della azienda fornitrice -->
                    <td id="{{ $technology->id }}" hidden="true">{{ $technology->azienda_fornitrice->id ?? 'No ID' }}</td>

                    <td>{{ $technology->updated_at->format('d/m/Y H:i:s') }}</td>

                    @if ( Auth::user()->level == 0 )
                        <td>
                            <a class="btn btn-primary btn-sm btn-modifica" data-id="{{ $technology->id }}">Modifica</a>
                        </td>
                        <td>
                            <a href='{{ url("technology/$technology->id/destroy") }}' class="btn btn-danger btn-sm btn-elimina" data-id="{{ $technology->id }}">Elimina</a>
                            <!-- inserisco anche il data-id per sapere l'id della entry da elimiare -->
                        </td>
                        <td>
                            <a class="btn btn-primary btn-sm btn-update" data-id="{{ $technology->id }}" hidden="true">Applica modifiche</a>
                        </td>
                    @endif
                </tr>
            @endforeach
        </tbody>
    </table>

    @if ( Auth::user()->level == 2 )
        <br/>

        <h2>Nuove Tecnologie</h2><hr/>
        <h3 class="fs-5">Disponibilità di proporre nuove tecnologie per la piattaforma</h3><br/>

        @if ( !$dangling_req )
            <a href="{{ url('/user_request/create') }}" class="btn btn-primary btn-sm btn-req">Proponi</a>
        @else
            <a href="{{ url('/user_request/create') }}" class="btn btn-primary btn-sm btn-req disabled" aria-disabled="true">Proponi</a>
        @endif
    @endif

    <script type="application/javascript">
        $('#btn-aggiungi').bind('click',function(event){
            event.preventDefault();

            let nome = $('#technology-name').val();
            let tipologia = $('#technology-type').val();
            let id_azienda_fornitrice = $('#id_azienda_fornitrice').val();
            let nome_azienda_fornitrice = $('#id_azienda_fornitrice option[value="' + id_azienda_fornitrice + '"]').text();
            let token = $('input[name="_token"]').val();

            $.ajax({
                url: "/technology",
                type: "POST",
                dataType: 'json',
                data: {
                    'nome': nome,
                    'tipologia': tipologia,
                    'id_azienda_fornitrice': id_azienda_fornitrice,
                    '_token': token 
                },
                success: function(response){
                    console.log(response);
                    /* CREO CAMPI */
                    var NewColId = $('<td/>',{ text: response.data.id });
                    var NewColName = $('<td/>',{ text: response.data.nome });
                    var NewColTipologia = $('<td/>',{ text: response.data.tipologia });
                    var NewColFornitrice = $('<td/>',{ text: nome_azienda_fornitrice });
                    var NewColIDFornitrice = $('<td/>', {text: response.data.id_azienda_fornitrice}).attr('hidden', true).attr('id', response.data.id);
                    var NewColUltimaModifica = $('<td/>',{ text: response.data.updated_at });

                    var date = new Date(response.data.updated_at);
                    var time = new Date();
                    var date_display = `${String(date.getDate()).padStart(2, '0')}/${String(date.getMonth() + 1).padStart(2, '0')}/${date.getFullYear()} ${String(time.getHours()).padStart(2, '0')}:${String(time.getMinutes()).padStart(2, '0')}:${String(time.getSeconds()).padStart(2, '0')}`
                    var NewColUltimaModifica = $('<td/>',{ text: date_display });
                    
                    /* CREO BOTTONE ELIMINAZIONE */
                    var actionDelete = $('<button/>', { role: 'button', text: 'Elimina' })
                            .addClass('btn btn-danger btn-sm btn-elimina')
                            .attr('data-id', response.data.id);

                    /* CREO BOTTONE MODIFICA */
                    var actionModifica = $('<button/>', { role: 'button', text: 'Modifica' })
                            .addClass('btn btn-primary btn-sm btn-modifica')
                            .attr('data-id', response.data.id);

                    /* CREO BOTTONE UPDATE */
                    var actionUpdate = $('<button/>', { role: 'button', text: 'Applica modifiche' })
                            .addClass('btn btn-primary btn-sm btn-update')
                            .attr('data-id', response.data.id)
                            .attr('hidden', true);

                    /* CREO COLONNE CON BOTTONI AZIONE */
                    var NewColAzioniModifica = $('<td/>', { text: '' }).append(actionModifica);

                    var NewColAzioniDelete = $('<td/>', { text: '' }).append(actionDelete);

                    var NewColAzioniUpdate = $('<td/>', { text: '' }).append(actionUpdate);

                    /* CREO NUOVA RIGA E AGGIUNGO I CAMPI CREATI PRECEDENTEMENTE */
                    var NewRow = $('<tr/>').attr('data-id',response.data.id);
                    NewRow.append(NewColId).append(NewColName).append(NewColTipologia).append(NewColFornitrice).append(NewColIDFornitrice).append(NewColUltimaModifica).append(NewColAzioniModifica).append(NewColAzioniDelete).append(NewColAzioniUpdate);

                    /* AGGIUNGO EFFETTIVAMENTE LA RIGA ALLA TABELLA */
                    $('tbody').append(NewRow);

                    /* SVUOTO I CAMPI DEL FORM (passando valori assumono effetto di setter) */
                    $('#technology-name').val('');
                    $('#technology-type').val('');
                    $('#id_azienda_fornitrice').val('');

                    $('.alert-danger').attr("hidden", true);
                },
                error: function(response, status){
                    console.log('error');

                    var response_ajax = $(response.responseText);

                    var alertContent = response_ajax.find('.alert-danger').html();
                    $('.alert-danger').attr("hidden", false).html(alertContent);
                }
                
            });
        });

        $('tbody').on('click', '.btn-elimina', function(event) {
            event.preventDefault();

            let id = $(this).attr('data-id');
            let token = $('input[name="_token"]').val();

            $.ajax({
                type: "GET",
                url: "/technology/"+id+"/destroy",
                dataType: "json",
                data: {
                    '_token': token
                },
                success: function (response) {
                    console.log(response);

                    $('.alert-danger').attr("hidden", true);
                    
                    $('tr[data-id="'+response.data.id+'"]').remove();
                },
                error: function(response, status){
                    console.log('error');
                }
            });
        });

        $('tbody').on('click', '.btn-modifica', function(event) {
            event.preventDefault();

            let id = $(this).attr('data-id');
            let token = $('input[name="_token"]').val();

            var row = $(this).closest("tr"); //estraggo la linea corrente
            var nome = row.find("td:eq(1)").text(); // seleziono il nome corrente
            var tipologia = row.find("td:eq(2)").text(); // seleziono la tipologia corrente
            var nome_azienda_fornitrice = row.find("td:eq(3)").text(); // seleziono il nome dell'azienda fornitrice corrente
            var id_azienda_fornitrice = row.find("td:eq(4)").text().trim(); // seleziono l'id dell'azienda fornitrice corrente

            //setto i valori già esistenti
            $('#technology-name').val(nome);
            $('#technology-type').val(tipologia);
            $('#id_azienda_fornitrice').val(id_azienda_fornitrice);

            //alterno i bottoni e disabilito l'aggiunta
            row.find('.btn-modifica').attr("hidden", true);
            row.find('.btn-update').attr("hidden", false);
            $('#btn-aggiungi').attr("disabled", true);

            $('.alert-danger').attr("hidden", true);

            // Scroll to top
            window.scrollTo({ top: 0, behavior: 'smooth' });
        });

        $('tbody').on('click', '.btn-update', function(event) {
            event.preventDefault();

            let id = $(this).attr('data-id');
            let nome = $('#technology-name').val();
            let tipologia = $('#technology-type').val();
            let id_azienda_fornitrice = $('#id_azienda_fornitrice').val();
            let nome_azienda_fornitrice = $('#id_azienda_fornitrice option[value="' + id_azienda_fornitrice + '"]').text();
            let token = $('input[name="_token"]').val();

            $.ajax({
                type: "POST",
                url: "/technology/"+id,
                dataType: "json",
                data: {
                    'nome': nome,
                    'tipologia': tipologia,
                    'id_azienda_fornitrice': id_azienda_fornitrice,
                    '_token': token,
                    '_method': 'PATCH',
                },
                success: function (response) {
                    console.log(response);
                    // alterno i bottoni e riabilito l'aggiunta
                    $('.btn-modifica').attr("hidden",false);
                    $('.btn-update').attr("hidden",true);
                    $('#btn-aggiungi').attr("disabled", false);

                    // svuoto i campi
                    $('#technology-name').val('');
                    $('#technology-type').val('');
                    $('#id_azienda_fornitrice').val('');
                    $('.alert-danger').attr("hidden", true);

                    // aggiorno con i nuovi valori
                    $('tr[data-id="'+response.data.id+'"]').find('td:eq(1)').text(nome);
                    $('tr[data-id="'+response.data.id+'"]').find('td:eq(2)').text(tipologia);
                    $('tr[data-id="'+response.data.id+'"]').find('td:eq(3)').text(nome_azienda_fornitrice);
                    $('tr[data-id="'+response.data.id+'"]').find('td:eq(4)').text(id_azienda_fornitrice);
                },
                error: function(response, status){
                    console.log('error');

                    var response_ajax = $(response.responseText);

                    var alertContent = response_ajax.find('.alert-danger').html();
                    $('.alert-danger').attr("hidden", false).html(alertContent);
                }
            });
        });
    </script>
@endsection
