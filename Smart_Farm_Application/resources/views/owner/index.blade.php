@extends('layouts.app')

@section('content')
    @if ( Auth::user()->level == 0 )
        <h1>Proprietari</h1>
    @elseif ( Auth::user()->level == 1 )
        <h1>I Tuoi Dati</h1>
    @endif
    <hr/>

    @if ( Auth::user()->level == 0 )
        <a href="{{ url('owner/create') }}" class="btn btn-primary float-end">Creazione nuovo proprietario</a>
    @elseif ( Auth::user()->level == 1 )
        @if ( empty($owner) )
            <a href="{{ url('owner/create') }}" class="btn btn-primary float-end">Creazione nuovo profilo</a>
        @else
            <a href="{{ url('owner/create') }}" class="btn btn-primary float-end disabled">Creazione nuovo profilo</a>
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

                <th scope="col">Codice fiscale</th>
                <th scope="col">Nome</th>
                <th scope="col">Cognome</th>
                <th scope="col">Data di nascita</th>
                <th scope="col">Luogo di nascita</th>
                <th scope="col">Telefono</th>
                <th scope="col">Mail</th>
                <th scope="col">Via</th>
                <th scope="col">Civico</th>
                <th scope="col">Città</th>
                <th scope="col">CAP</th>
                <th scope="col">Ultima modifica</th>
                <th scope="col"></th>

                @if ( Auth::user()->level == 0 )
                    <th scope="col"></th>
                @endif

            </tr>
        </thead>
        <tbody>
            @if ( Auth::user()->level == 0 )
                @foreach ($owners as $owner)
                    <tr data-id="{{ $owner->id }}">
                        <td>{{ $owner->id }}</td>
                        <td>{{ $owner->cf }}</td>
                        <td>{{ $owner->nome }}</td>
                        <td>{{ $owner->cognome }}</td>
                        <td>{{ $owner->data_nascita->format('d/m/Y') }}</td>
                        <td>{{ $owner->luogo_nascita }}</td>
                        <td>{{ $owner->telefono }}</td>    
                        <td>{{ $owner->mail }}</td>
                        <td>{{ $owner->via }}</td>
                        <td>{{ $owner->civico }}</td>
                        <td>{{ $owner->citta }}</td>
                        <td>{{ $owner->cap }}</td>
                        <td>{{ $owner->updated_at->format('d/m/Y H:i:s') }}</td>
                        <td>
                            <a href='{{ url("owner/$owner->id/edit") }}' class="btn btn-primary btn-sm">Modifica</a>
                        </td>
                        <td>
                            <a href='{{ url("owner/$owner->id/destroy") }}' class="btn btn-danger btn-sm btn-elimina" data-id="{{ $owner->id }}">Elimina</a>
                            <!-- inserisco anche il data-id per sapere l'id della entry da elimiare -->
                        </td>
                    </tr>
                @endforeach
            @elseif ( Auth::user()->level == 1 )
                <tr data-id="{{ $owner->id }}">
                    @if ( Auth::user()->level == 0 )
                        <td>{{ $owner->id }}</td>
                    @endif 

                    <td>{{ $owner->cf }}</td>
                    <td>{{ $owner->nome }}</td>
                    <td>{{ $owner->cognome }}</td>
                    <td>{{ $owner->data_nascita->format('d/m/Y') }}</td>
                    <td>{{ $owner->luogo_nascita }}</td>
                    <td>{{ $owner->telefono }}</td>    
                    <td>{{ $owner->mail }}</td>
                    <td>{{ $owner->via }}</td>
                    <td>{{ $owner->civico }}</td>
                    <td>{{ $owner->citta }}</td>
                    <td>{{ $owner->cap }}</td>
                    <td>{{ $owner->updated_at->format('d/m/Y H:i:s') }}</td>
                    <td>
                        <a href='{{ url("owner/$owner->id/edit") }}' class="btn btn-primary btn-sm">Modifica</a>
                    </td>

                    @if ( Auth::user()->level == 0 )
                        <td>
                            <a href='{{ url("owner/$owner->id/destroy") }}' class="btn btn-danger btn-sm btn-elimina" data-id="{{ $owner->id }}">Elimina</a>
                            <!-- inserisco anche il data-id per sapere l'id della entry da elimiare -->
                        </td>
                    @endif

                </tr>
            @endif
        </tbody>
    </table>

    <script type="application/javascript">
        $('.btn-elimina').bind('click',function(event) {
            event.preventDefault();

            let id = $(this).attr('data-id');
            let token = $('input[name="_token"]').val();

            $.ajax({
                type: "GET",
                url: "/owner/"+id+"/destroy",
                dataType: "json",
                data: {
                    '_token': token
                },
                success: function (response) {
                    $('tr[data-id="'+response.data.id+'"]').remove();
                }
                ,error: function(event){
                    console.log('error');
                }
            });
        });
    </script>
@endsection
