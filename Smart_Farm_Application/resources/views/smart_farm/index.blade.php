@extends('layouts.app')

@section('content')
<h1>Smart-Farms</h1>
<hr/>

<a href="{{ url('/smart_farm/create') }}" class="btn btn-primary float-end">Creazione nuova smart-farm</a>
<div style="clear:both;"></div>
<hr/>

<table class="table table-striped">

    <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Nome</th>
            <th scope="col">Dimensione [m2]</th>
            <th scope="col">Telefono</th>
            <th scope="col">Mail</th>
            <th scope="col">Via</th>
            <th scope="col">Civico</th>
            <th scope="col">Citta</th>
            <th scope="col">CAP</th>
            <th scope="col">Proprietario</th>
            <th scope="col">Ultima modifica</th>
            <th scope="col"></th>
            <th scope="col"></th>
        </tr>
    </thead>

    <tbody>
        @foreach ($smartFarms as $smFarm)
            <tr data-id="{{ $smFarm->id }}">
                <td>{{ $smFarm->id }}</td>      
                <td>{{ $smFarm->nome }}</td>
                <td>{{ $smFarm->dimensione }}</td>
                <td>{{ $smFarm->telefono }}</td>
                <td>{{ $smFarm->mail }}</td>
                <td>{{ $smFarm->via }}</td>
                <td>{{ $smFarm->civico }}</td>      
                <td>{{ $smFarm->citta }}</td>
                <td>{{ $smFarm->cap }}</td>
                <td>{{ $smFarm->proprietario->nome }} {{ $smFarm->proprietario->cognome }}</td>

                <td>{{ $smFarm->updated_at->format('d/m/Y H:i:s') }}</td>
                <td>
                    <a href='{{ url("/smart_farm/$smFarm->id/edit") }}' class="btn btn-primary btn-sm">Modifica</a>
                </td>
                <td>
                    <a href='{{ url("/smart_farm/$smFarm->id/destroy") }}' data-id="{{ $smFarm->id }}" class="btn btn-danger btn-sm btn-elimina">Elimina</a>
                </td>
            </tr>
        @endforeach
    </tbody>

</table>

<script type="application/javascript">

$('.btn-elimina').bind('click', function(event){
        event.preventDefault();

        let id = $(this).attr('data-id');
        let token = $('input[name="_token"]').val();

        $.ajax({
            url: '/smart_farm/' + id + '/destroy',
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

</script>
@endsection
