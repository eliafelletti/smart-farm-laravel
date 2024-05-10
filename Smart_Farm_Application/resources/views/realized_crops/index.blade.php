@extends('layouts.app')

@section('content')
    <h1>Raccolti Realizzati</h1>
    <hr>
    <a href="{{ url('realized_crop/create') }}" class="btn btn-primary float-end">Creazione nuovo evento</a>
    <div style="clear:both;"></div>
    <hr>

    <table class="table table-striped">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Proprietario</th>
                <th scope="col">Serra</th>
                <th scope="col">Coltura</th>
                <th scope="col">Data di semina</th>
                <th scope="col">Data di raccolta teorica</th>
                <th scope="col">Data di raccolta effettiva</th>
                <th scope="col"></th>
                <th scope="col"></th>
            </tr>
        </thead>
        <tbody>
            @foreach ($realized_crops as $crop)
                <tr data-id="{{ $crop->id }}">
                    <td>{{ $crop->id }}</td>
                    <td>{{ $crop->owner->nome ?? 'No Owner' }} {{ $crop->owner->cognome ?? '' }}</td>
                    <td>{{ $crop->green_house->smart_farm->nome ?? 'No Serra' }} [{{ $crop->green_house->id ?? '' }}]</td>
                    <td>{{ $crop->cultivation->tipologia ?? 'No Coltura' }}</td>   
                    <td>{{ $crop->data_semina->format('d/m/Y') }}</td>   
                    <td>{{ $crop->data_raccolta_teorica->format('d/m/Y') }}</td>
                    @if ($crop->data_raccolta_effettiva == '')
                        <td></td>
                    @else
                        <td>{{ $crop->data_raccolta_effettiva->format('d/m/Y') }}</td>
                    @endif
                    <td>
                        <a href='{{ url("realized_crop/$crop->id/edit") }}' class="btn btn-primary btn-sm">Modifica</a>
                    </td>
                    <td>
                        <a href='{{ url("realized_crop/$crop->id/destroy") }}' class="btn btn-danger btn-sm btn-elimina" data-id="{{ $crop->id }}">Elimina</a>
                        <!-- inserisco anche il data-id per sapere l'id della entry da elimiare -->
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <script type="application/javascript">
        $('.btn-elimina').bind('click',function(event) {
            event.preventDefault();

            let id = $(this).attr('data-id');
            let token = $('input[name="_token"]').val();

            $.ajax({
                type: "GET",
                url: "/realized_crop/" + id + "/destroy",
                dataType: "json",
                data: {
                    '_token': token
                },
                success: function (response) {
                    $('tr[data-id="'+response.data.id+'"]').remove();
                },
                error: function(event){
                    console.log('error');
                }
            });
        });
    </script>
@endsection
