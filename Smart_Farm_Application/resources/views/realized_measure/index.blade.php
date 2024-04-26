@extends('layouts.app')

@section('content')
<h1>Misure Realizzate</h1>
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
        <form action="{{ route('realized_measure.store') }}" method="POST">
            {{ csrf_field() }}
            
            <fieldset>
                
                <legend>Informazioni misure realizzate</legend>
                
                <label for="id_tecnologia" class="form-label mt-3">Tecnologia di riferimento</label>
                <select id="id_tecnologia" name="id_tecnologia" class="form-control">
                    @foreach($technologies as $tech)
                        <option value="{{ $tech->id }}">{{ $tech->nome }}</option>
                    @endforeach
                </select>
                <div class="form-text">Inserisci la tecnologia con cui è stata effettuata la misura</div>

                <label for="id_misura" class="form-label mt-3">Misura di riferimento</label>
                <select id="id_misura" name="id_misura" class="form-control">
                    @foreach($measures as $measure)
                        <option value="{{ $measure->id }}">{{ $measure->id }} [{{ $measure->serra->smart_farm->nome }} ({{ $measure->id_serra }})]</option>
                    @endforeach
                </select>
                <div class="form-text">Inserisci la misura di cui si vuole registare la tecnologia utilizzata</div>

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
            <th scope="col">Tecnologia</th>
            <th scope="col">Misura</th>
            <th scope="col">Ultima modifica</th>
            <th scope="col"></th>
            <th scope="col"></th>
            <th scope="col"></th>
        </tr>
    </thead>

    <tbody>
        @foreach($realizedMeasures as $rMeasure)
            <tr data-id='{{ $rMeasure->id }}'>
                <td>{{ $rMeasure->id }}</td>
                <td>{{ $rMeasure->id_tecnologia }}</td>
                <td>{{ $rMeasure->id_misura }}</td>

                <!-- Colonna nascosta contenente id della smart-farm -->
                <!-- <td id="{{ $rMeasure->id }}" hidden="true">{{ $rMeasure->id }}</td> -->
                <!--                                               $rMeasure->relation->id -->
                
                <td>{{ $rMeasure->updated_at->format('d/m/Y H:i:s') }}</td>
                <td>
                    <a class="btn btn-primary btn-sm btn-modifica" data-id="{{ $rMeasure->id }}">Modifica</a>
                </td>
                <td>
                    <a href='{{ url("/realized_measure/$rMeasure->id/destroy") }}' data-id="{{ $rMeasure->id }}" class="btn btn-danger btn-sm btn-elimina">Elimina</a>
                </td>
                <td>
                    <a class="btn btn-primary btn-sm btn-update" data-id="{{ $rMeasure->id }}" hidden="true">Applica modifiche</a>
                </td>
            </tr>
        @endforeach
    </tbody>

</table>
<br/>

<script type="application/javascript">

    $('#btn-aggiungi').bind('click', function(event){
        event.preventDefault();

        let id_tecnologia = $('#id_tecnologia').val();
        let id_misura = $('#id_misura').val();
        //let nome_smart_farm = $('#id_smart_farm option[value="' + id_smart_farm + '"]').text();
        let token = $('input[name="_token"]').val();

        $.ajax({
            url: '/realized_measure',
            type: 'POST',
            dataType: 'json',
            data: {
                'id_tecnologia': id_tecnologia,
                'id_misura': id_misura,
                '_token': token
            },
            success: function(response){
                console.log(response);

                var newColId = $('<td/>', {text: response.data.id});
                var newColTec = $('<td/>', {text: response.data.id_tecnologia});
                var newColMisura = $('<td/>', {text: response.data.id_misura});
                //var newColIDSmartFarm = $('<td/>', {text: response.data.id_smart_farm}).attr('hidden', true).attr('id', response.data.id);

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
                        .append(newColMisura)
                        .append(newColData)
                        .append(newColModifica)
                        .append(newColDelete)
                        .append(newColUpdate);

                $('tbody').append(newRow);

                $('#id_tecnologia').val('');
                $('#id_misura').val('');
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
            url: '/realized_measure/' + id + '/destroy',
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
        var id_tecnologia = row.find("td:eq(1)").text();
        // Selezione del nome della smart farm corrente
        var id_misura = row.find("td:eq(2)").text();
        // Selezione dell'id della smart farm corrente
        //var id_smart_farm = row.find("td:eq(3)").text().trim();

        // Set dei valori già esistenti
        $('#id_tecnologia').val(id_tecnologia);
        $('#id_misura').val(id_misura);

        // Modifica visibilità bottoni
        row.find('.btn-modifica').attr("hidden", true);
        row.find('.btn-update').attr("hidden", false);
        $('#btn-aggiungi').attr('disabled', true);
    });

    $('tbody').on('click', '.btn-update', function(event){
        event.preventDefault();

        let id = $(this).attr('data-id');
        let id_tecnologia = $('#id_tecnologia').val();
        let id_misura = $('#id_misura').val();
        //let nome_smart_farm = $('#id_smart_farm option[value="' + id_smart_farm + '"]').text();
        let token = $('input[name="_token"]').val();
        
        $.ajax({
            type: "PATCH",
            url: "/realized_measure/" + id,
            dataType: "json",
            data: {
                'id_tecnologia': id_tecnologia,
                'id_misura': id_misura,
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
                $('#id_misura').val('');

                // Aggiornamento con nuovi valori
                $('tr[data-id="' + response.data.id + '"]').find('td:eq(1)').text(id_tecnologia);
                $('tr[data-id="' + response.data.id + '"]').find('td:eq(2)').text(id_misura);
            },
            error: function(response, status){
                console.log('error');
            }
        });
    });

</script>
@endsection
