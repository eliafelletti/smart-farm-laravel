@extends('layouts.app')

@section('content')
<h1>Misure Realizzate</h1>
<hr/>

@if ( Auth::user()->level == 0 )
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
            <form action="{{ route('realized_measure.store') }}" method="POST">
                {{ csrf_field() }}
                
                <fieldset>
                    
                    <legend>Informazioni misure realizzate</legend>
                    
                    <label for="id_tecnologia" class="form-label mt-3">Tecnologia di riferimento</label>
                    <select id="id_tecnologia" name="id_tecnologia" class="form-control">
                        @if ( Auth::user()->level == 0 )
                            @foreach($technologies as $tech)
                                <option value="{{ $tech->id }}">{{ $tech->nome }}</option>
                            @endforeach
                        @elseif ( Auth::user()->level == 1 )
                            @foreach($usedTechnologies as $tech)
                                <option value="{{ $tech->id_tecnologia }}">{{ $tech->tecnologia->nome }}</option>
                            @endforeach
                        @endif
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
@endif

<table class="table table-striped">

    <thead>
        <tr>
            @if ( Auth::user()->level == 0 )
                <th scope="col">#</th>
            @endif

            <th scope="col">Tecnologia</th>
            <th scope="col">Misura</th>

            @if ( Auth::user()->level == 0 )
                <th scope="col">Ultima modifica</th>

                <th scope="col"></th>
                <th scope="col"></th>
                <th scope="col"></th>
            @endif
        </tr>
    </thead>

    @if ( Auth::user()->level == 0 )
        <tbody>
            @foreach($realizedMeasures as $rMeasure)
                <tr data-id='{{ $rMeasure->id }}'>
                    <td>{{ $rMeasure->id }}</td>
                    <td>{{ $rMeasure->tecnologia->nome ?? 'No Tecnologia' }}</td>
                    <td>{{ $rMeasure->misura->id }} [{{ $rMeasure->misura->serra->smart_farm->nome ?? 'No Serra' }} ({{ $rMeasure->misura->id_serra ?? '' }})]</td>

                    <!-- Colonna nascosta contenente id della tecnologia -->
                    <td id="{{ $rMeasure->id }}_tec" hidden="true">{{ $rMeasure->id_tecnologia ?? 'No ID' }}</td>
                    <!-- Colonna nascosta contenente id della misura -->
                    <td id="{{ $rMeasure->id }}_mis" hidden="true">{{ $rMeasure->id_misura }}</td>
                    
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
    @else
        <tbody>
            @foreach($realizedMeasures as $measureId => $measureData)
                <tr data-id='{{ $measureId }}'>
                    <td>
                        @foreach($measureData['technologies'] as $tech)
                            {{ $tech ?? 'No Tecnologia' }}<br/>
                        @endforeach
                    </td>
                    <td>{{ $measureData['misura'] ?? 'No Serra' }}</td>
                </tr>
            @endforeach
        </tbody>
    @endif

</table>
<br/>

<script type="application/javascript">

    $('#btn-aggiungi').bind('click', function(event){
        event.preventDefault();

        let id_tecnologia = $('#id_tecnologia').val();
        let nome_tecnologia = $('#id_tecnologia option[value="' + id_tecnologia + '"]').text();
        let id_misura = $('#id_misura').val();
        let nome_misura = $('#id_misura option[value="' + id_misura + '"]').text();
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
                var newColTec = $('<td/>', {text: nome_tecnologia});
                var newColMisura = $('<td/>', {text: nome_misura});
                var newColIDTec = $('<td/>', {text: response.data.id_tecnologia}).attr('hidden', true).attr('id', response.data.id + "_tec");
                var newColIDMis = $('<td/>', {text: response.data.id_misura}).attr('hidden', true).attr('id', response.data.id + "_mis");
                
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
                    .append(newColIDTec)
                    .append(newColIDMis)
                    .append(newColData)
                    .append(newColModifica)
                    .append(newColDelete)
                    .append(newColUpdate);

                $('tbody').append(newRow);

                $('#id_tecnologia').val('');
                $('#id_misura').val('');
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
            url: '/realized_measure/' + id + '/destroy',
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
        // Selezione del nome della tecnologia corrente
        var tecnologia = row.find("td:eq(1)").text();
        // Selezione del nome della misura corrente
        var misura = row.find("td:eq(2)").text();
        // Selezione dell'id della tecnologia corrente
        var id_tecnologia = row.find("td:eq(3)").text().trim();
        // Selezione dell'id della misura corrente
        var id_misura = row.find("td:eq(4)").text().trim();

        // Set dei valori già esistenti
        $('#id_tecnologia').val(id_tecnologia);
        $('#id_misura').val(id_misura);

        // Modifica visibilità bottoni
        row.find('.btn-modifica').attr("hidden", true);
        row.find('.btn-update').attr("hidden", false);
        $('#btn-aggiungi').attr('disabled', true);

        $('.alert-danger').attr("hidden", true);

        // Scroll to top
        window.scrollTo({ top: 0, behavior: 'smooth' });
    });

    $('tbody').on('click', '.btn-update', function(event){
        event.preventDefault();

        let id = $(this).attr('data-id');
        let id_tecnologia = $('#id_tecnologia').val();
        let nome_tecnologia = $('#id_tecnologia option[value="' + id_tecnologia + '"]').text();
        let id_misura = $('#id_misura').val();
        let nome_misura = $('#id_misura option[value="' + id_misura + '"]').text();
        let token = $('input[name="_token"]').val();
        
        $.ajax({
            type: "POST",
            url: "/realized_measure/" + id,
            dataType: "json",
            data: {
                'id_tecnologia': id_tecnologia,
                'id_misura': id_misura,
                '_token': token,
                '_method': 'PATCH',
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
                $('.alert-danger').attr("hidden", true);

                // Aggiornamento con nuovi valori
                $('tr[data-id="' + response.data.id + '"]').find('td:eq(1)').text(nome_tecnologia);
                $('tr[data-id="' + response.data.id + '"]').find('td:eq(2)').text(nome_misura);
                $('tr[data-id="' + response.data.id + '"]').find('td:eq(3)').text(id_tecnologia);
                $('tr[data-id="' + response.data.id + '"]').find('td:eq(4)').text(id_misura);
                
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
