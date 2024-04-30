@extends('layouts.app')

@section('content')
    <h1>Tecnologie</h1>
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

                    <hr />
                    <input type="submit" id="btn-aggiungi" class="btn btn-primary mb-3" value="Aggiungi" />

                </fieldset>

            </form>
        </div>
    </div>
    <hr/><br/>

    <table class="table table-striped">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Nome</th>
                <th scope="col">Tipologia</th>
                <th scope="col">Azienda Fornitrice</th>
                <th scope="col">Ultima modifica</th>
                <th scope="col"></th>
                <th scope="col"></th>
                <th scope="col"></th>
            </tr>
        </thead>
        <tbody>
            @foreach ($technologies as $technology)
                <tr data-id="{{ $technology->id }}">
                    <td>{{ $technology->id }}</td>
                    <td>{{ $technology->nome }}</td>
                    <td>{{ $technology->tipologia }}</td>
                    <td>{{ $technology->azienda_fornitrice->nome }}</td>

                    <!-- Colonna nascosta contenente id della azienda fornitrice -->
                    <td id="{{ $technology->id }}" hidden="true">{{ $technology->azienda_fornitrice->id }}</td>

                    <td>{{ $technology->updated_at->format('d/m/Y H:i:s') }}</td>
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
                </tr>
            @endforeach
        </tbody>
    </table>

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
                },
                error: function(response, status){
                    console.log('error');
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
                type: "PATCH",
                url: "/technology/"+id,
                dataType: "json",
                data: {
                    'nome': nome,
                    'tipologia': tipologia,
                    'id_azienda_fornitrice': id_azienda_fornitrice,
                    '_token': token,
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

                    // aggiorno con i nuovi valori
                    $('tr[data-id="'+response.data.id+'"]').find('td:eq(1)').text(nome);
                    $('tr[data-id="'+response.data.id+'"]').find('td:eq(2)').text(tipologia);
                    $('tr[data-id="'+response.data.id+'"]').find('td:eq(3)').text(nome_azienda_fornitrice);
                },
                error: function(response, status){
                    console.log('error');
                }
            });
        });
    </script>
@endsection
