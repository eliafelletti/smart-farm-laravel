@extends('layouts.app')

@section('content')
<h1>Misure</h1>
<hr/>

<table class="table table-striped">

    <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Timestamp</th>
            <th scope="col">Temperatura [°C]</th>
            <th scope="col">Umidità [%]</th>
            <th scope="col">CO2 [ppm]</th>
            <th scope="col">Irrigazione [ml]</th>
            <th scope="col">Luminosità [lx]</th>
            <th scope="col">Smart-Farm [Serra]</th>
        </tr>
    </thead>

    <tbody>
        @foreach ($measures as $measure)
            <tr>
                <td>{{ $measure->id }}</td>
                <td>{{ $measure->timestamp->format('d/m/Y H:i:s') }}</td>    
                <td>{{ $measure->temperatura }}</td>
                <td>{{ $measure->umidita }}</td>
                <td>{{ $measure->co2 }}</td>
                <td>{{ $measure->irrigazione }}</td>
                <td>{{ $measure->luminosita }}</td>
                <td>{{ $measure->serra->smart_farm->nome }} [{{ $measure->id_serra }}]</td>
            </tr>
        @endforeach
    </tbody>

</table>
@endsection
