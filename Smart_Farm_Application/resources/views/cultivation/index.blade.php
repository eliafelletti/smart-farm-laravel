@extends('layouts.app')

@section('content')
<h1>Colture</h1>
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
            <form action="{{ route('cultivation.store') }}" method="POST">
                {{ csrf_field() }}
                
                <fieldset>
                    
                    <legend>Informazioni coltura</legend>
                    
                    <label for="tipologia" class="form-label mt-3">Tipologia</label>
                    <input type="text" id="tipologia" name="tipologia" class="form-control" value="{{ old('tipologia') }}">
                    <div class="form-text">Inserisci la tipologia della coltura</div>

                    <hr />
                    <input type="submit" id="btn-aggiungi" class="btn btn-success mb-3" value="Aggiungi" />	

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

            <th scope="col">Tipologia</th>
            <th scope="col">Ultima modifica</th>

            @if ( Auth::user()->level == 0 )
                <th scope="col"></th>
                <th scope="col"></th>
                <th scope="col"></th>
            @endif
        </tr>
    </thead>

    <tbody>
        @foreach ($cultivations as $cltvs)
            <tr data-id='{{ $cltvs->id }}'>
                @if ( Auth::user()->level == 0 )
                    <td>{{ $cltvs->id }}</td>      
                @endif

                <td>{{ $cltvs->tipologia }}</td>
                
                <td>{{ $cltvs->updated_at->format('d/m/Y H:i:s') }}</td>

                @if ( Auth::user()->level == 0 )    
                    <td>
                        <a class="btn btn-success btn-sm btn-modifica" data-id="{{ $cltvs->id }}">Modifica</a>
                    </td>
                    <td>
                        <a href='{{ url("/cultivation/$cltvs->id/destroy") }}' data-id="{{ $cltvs->id }}" class="btn btn-danger btn-sm btn-elimina">Elimina</a>
                    </td>
                    <td>
                        <a class="btn btn-success btn-sm btn-update" data-id="{{ $cltvs->id }}" hidden="true">Applica modifiche</a>
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

        let tipologia = $('#tipologia').val();
        let token = $('input[name="_token"]').val();

        $.ajax({
            url: '/cultivation',
            type: 'POST',
            dataType: 'json',
            data: {
                'tipologia': tipologia,
                '_token': token
            },
            success: function(response){
                console.log(response);

                var newColId = $('<td/>', {text: response.data.id});
                var newColTipologia = $('<td/>', {text: response.data.tipologia});

                var date = new Date(response.data.updated_at);
                var time = new Date();
                var date_display = `${String(date.getDate()).padStart(2, '0')}/${String(date.getMonth() + 1).padStart(2, '0')}/${date.getFullYear()} ${String(time.getHours()).padStart(2, '0')}:${String(time.getMinutes()).padStart(2, '0')}:${String(time.getSeconds()).padStart(2, '0')}`;

                var newColData = $('<td/>', {text: date_display});

                var actionDelete = $('<button/>', {role: 'button', text: 'Elimina'})
                            .addClass('btn btn-danger btn-sm btn-elimina')
                            .attr('data-id', response.data.id);

                /* CREAZIONE BOTTONE MODIFICA */
                var actionModifica = $('<button/>', { role: 'button', text: 'Modifica' })
                            .addClass('btn btn-success btn-sm btn-modifica')
                            .attr('data-id', response.data.id);
                
                /* CREAZIONE BOTTONE UPDATE */
                var actionUpdate = $('<button/>', { role: 'button', text: 'Applica modifiche' })
                        .addClass('btn btn-success btn-sm btn-update')
                        .attr('data-id', response.data.id)
                        .attr('hidden', true);

                var newColDelete = $('<td/>', {text: ''}).append(actionDelete);
                var newColModifica = $('<td/>', {text: ''}).append(actionModifica);
                var newColUpdate = $('<td/>', {text: ''}).append(actionUpdate);

                var newRow = $('<tr/>').attr('data-id', response.data.id);
                newRow.append(newColId)
                        .append(newColTipologia)
                        .append(newColData)
                        .append(newColModifica)
                        .append(newColDelete)
                        .append(newColUpdate);

                $('tbody').append(newRow);

                $('#tipologia').val('');
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
            url: '/cultivation/' + id + '/destroy',
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
        // Selezione della tipologia corrente
        var tipologia = row.find("td:eq(1)").text();

        // Set dei valori già esistenti
        $('#tipologia').val(tipologia);

        // Modifica visibilità bottoni
        row.find('.btn-modifica').attr("hidden", true);
        row.find('.btn-update').attr("hidden", false);
        $('#btn-aggiungi').attr('disabled', true);

        $('.alert-danger').attr("hidden", true);
    });

    $('tbody').on('click', '.btn-update', function(event){
        event.preventDefault();

        let id = $(this).attr('data-id');
        let tipologia = $('#tipologia').val();
        let token = $('input[name="_token"]').val();
        
        $.ajax({
            type: "POST",
            url: "/cultivation/" + id,
            dataType: "json",
            data: {
                'tipologia': tipologia,
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
                $('#tipologia').val('');
                $('.alert-danger').attr("hidden", true);

                // Aggiornamento con nuovi valori
                $('tr[data-id="' + response.data.id + '"]').find('td:eq(1)').text(tipologia);
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
