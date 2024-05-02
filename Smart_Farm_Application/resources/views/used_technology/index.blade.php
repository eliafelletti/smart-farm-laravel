@extends('layouts.app')

@section('content')
<h1>Tecnologie Utilizzate</h1>
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

@if ( Auth::user()->level == 0 )
    <div class="row">
        <div class="col-md-6">
            <form action="{{ route('used_technology.store') }}" method="POST">
                {{ csrf_field() }}
                
                <fieldset>
                    
                    <legend>Informazioni tecnologie utilizzate</legend>
                    
                    <label for="id_tecnologia" class="form-label mt-3">Tecnologia di riferimento</label>
                    <select id="id_tecnologia" name="id_tecnologia" class="form-control">
                        @foreach($technologies as $tech)
                            <option value="{{ $tech->id }}">{{ $tech->nome }}</option>
                        @endforeach
                    </select>
                    <div class="form-text">Inserisci la tecnologia associata ad una determinata smart-farm</div>

                    <label for="id_smart_farm" class="form-label mt-3">Smart-Farm di riferimento</label>
                    <select id="id_smart_farm" name="id_smart_farm" class="form-control">
                        @foreach($smartFarms as $smFarm)
                            <option value="{{ $smFarm->id }}">{{ $smFarm->nome }}</option>
                        @endforeach
                    </select>
                    <div class="form-text">Inserisci la smart-farm di cui si vuole registare la tecnologia utilizzata</div>

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

            <th scope="col">Tecnologia</th>
            <th scope="col">Smart-Farm</th>
            <th scope="col">Ultima modifica</th>
            
            @if ( Auth::user()->level == 0 )
                <th scope="col"></th>
                <th scope="col"></th>
                <th scope="col"></th>
            @endif

        </tr>
    </thead>

    <tbody>
        @foreach($usedTechnologies as $uTech)
            <tr data-id='{{ $uTech->id }}'>
                @if ( Auth::user()->level == 0 )
                    <td>{{ $uTech->id }}</td>
                @endif

                <td>{{ $uTech->tecnologia->nome }}</td>
                <td>{{ $uTech->smart_farm->nome }}</td>

                @if ( Auth::user()->level == 0 )
                    <!-- Colonna nascosta contenente id della tecnologia -->
                    <td id="{{ $uTech->id }}_tec" hidden="true">{{ $uTech->id_tecnologia }}</td>
                    <!-- Colonna nascosta contenente id della misura -->
                    <td id="{{ $uTech->id }}_sFarm" hidden="true">{{ $uTech->id_smart_farm }}</td>
                @endif
                
                <td>{{ $uTech->updated_at->format('d/m/Y H:i:s') }}</td>
                
                @if ( Auth::user()->level == 0 )
                    <td>
                        <a class="btn btn-primary btn-sm btn-modifica" data-id="{{ $uTech->id }}">Modifica</a>
                    </td>
                    <td>
                        <a href='{{ url("/realized_measure/$uTech->id/destroy") }}' data-id="{{ $uTech->id }}" class="btn btn-danger btn-sm btn-elimina">Elimina</a>
                    </td>
                    <td>
                        <a class="btn btn-primary btn-sm btn-update" data-id="{{ $uTech->id }}" hidden="true">Applica modifiche</a>
                    </td>
                @endif

            </tr>
        @endforeach
    </tbody>

</table>
<br/>

<script type="application/javascript">

    $('#btn-aggiungi').bind('click', function(event){
        event.preventDefault();

        let id_tecnologia = $('#id_tecnologia').val();
        let nome_tecnologia = $('#id_tecnologia option[value="' + id_tecnologia + '"]').text();
        let id_smart_farm = $('#id_smart_farm').val();
        let nome_smart_farm = $('#id_smart_farm option[value="' + id_smart_farm + '"]').text();
        let token = $('input[name="_token"]').val();

        $.ajax({
            url: '/used_technology',
            type: 'POST',
            dataType: 'json',
            data: {
                'id_tecnologia': id_tecnologia,
                'id_smart_farm': id_smart_farm,
                '_token': token
            },
            success: function(response){
                console.log(response);

                var newColId = $('<td/>', {text: response.data.id});
                var newColTec = $('<td/>', {text: nome_tecnologia});
                var newColSFarm = $('<td/>', {text: nome_smart_farm});
                var newColIDTec = $('<td/>', {text: response.data.id_tecnologia}).attr('hidden', true).attr('id', response.data.id + "_tec");
                var newColIDSFarm = $('<td/>', {text: response.data.id_smart_farm}).attr('hidden', true).attr('id', response.data.id + "_sFarm");

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
                        .append(newColTec)
                        .append(newColSFarm)
                        .append(newColIDTec)
                        .append(newColIDSFarm)
                        .append(newColData)
                        .append(newColModifica)
                        .append(newColDelete)
                        .append(newColUpdate);

                $('tbody').append(newRow);

                $('#id_tecnologia').val('');
                $('#id_smart_farm').val('');
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
            url: '/used_technology/' + id + '/destroy',
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
        // Selezione del nome della tecnologia corrente
        var tecnologia = row.find("td:eq(1)").text();
        // Selezione del nome della smart-farm corrente
        var smart_farm = row.find("td:eq(2)").text();
        // Selezione dell'id della tecnologia corrente
        var id_tecnologia = row.find("td:eq(3)").text().trim();
        // Selezione dell'id della smart-farm corrente
        var id_smart_farm = row.find("td:eq(4)").text().trim();

        // Set dei valori già esistenti
        $('#id_tecnologia').val(id_tecnologia);
        $('#id_smart_farm').val(id_smart_farm);

        // Modifica visibilità bottoni
        row.find('.btn-modifica').attr("hidden", true);
        row.find('.btn-update').attr("hidden", false);
        $('#btn-aggiungi').attr('disabled', true);
    });

    $('tbody').on('click', '.btn-update', function(event){
        event.preventDefault();

        let id = $(this).attr('data-id');
        let id_tecnologia = $('#id_tecnologia').val();
        let nome_tecnologia = $('#id_tecnologia option[value="' + id_tecnologia + '"]').text();
        let id_smart_farm = $('#id_smart_farm').val();
        let nome_smart_farm = $('#id_smart_farm option[value="' + id_smart_farm + '"]').text();
        let token = $('input[name="_token"]').val();
        
        $.ajax({
            type: "PATCH",
            url: "/used_technology/" + id,
            dataType: "json",
            data: {
                'id_tecnologia': id_tecnologia,
                'id_smart_farm': id_smart_farm,
                '_token': token,
            },
            success: function(response){
                console.log(response);

                // Modifica visibilità bottoni
                $('.btn-modifica').attr("hidden",false);
                $('.btn-update').attr("hidden",true);
                $('#btn-aggiungi').attr('disabled', false);

                // Svuotamento dei campi
                $('#id_tecnologia').val('');
                $('#id_smart_farm').val('');

                // Aggiornamento con nuovi valori
                $('tr[data-id="' + response.data.id + '"]').find('td:eq(1)').text(nome_tecnologia);
                $('tr[data-id="' + response.data.id + '"]').find('td:eq(2)').text(nome_smart_farm);
                $('tr[data-id="' + response.data.id + '"]').find('td:eq(3)').text(id_tecnologia);
                $('tr[data-id="' + response.data.id + '"]').find('td:eq(4)').text(id_smart_farm);
            },
            error: function(response, status){
                console.log('error');
            }
        });
    });

</script>
@endsection
