@extends('layouts.app')

@section('content')
@if ( Auth::user()->level == 0 )
    <h1>Smart-Farms</h1>
@elseif ( Auth::user()->level == 1 )
    <h1>Smart-Farm</h1>
@endif
<hr/>

@if ( Auth::user()->level == 0 )
    <a href="{{ url('/smart_farm/create') }}" class="btn btn-success float-end">Creazione nuova smart-farm</a>
@elseif ( Auth::user()->level == 1 )
    @if ( empty($smartFarm) )
        <a href="{{ url('/smart_farm/create') }}" class="btn btn-success float-end">Creazione nuova smart-farm</a>
    @else
        <a href="{{ url('/smart_farm/create') }}" class="btn btn-success float-end disabled">Creazione nuova smart-farm</a>
    @endif
@endif
<div style="clear:both;"></div>
<hr/>

<table class="table table-striped">

    <thead>
        <tr>
            @if ( Auth::user()->level == 0 )
                <th scope="col">#</th>
            @endif

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
        @if ( Auth::user()->level == 0 )
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
                    <td>{{ $smFarm->proprietario->nome ?? "No owner" }} {{ $smFarm->proprietario->cognome ?? "" }}</td>

                    <td>{{ $smFarm->updated_at->format('d/m/Y H:i:s') }}</td>
                    <td>
                        <a href='{{ url("/smart_farm/$smFarm->id/edit") }}' class="btn btn-success btn-sm">Modifica</a>
                    </td>
                    <td>
                        <a href='{{ url("/smart_farm/$smFarm->id/destroy") }}' data-id="{{ $smFarm->id }}" class="btn btn-danger btn-sm btn-elimina">Elimina</a>
                    </td>
                </tr>
            @endforeach
        @elseif ( Auth::user()->level == 1 && !empty($smartFarm) )
            <tr data-id="{{ $smartFarm->id }}">
                @if ( Auth::user()->level == 0 )
                    <td>{{ $smartFarm->id }}</td>     
                @endif 
                
                <td>{{ $smartFarm->nome }}</td>
                <td>{{ $smartFarm->dimensione }}</td>
                <td>{{ $smartFarm->telefono }}</td>
                <td>{{ $smartFarm->mail }}</td>
                <td>{{ $smartFarm->via }}</td>
                <td>{{ $smartFarm->civico }}</td>      
                <td>{{ $smartFarm->citta }}</td>
                <td>{{ $smartFarm->cap }}</td>
                <td>{{ $smartFarm->proprietario->nome ?? "No owner" }} {{ $smartFarm->proprietario->cognome ?? "" }}</td>

                <td>{{ $smartFarm->updated_at->format('d/m/Y H:i:s') }}</td>
                <td>
                    <a href='{{ url("/smart_farm/$smartFarm->id/edit") }}' class="btn btn-success btn-sm">Modifica</a>
                </td>
                <td>
                    <a href='{{ url("/smart_farm/$smartFarm->id/destroy") }}' data-id="{{ $smartFarm->id }}" class="btn btn-danger btn-sm btn-elimina">Elimina</a>
                </td>
            </tr>
        @endif
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
                //$('tr[data-id="' + response.data.id + '"]').remove();
                document.location.reload();
            },
            error: function(response, status){
                console.log('error');
            }
        });
    });

</script>
@endsection
