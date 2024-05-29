@extends('layouts.app')

@section('content')
    @if ( Auth::user()->level == 0 )
        <h1>Aziende fornitrici</h1>
    @elseif ( Auth::user()->level == 2 )
        <h1>I Tuoi Dati</h1>
    @endif
    <hr>

    @if ( Auth::user()->level == 0 )
        <a href="{{ url('supplier_company/create') }}" class="btn btn-success float-end">Creazione nuova azienda fornitrice</a>
    @elseif ( Auth::user()->level == 2 )
        @if( empty($supplier_company) )
            <a href="{{ url('supplier_company/create') }}" class="btn btn-success float-end">Creazione nuovo profilo</a>
        @else
            <a href="{{ url('supplier_company/create') }}" class="btn btn-success float-end disabled">Creazione nuovo profilo</a>
        @endif
    @endif
    <div style="clear:both;"></div>
    <hr>

    <table class="table table-striped">
        <thead>
            <tr>
                @if ( Auth::user()->level == 0 )
                    <th scope="col">#</th>
                @endif

                <th scope="col">Nome</th>
                <th scope="col">Email</th>
                <th scope="col">Telefono</th>
                <th scope="col">Fax</th>
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
            @foreach ($supplier_companies as $company)
                <tr data-id="{{ $company->id }}">
                    <td>{{ $company->id }}</td>
                    <td>{{ $company->nome }}</td>
                    <td>{{ $company->mail }}</td>
                    <td>{{ $company->telefono }}</td>   
                    <td>{{ $company->fax }}</td>   
                    <td>{{ $company->via }}</td>
                    <td>{{ $company->civico }}</td>
                    <td>{{ $company->citta }}</td>
                    <td>{{ $company->cap }}</td>
                    <td>{{ $company->updated_at->format('d/m/Y H:i:s') }}</td>
                    <td>
                        <a href='{{ url("supplier_company/$company->id/edit") }}' class="btn btn-success btn-sm">Modifica</a>
                    </td>
                    <td>
                        <a href='{{ url("supplier_company/$company->id/destroy") }}' class="btn btn-danger btn-sm btn-elimina" data-id="{{ $company->id }}">Elimina</a>
                        <!-- inserisco anche il data-id per sapere l'id della entry da elimiare -->
                    </td>
                </tr>
            @endforeach
            @elseif( Auth::user()->level == 2 && !empty($supplier_company) )
                <tr data-id="{{ $supplier_company->id }}">
                    @if ( Auth::user()->level == 0 )
                        <td>{{ $supplier_company->id }}</td>
                    @endif

                    <td>{{ $supplier_company->nome }}</td>
                    <td>{{ $supplier_company->mail }}</td>
                    <td>{{ $supplier_company->telefono }}</td>   
                    <td>{{ $supplier_company->fax }}</td>   
                    <td>{{ $supplier_company->via }}</td>
                    <td>{{ $supplier_company->civico }}</td>
                    <td>{{ $supplier_company->citta }}</td>
                    <td>{{ $supplier_company->cap }}</td>
                    <td>{{ $supplier_company->updated_at->format('d/m/Y H:i:s') }}</td>
                    <td>
                        <a href='{{ url("supplier_company/$supplier_company->id/edit") }}' class="btn btn-success btn-sm">Modifica</a>
                    </td>

                    @if ( Auth::user()->level == 0 )
                    <td>
                        <a href='{{ url("supplier_company/$supplier_company->id/destroy") }}' class="btn btn-danger btn-sm btn-elimina" data-id="{{ $company->id }}">Elimina</a>
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
                url: "/supplier_company/"+id+"/destroy",
                dataType: "json",
                data: {
                    '_token': token
                },
                success: function (response) {
                    $('tr[data-id="'+response.data[0].id+'"]').remove();
                },
                error: function(event){
                    console.log('error');
                }
            });
        });
    </script>
@endsection
