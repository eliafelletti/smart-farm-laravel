@extends('layouts.app')

@section('content')
    <h1>Tecnologie</h1>
    
    <div class="row mt-4 mb-4">
		<div class="col-md-12">
            <form action="{{ route('technology.store') }}" method="POST">
                {{ csrf_field() }}

                <div class="row">
                    <div class="col-md-5">
                        <fieldset>
                            <label>Nome</label>
                            <input class="form-control" name="nome" id="technology-name" />
                        </fieldset>
                    </div>

                    <div class="col-md-5">
                        <fieldset>
                            <label>Tipologia</label>
                            <input class="form-control" name="tipologia" id="technology-type" />
                        </fieldset>
                    </div>
                    <div class="col-md-2">
                        <fieldset>
                            <input type="submit" id="btn-aggiungi" class="btn btn-primary mt-4 float-end" value="Aggiungi" />
                        </fieldset>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <table class="table table-striped">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Nome</th>
                <th scope="col">Tipologia</th>
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
            let token = $('input[name="_token"]').val();

            $.ajax({
                url: "/technology",
                type: "POST",
                dataType: 'json',
                data: {
                    'nome': nome,
                    'tipologia': tipologia,
                    '_token': token 
                },
                success: function(response){
                    console.log(response);
                    /* CREO CAMPI */
                    var NewColId = $('<td/>',{ text: response.data.id });
                    var NewColName = $('<td/>',{ text: response.data.nome });
                    var NewColTipologia = $('<td/>',{ text: response.data.tipologia });
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
                    NewRow.append(NewColId).append(NewColName).append(NewColTipologia).append(NewColUltimaModifica).append(NewColAzioniModifica).append(NewColAzioniDelete).append(NewColAzioniUpdate);

                    /* AGGIUNGO EFFETTIVAMENTE LA RIGA ALLA TABELLA */
                    $('tbody').append(NewRow);

                    /* SVUOTO I CAMPI DEL FORM (passando valori assumono effetto di setter) */
                    $('#technology-name').val('');
                    $('#technology-type').val('');
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
            var nome=row.find("td:eq(1)").text(); // seleziono il nome corrente
            var tipologia=row.find("td:eq(2)").text(); // seleziono la tipologia corrente

            //setto i valori già esistenti
            $('#technology-name').val(nome);
            $('#technology-type').val(tipologia);

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
            let token = $('input[name="_token"]').val();

            $.ajax({
                type: "PATCH",
                url: "/technology/"+id,
                dataType: "json",
                data: {
                    'nome': nome,
                    'tipologia': tipologia,
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

                    // aggiorno con i nuovi valori
                    $('tr[data-id="'+response.data.id+'"]').find('td:eq(1)').text(nome);
                    $('tr[data-id="'+response.data.id+'"]').find('td:eq(2)').text(tipologia);
                },
                error: function(response, status){
                    console.log('error');
                }
            });
        });
    </script>
@endsection
