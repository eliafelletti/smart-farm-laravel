@extends('layouts.app')

@section('content')
@if ( Auth::user()->level == 0 )
    <h1>Richieste Utenti</h1>
@else
    <h1>Richieste Inviate</h1>
@endif
<hr/>

<table class="table table-striped">
    {{ csrf_field() }}

    <thead>
        <tr>
            @if ( Auth::user()->level == 0 )
                <th scope="col">#</th>
            @endif

            <th scope="col">Tipologia mittente</th>
            <th scope="col">Descrizione</th>
            <th scope="col">Data</th>

            @if ( Auth::user()->level == 0 )
                <th scope="col">Proprietario</th>
                <th scope="col">Azienda Fornitrice</th>
            @endif

            @if ( Auth::user()->level == 1 || Auth::user()->level == 2 )
                <th scope="col">Stato</th>
            @endif

            <th scope="col">Ultima modifica</th>

            @if ( Auth::user()->level == 0 )
                <th scope="col"></th>
                <th scope="col"></th>
            @endif
        </tr>
    </thead>

    @if ( Auth::user()->level == 0 )
        <tbody>
            @foreach ($userRequests as $uReq)
                <tr data-id="{{ $uReq->id }}">
                    <td>{{ $uReq->id }}</td>
                    <td>{{ $uReq->tipologia_mittente === '1' ? 'Owner' : 'Supplier Company' }}</td>
                    <td class="show-textarea">{{ $uReq->descrizione }}</td>
                    <td>{{ $uReq->data->format('d/m/Y') }}</td>
                    <td>{{ $uReq->proprietario->nome ?? "" }} {{ $uReq->proprietario->cognome ?? "" }}</td>
                    <td>{{ $uReq->azienda_fornitrice->nome ?? "" }}</td>

                    <td>{{ $uReq->updated_at->format('d/m/Y H:i:s') }}</td>
                    <td>
                        @if ( $uReq->completata == false )
                            <a href="" role="button" data-id="{{ $uReq->id }}" class="btn btn-warning btn-sm btn-flag">
                                Completa
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-check2-square" viewBox="0 0 16 16">
                                    <path d="M3 14.5A1.5 1.5 0 0 1 1.5 13V3A1.5 1.5 0 0 1 3 1.5h8a.5.5 0 0 1 0 1H3a.5.5 0 0 0-.5.5v10a.5.5 0 0 0 .5.5h10a.5.5 0 0 0 .5-.5V8a.5.5 0 0 1 1 0v5a1.5 1.5 0 0 1-1.5 1.5z"/>
                                    <path d="m8.354 10.354 7-7a.5.5 0 0 0-.708-.708L8 9.293 5.354 6.646a.5.5 0 1 0-.708.708l3 3a.5.5 0 0 0 .708 0"/>
                                </svg>
                            </a>
                        @else
                            <a href="" role="button" data-id="{{ $uReq->id }}" class="btn btn-success btn-sm btn-flag disabled" aria-disabled="true">
                                Completata
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-patch-check" viewBox="0 0 16 16">
                                    <path fill-rule="evenodd" d="M10.354 6.146a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708 0l-1.5-1.5a.5.5 0 1 1 .708-.708L7 8.793l2.646-2.647a.5.5 0 0 1 .708 0"/>
                                    <path d="m10.273 2.513-.921-.944.715-.698.622.637.89-.011a2.89 2.89 0 0 1 2.924 2.924l-.01.89.636.622a2.89 2.89 0 0 1 0 4.134l-.637.622.011.89a2.89 2.89 0 0 1-2.924 2.924l-.89-.01-.622.636a2.89 2.89 0 0 1-4.134 0l-.622-.637-.89.011a2.89 2.89 0 0 1-2.924-2.924l.01-.89-.636-.622a2.89 2.89 0 0 1 0-4.134l.637-.622-.011-.89a2.89 2.89 0 0 1 2.924-2.924l.89.01.622-.636a2.89 2.89 0 0 1 4.134 0l-.715.698a1.89 1.89 0 0 0-2.704 0l-.92.944-1.32-.016a1.89 1.89 0 0 0-1.911 1.912l.016 1.318-.944.921a1.89 1.89 0 0 0 0 2.704l.944.92-.016 1.32a1.89 1.89 0 0 0 1.912 1.911l1.318-.016.921.944a1.89 1.89 0 0 0 2.704 0l.92-.944 1.32.016a1.89 1.89 0 0 0 1.911-1.912l-.016-1.318.944-.921a1.89 1.89 0 0 0 0-2.704l-.944-.92.016-1.32a1.89 1.89 0 0 0-1.912-1.911z"/>
                                </svg>
                            </a>
                        @endif
                    </td>
                    <td>
                        <a href='{{ url("/user_request/$uReq->id/destroy") }}' data-id="{{ $uReq->id }}" class="btn btn-danger btn-sm btn-elimina">Elimina</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    @elseif ( Auth::user()->level == 1 || Auth::user()->level == 2 )
        <tbody>
            @foreach ($userRequests as $uReq)
                <tr data-id="{{ $uReq->id }}">
                    <td>{{ $uReq->tipologia_mittente === '1' ? 'Owner' : 'Supplier Company' }}</td>
                    <td class="show-textarea">{{ $uReq->descrizione }}</td>
                    <td>{{ $uReq->data->format('d/m/Y') }}</td>
                    <td><span class="badge {{ $uReq->completata === 1 ? 'text-bg-success' : 'text-bg-warning' }}">{{ $uReq->completata === 1 ? 'Completata' : 'Elaborazione...' }}</span></td>

                    <td>{{ $uReq->updated_at->format('d/m/Y H:i:s') }}</td>
                </tr>
            @endforeach
        </tbody>
    @endif

</table>

<script type="application/javascript">

$('.btn-elimina').bind('click', function(event){
    event.preventDefault();

    let id = $(this).attr('data-id');
    let token = $('input[name="_token"]').val();

    $.ajax({
        url: '/user_request/' + id + '/destroy',
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

$('.btn-flag').bind('click', function(event){
    event.preventDefault();

    let id = $(this).attr('data-id');
    let token = $('input[name="_token"]').val();
    
    $.ajax({
        type: "POST",
        url: "/user_request/" + id,
        dataType: "json",
        data: {
            '_token': token,
            '_method': 'PATCH',
        },
        success: function(response){
            console.log(response);

            // Modifica bottone flag
            var newSvg = `
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-patch-check" viewBox="0 0 16 16">
                    <path fill-rule="evenodd" d="M10.354 6.146a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708 0l-1.5-1.5a.5.5 0 1 1 .708-.708L7 8.793l2.646-2.647a.5.5 0 0 1 .708 0"/>
                    <path d="m10.273 2.513-.921-.944.715-.698.622.637.89-.011a2.89 2.89 0 0 1 2.924 2.924l-.01.89.636.622a2.89 2.89 0 0 1 0 4.134l-.637.622.011.89a2.89 2.89 0 0 1-2.924 2.924l-.89-.01-.622.636a2.89 2.89 0 0 1-4.134 0l-.622-.637-.89.011a2.89 2.89 0 0 1-2.924-2.924l.01-.89-.636-.622a2.89 2.89 0 0 1 0-4.134l.637-.622-.011-.89a2.89 2.89 0 0 1 2.924-2.924l.89.01.622-.636a2.89 2.89 0 0 1 4.134 0l-.715.698a1.89 1.89 0 0 0-2.704 0l-.92.944-1.32-.016a1.89 1.89 0 0 0-1.911 1.912l.016 1.318-.944.921a1.89 1.89 0 0 0 0 2.704l.944.92-.016 1.32a1.89 1.89 0 0 0 1.912 1.911l1.318-.016.921.944a1.89 1.89 0 0 0 2.704 0l.92-.944 1.32.016a1.89 1.89 0 0 0 1.911-1.912l-.016-1.318.944-.921a1.89 1.89 0 0 0 0-2.704l-.944-.92.016-1.32a1.89 1.89 0 0 0-1.912-1.911z"/>
                </svg>
            `;

            $('.btn-flag[data-id="' + response.data.id + '"]').text('Completata').append(newSvg);
            $('.btn-flag[data-id="' + response.data.id + '"]').removeClass("btn-warning").addClass("btn-success").addClass("disabled").attr("aria-disabled", true);
        },
        error: function(response, status){
            console.log('error');
        }
    });
});

</script>
@endsection
