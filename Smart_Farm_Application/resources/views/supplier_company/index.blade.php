@extends('layouts.app')

@section('content')
    <h1>Aziende fornitrici</h1>
    <hr>
    <a href="{{ url('supplier_company/create') }}" class="btn btn-primary float-end">Inserisci nuova azienda fornitrice</a>
    <div style="clear:both;"></div>
    <hr>

    <table class="table table-striped">
        <thead>
            <tr>
                <th scope="col">#</th>
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
                <th scope="col"></th>
            </tr>
        </thead>
        <tbody>
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
                        <a href='{{ url("supplier_company/$company->id/edit") }}' class="btn btn-primary btn-sm">Modifica</a>
                    </td>
                    <td>
                        <a href='{{ url("supplier_company/$company->id/destroy") }}' class="btn btn-danger btn-sm btn-elimina" data-id="{{ $company->id }}">Elimina</a>
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
                url: "/supplier_company/"+id+"/destroy",
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
