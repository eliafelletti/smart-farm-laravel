@extends('layouts.app')

@section('content')
<h1>Serre</h1>
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

<div class="row">
    <div class="col-md-6">
        <form action="{{ route('green_house.store') }}" method="POST">
            {{ csrf_field() }}
            
            <fieldset>
                
                <legend>Informazioni serra</legend>
                
                <label for="numero_piante" class="form-label mt-3">Numero piante</label>
                <input type="text" id="numero_piante" name="numero_piante" class="form-control" value="{{ old('numero_piante') }}">
                <div class="form-text">Inserisci il numero di piante presenti nella serra</div>

                <label for="id_smart_farm" class="form-label mt-3">Smart-Farm di appartenenza</label>
                <select id="id_smart_farm" name="id_smart_farm" class="form-control">
                    @if ( Auth::user()->level == 0 )
                        @foreach($smartFarms as $smFarm)
                            <option value="{{ $smFarm->id }}">{{ $smFarm->nome }}</option>
                        @endforeach
                    @elseif( Auth::user()->level == 1 )
                        <option value="{{ $smartFarm->id }}">{{ $smartFarm->nome }}</option>
                    @endif
                </select>
                <div class="form-text">Inserisci la smart-farm a cui appartiene la serra</div>

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
            <th scope="col">Smart-Farm</th>
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
                <td>{{ $gHouse->smart_farm->nome ?? 'No Smart-Farm' }}</td>

                <!-- Colonna nascosta contenente id della smart-farm -->
                <td id="{{ $gHouse->id }}" hidden="true">{{ $gHouse->smart_farm->id ?? 'No ID' }}</td>
                
                <td>{{ $gHouse->updated_at->format('d/m/Y H:i:s') }}</td>
                <td>
                    <a class="btn btn-primary btn-sm btn-modifica" data-id="{{ $gHouse->id }}">Modifica</a><br /><br />
                    <a href='{{ url("/green_house/$gHouse->id/monitor") }}' data-id="{{ $gHouse->id }}" class="btn btn-primary btn-sm btn-monitora">Monitora</a>
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
        let id_smart_farm = $('#id_smart_farm').val();
        let nome_smart_farm = $('#id_smart_farm option[value="' + id_smart_farm + '"]').text();
        let token = $('input[name="_token"]').val();

        $.ajax({
            url: '/green_house',
            type: 'POST',
            dataType: 'json',
            data: {
                'numero_piante': numero_piante,
                'id_smart_farm': id_smart_farm,
                '_token': token
            },
            success: function(response){
                console.log(response);

                var newColId = $('<td/>', {text: response.data.id});
                var newColNumPiante = $('<td/>', {text: response.data.numero_piante});
                var newColSmartFarm = $('<td/>', {text: nome_smart_farm});
                var newColIDSmartFarm = $('<td/>', {text: response.data.id_smart_farm}).attr('hidden', true).attr('id', response.data.id);

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

                /* CREAZIONE BOTTONE MONITORA */
                var actionMonitor = $('<a/>', { role: 'button', text: 'Monitora' })
                            .addClass('btn btn-primary btn-sm btn-monitora')
                            .attr('data-id', response.data.id)
                            .attr("href", "http://localhost:8000/green_house/" + response.data.id + "/monitor");

                var br1 = document.createElement("BR");
                var br2 = document.createElement("BR"); 

                var newColDelete = $('<td/>', {text: ''}).append(actionDelete);
                var newColModificaMonitor = $('<td/>', {text: ''}).append(actionModifica).append(br1, br2).append(actionMonitor);
                var newColUpdate = $('<td/>', {text: ''}).append(actionUpdate);

                var newRow = $('<tr/>').attr('data-id', response.data.id);
                newRow.append(newColId)
                        .append(newColNumPiante)
                        .append(newColSmartFarm)
                        .append(newColIDSmartFarm)
                        .append(newColData)
                        .append(newColModificaMonitor)
                        .append(newColDelete)
                        .append(newColUpdate);

                $('tbody').append(newRow);

                $('#numero_piante').val('');
                $('#id_smart_farm').val('');
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
                $('.alert-danger').attr("hidden", true);
                
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
        // Selezione del numero di piante corrente
        var num_piante = row.find("td:eq(1)").text();
        // Selezione del nome della smart farm corrente
        var smart_farm = row.find("td:eq(2)").text();
        // Selezione dell'id della smart farm corrente
        var id_smart_farm = row.find("td:eq(3)").text().trim();

        // Set dei valori già esistenti
        $('#numero_piante').val(num_piante);
        $('#id_smart_farm').val(id_smart_farm);
        $('.alert-danger').attr("hidden", true);

        // Modifica visibilità bottoni
        row.find('.btn-modifica').attr("hidden", true);
        row.find('.btn-update').attr("hidden", false);
        row.find('.btn-monitora').addClass("disabled").attr("aria-disabled", true);
        $('#btn-aggiungi').attr('disabled', true);

        // Scroll to top
        //document.documentElement.scrollTop = 0;
    });

    $('tbody').on('click', '.btn-update', function(event){
        event.preventDefault();

        let id = $(this).attr('data-id');
        let num_piante = $('#numero_piante').val();
        let id_smart_farm = $('#id_smart_farm').val();
        let nome_smart_farm = $('#id_smart_farm option[value="' + id_smart_farm + '"]').text();
        let token = $('input[name="_token"]').val();
        
        $.ajax({
            type: "POST",
            url: "/green_house/" + id,
            dataType: "json",
            data: {
                'numero_piante': num_piante,
                'id_smart_farm': id_smart_farm,
                '_token': token,
                '_method': 'PATCH',
            },
            success: function(response){
                console.log(response);

                // Modifica visibilità bottoni
                $('.btn-modifica').attr("hidden",false);
                $('.btn-update').attr("hidden",true);
                $('#btn-aggiungi').attr('disabled', false);
                $('.btn-monitora').removeClass("disabled").attr("aria-disabled", false);

                // Svuotamento dei campi
                $('#numero_piante').val('');
                $('#id_smart_farm').val('');
                $('.alert-danger').attr("hidden", true);

                // Aggiornamento con nuovi valori
                $('tr[data-id="' + response.data.id + '"]').find('td:eq(1)').text(num_piante);
                $('tr[data-id="' + response.data.id + '"]').find('td:eq(2)').text(nome_smart_farm);
                $('tr[data-id="' + response.data.id + '"]').find('td:eq(3)').text(id_smart_farm);
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
