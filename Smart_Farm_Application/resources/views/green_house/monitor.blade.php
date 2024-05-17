@extends('layouts.app')

@section('content')
<h1>Monitoring della serra: {{ $greenHouse->id }}</h1>
<hr/>

@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<div class="row">
    <div style="width: 80%; margin: auto;">
        <canvas id="lineChart_temperatura"></canvas><br/>
    </div>
    <div style="width: 80%; margin: auto;">
        <canvas id="lineChart_umidita"></canvas><br/>
    </div>
    <div style="width: 80%; margin: auto;">
        <canvas id="lineChart_luminosita"></canvas><br/>
    </div>
    <div style="width: 80%; margin: auto;">
        <canvas id="lineChart_co2"></canvas><br/>
    </div>
</div><br/>

<script>
    // Funzione che trasforma il timestamp da formato ISO 8601 a dd/mm/yyyy hh:mm:ss
    function formatTimestamp(timestamp) {
        const date = new Date(timestamp);
        const day = String(date.getDate()).padStart(2, '0');
        const month = String(date.getMonth() + 1).padStart(2, '0'); // Mesi da 0 a 11
        const year = date.getFullYear();
        const hours = String(date.getHours()).padStart(2, '0');
        const minutes = String(date.getMinutes()).padStart(2, '0');
        const seconds = String(date.getSeconds()).padStart(2, '0');
        return `${day}/${month}/${year} ${hours}:${minutes}:${seconds}`;
    }

    // Estrazione dei valori in semplici array
    var labels = @json($data_temperatura).labels.map(function(label) {
        return formatTimestamp(label.timestamp);
    });

    var temperature = @json($data_temperatura).data.map(function(d) {
        return d.temperatura;
    });

    var umidita = @json($data_umidita).data.map(function(d) {
        return d.umidita;
    });

    var luminosita = @json($data_luminosita).data.map(function(d) {
        return d.luminosita;
    });

    var co2 = @json($data_co2).data.map(function(d) {
        return d.co2;
    });

    // Creazione grafici
    var ctx_temperatura = document.getElementById('lineChart_temperatura').getContext('2d');
    var Chart_temperatura = new Chart(ctx_temperatura, {
        type: 'line',
        data: {
            labels: labels,
            datasets: [{
                label: 'Temperatura',
                data: temperature,
                borderColor: 'rgba(75, 192, 192, 1)',
                backgroundColor: 'rgba(75, 192, 192, 1)',
                borderWidth: 10,
                fill: true
            }]
        },
        options: {
            plugins: {
                legend: {
                    display: true,
                    labels: {
                        color: 'white'
                    }
                }
            },
            scales: {
                y: {
                    title: {
                        display: true,
                        text: 'Gradi celsius [°C]',
                        color: 'white'
                    },
                    ticks: { 
                        color: 'white',
                        beginAtZero: true 
                    },
                    grid: {
                        color: 'white'
                    }
                },
                x: {
                    title: {
                        display: true,
                        text: 'Tempo',
                        color: 'white'
                    },
                    ticks: { 
                        color: 'white', 
                        beginAtZero: true 
                    },
                    grid: {
                        color: 'white'
                    }
                }
            }
        }
    });

    var ctx_umidita = document.getElementById('lineChart_umidita').getContext('2d');
    var Chart_umidita = new Chart(ctx_umidita, {
        type: 'line',
        data: {
            labels: labels,
            datasets: [{
                label: 'Umidità',
                data: umidita,
                borderColor: 'rgba(75, 192, 192, 1)',
                backgroundColor: 'rgba(75, 192, 192, 1)',
                borderWidth: 10,
                fill: true
            }]
        },
        options: {
            plugins: {
                legend: {
                    display: true,
                    labels: {
                        color: 'white'
                    }
                }
            },
            scales: {
                y: {
                    title: {
                        display: true,
                        text: 'Percentuale [%]',
                        color: 'white'
                    },
                    ticks: { 
                        color: 'white', 
                        beginAtZero: true 
                    },
                    grid: {
                        color: 'white'
                    }
                },
                x: {
                    title: {
                        display: true,
                        text: 'Tempo',
                        color: 'white'
                    },
                    ticks: { 
                        color: 'white', 
                        beginAtZero: true 
                    },
                    grid: {
                        color: 'white'
                    }
                }
            }
        }
    });

    var ctx_luminosita = document.getElementById('lineChart_luminosita').getContext('2d');
    var Chart_luminosita = new Chart(ctx_luminosita, {
        type: 'line',
        data: {
            labels: labels,
            datasets: [{
                label: 'Luminosità',
                data: luminosita,
                borderColor: 'rgba(75, 192, 192, 1)',
                backgroundColor: 'rgba(75, 192, 192, 1)',
                borderWidth: 10,
                fill: true
            }]
        },
        options: {
            plugins: {
                legend: {
                    display: true,
                    labels: {
                        color: 'white'
                    }
                }
            },
            scales: {
                y: {
                    title: {
                        display: true,
                        text: 'Lux [Lx]',
                        color: 'white'
                    },
                    ticks: { 
                        color: 'white', 
                        beginAtZero: true 
                    },
                    grid: {
                        color: 'white'
                    }
                },
                x: {
                    title: {
                        display: true,
                        text: 'Tempo',
                        color: 'white'
                    },
                    ticks: { 
                        color: 'white', 
                        beginAtZero: true 
                    },
                    grid: {
                        color: 'white'
                    }
                }
            }
        }
    });

    var ctx_co2 = document.getElementById('lineChart_co2').getContext('2d');
    var Chart_co2 = new Chart(ctx_co2, {
        type: 'line',
        data: {
            labels: labels,
            datasets: [{
                label: 'Anidride Carbonica (Co2)',
                data: co2,
                borderColor: 'rgba(75, 192, 192, 1)',
                backgroundColor: 'rgba(75, 192, 192, 1)',
                borderWidth: 10,
                fill: true
            }]
        },
        options: {
            plugins: {
                legend: {
                    display: true,
                    labels: {
                        color: 'white'
                    }
                }
            },
            scales: {
                y: {
                    title: {
                        display: true,
                        text: 'Parti per milione [ppm]',
                        color: 'white'
                    },
                    ticks: { 
                        color: 'white', 
                        beginAtZero: true 
                    },
                    grid: {
                        color: 'white'
                    }
                },
                x: {
                    title: {
                        display: true,
                        text: 'Tempo',
                        color: 'white'
                    },
                    ticks: { 
                        color: 'white', 
                        beginAtZero: true 
                    },
                    grid: {
                        color: 'white'
                    }
                }
            }
        }
    });
</script>

@endsection
