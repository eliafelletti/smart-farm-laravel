@extends('layouts.app')

@section('content')
<h1>Serre</h1>
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
        <form action="{{ route('green_house.store') }}" method="POST">
            {{ csrf_field() }}
            
            <fieldset>
                
                <legend>Informazioni serra</legend>
                
                <label for="numero_piante" class="form-label mt-3">Numero piante</label>
                <input type="text" id="numero_piante" name="numero_piante" class="form-control" value="{{ old('numero_piante') }}">
                <div class="form-text">Inserisci il numero di piante presenti nella serra</div>

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
            <th scope="col">Numero Piante</th>
            <th scope="col">Ultima modifica</th>
            <th scope="col"></th>
            <th scope="col"></th>
            <th scope="col"></th>
        </tr>
    </thead>

    <tbody>
        @foreach ($greenHouses as $gHouse)
            <tr data-id='{{ $gHouse->id }}'>
                <td>{{ $gHouse->id }}</td>      
                <td>{{ $gHouse->numero_piante }}</td>
                
                <td>{{ $gHouse->updated_at->format('d/m/Y H:i:s') }}</td>
                <td>
                    <a class="btn btn-primary btn-sm btn-modifica" data-id="{{ $gHouse->id }}">Modifica</a>
                </td>
                <td>
                    <a href='{{ url("/green_house/$gHouse->id/destroy") }}' data-id="{{ $gHouse->id }}" class="btn btn-danger btn-sm btn-elimina">Elimina</a>
                </td>
                <td>
                    <a class="btn btn-primary btn-sm btn-update" data-id="{{ $gHouse->id }}" hidden="true">Applica modifiche</a>
                </td>
            </tr>
        @endforeach
    </tbody>

</table>
<br/>

<script type="application/javascript">

    $('#btn-aggiungi').bind('click', function(event){
        event.preventDefault();

        let numero_piante = $('#numero_piante').val();
        let token = $('input[name="_token"]').val();

        $.ajax({
            url: '/green_house',
            type: 'POST',
            dataType: 'json',
            data: {
                'numero_piante': numero_piante,
                '_token': token
            },
            success: function(response){
                console.log(response);

                var newColId = $('<td/>', {text: response.data.id});
                var newColNumPiante = $('<td/>', {text: response.data.numero_piante});

                var date = new Date(response.data.updated_at);
                var time = new Date();
                var date_display = `${String(date.getDate()).padStart(2, '0')}/${String(date.getMonth() + 1).padStart(2, '0')}/${date.getFullYear()} ${String(time.getHours()).padStart(2, '0')}:${String(time.getMinutes()).padStart(2, '0')}:${String(time.getSeconds()).padStart(2, '0')}`;

                var newColData = $('<td/>', {text: date_display});

                var actionDelete = $('<button/>', {role: 'button', text: 'Elimina'})
                            .addClass('btn btn-danger btn-sm btn-elimina')
                            .attr('data-id', response.data.id);
                
                /* CREAZIONE BOTTONE MODIFICA */
                var actionModifica = $('<button/>', { role: 'button', text: 'Modifica' })
                            .addClass('btn btn-primary btn-sm btn-modifica')
                            .attr('data-id', response.data.id);
                
                /* CREAZIONE BOTTONE UPDATE */
                var actionUpdate = $('<button/>', { role: 'button', text: 'Applica modifiche' })
                        .addClass('btn btn-primary btn-sm btn-update')
                        .attr('data-id', response.data.id)
                        .attr('hidden', true);

                var newColDelete = $('<td/>', {text: ''}).append(actionDelete);
                var newColModifica = $('<td/>', {text: ''}).append(actionModifica);
                var newColUpdate = $('<td/>', {text: ''}).append(actionUpdate);

                var newRow = $('<tr/>').attr('data-id', response.data.id);
                newRow.append(newColId)
                        .append(newColNumPiante)
                        .append(newColData)
                        .append(newColModifica)
                        .append(newColDelete)
                        .append(newColUpdate);

                $('tbody').append(newRow);

                $('#numero_piante').val('');
            },
            error: function(response, status){
                console.log('error');
            }
        });
    });

    $('tbody').on('click', '.btn-elimina', function(event){
        event.preventDefault();

        let id = $(this).attr('data-id');
        let token = $('input[name="_token"]').val();

        $.ajax({
            url: '/green_house/' + id + '/destroy',
            type: 'GET',
            dataType: 'json',
            data: {
                '_token': token
            },
            success: function(response){
                $('tr[data-id="' + response.data.id + '"]').remove();
            },
            error: function(response, status){
                console.log('error');
            }
        });
    });

    $('tbody').on('click', '.btn-modifica', function(event){
        event.preventDefault();

        let id = $(this).attr('data-id');
        let token = $('input[name="_token"]').val();

        // Estrazione della linea corrente
        var row = $(this).closest("tr");
        // Selezione della tipologia corrente
        var num_piante = row.find("td:eq(1)").text();

        // Set dei valori già esistenti
        $('#numero_piante').val(num_piante);

        // Modifica visibilità bottoni
        row.find('.btn-modifica').attr("hidden", true);
        row.find('.btn-update').attr("hidden", false);
        $('#btn-aggiungi').attr('disabled', true);
    });

    $('tbody').on('click', '.btn-update', function(event){
        event.preventDefault();

        let id = $(this).attr('data-id');
        let num_piante = $('#numero_piante').val();
        let token = $('input[name="_token"]').val();
        
        $.ajax({
            type: "PATCH",
            url: "/green_house/" + id,
            dataType: "json",
            data: {
                'numero_piante': num_piante,
                '_token': token,
            },
            success: function(response){
                console.log(response);

                // Modifica visibilità bottoni
                $('.btn-modifica').attr("hidden",false);
                $('.btn-update').attr("hidden",true);
                $('#btn-aggiungi').attr('disabled', false);

                // Svuotamento dei campi
                $('#numero_piante').val('');

                // Aggiornamento con nuovi valori
                $('tr[data-id="' + response.data.id + '"]').find('td:eq(1)').text(num_piante);
            },
            error: function(response, status){
                console.log('error');
            }
        });
    });

</script>
@endsection
