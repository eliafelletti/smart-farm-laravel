@extends('layouts.app')

@section('content')
<h1>Dashboard monitoring serra {{ $greenHouse->id }}</h1>
<hr/>

<a role="button" id="refresh" class="btn btn-primary float-end">
    Aggiorna
    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-repeat" viewBox="0 0 16 16">
        <path d="M11.534 7h3.932a.25.25 0 0 1 .192.41l-1.966 2.36a.25.25 0 0 1-.384 0l-1.966-2.36a.25.25 0 0 1 .192-.41m-11 2h3.932a.25.25 0 0 0 .192-.41L2.692 6.23a.25.25 0 0 0-.384 0L.342 8.59A.25.25 0 0 0 .534 9"/>
        <path fill-rule="evenodd" d="M8 3c-1.552 0-2.94.707-3.857 1.818a.5.5 0 1 1-.771-.636A6.002 6.002 0 0 1 13.917 7H12.9A5 5 0 0 0 8 3M3.1 9a5.002 5.002 0 0 0 8.757 2.182.5.5 0 1 1 .771.636A6.002 6.002 0 0 1 2.083 9z"/>
    </svg>
</a>
<div style="clear:both;"></div>
<hr/>

<div class="row g-4">
    <div class="col-md-6">
        <div class="card">
            <div class="card-header">
                Grafico Temperatura      
            </div>
            <div class="card-body">
                <canvas id="lineChart_temperatura"></canvas><br/>        
            </div>
        </div>
    </div>
    <div class="col-md-6">
        <div class="card">
            <div class="card-header">
                Grafico Umidità      
            </div>
            <div class="card-body">
                <canvas id="lineChart_umidita"></canvas><br/>        
            </div>
        </div>
    </div>
</div><br/>

<div class="row g-4 justify-content-center">
    <div class="col-md-6">
        <div class="card">
            <div class="card-header">
                Grafico Irrigazione      
            </div>
            <div class="card-body">
                <canvas id="lineChart_irrigazione"></canvas><br/>
            </div>
        </div>
    </div>
</div><br/>

<div class="row g-4">
    <div class="col-md-6">
        <div class="card">
            <div class="card-header">
                Grafico Luminosità      
            </div>
            <div class="card-body">
                <canvas id="lineChart_luminosita"></canvas><br/>        
            </div>
        </div>
    </div>
    <div class="col-md-6">
        <div class="card">
            <div class="card-header">
                Grafico Anidride Carbonica      
            </div>
            <div class="card-body">
                <canvas id="lineChart_co2"></canvas><br/>        
            </div>
        </div>
    </div>
</div><br/>

<!-- Modal per il grafico ingrandito -->
<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-width">
        <div class="modal-content">
            <div class="modal-header">
                <h2 class="modal-title fs-4" id="staticBackdropLabel">Zoom In</h2>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <canvas id="enlargedChart"></canvas>
            </div>
        </div>
    </div>
</div>

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

    var irrigazione = @json($data_irrigazione).data.map(function(d) {
        return d.irrigazione;
    });

    // Creazione grafici
    var ctx_temperatura = document.getElementById('lineChart_temperatura').getContext('2d');
    var Chart_temperatura = new Chart(ctx_temperatura, {
        type: 'line',
        data: {
            labels: labels,
            datasets: [{
                label: '   Temperatura',
                data: temperature,
                borderColor: 'rgba(75, 192, 192, 1)',
                backgroundColor: 'rgba(75, 192, 192, 0.5)',
                borderWidth: 6,
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
                label: '   Umidità',
                data: umidita,
                borderColor: 'rgba(75, 192, 192, 1)',
                backgroundColor: 'rgba(75, 192, 192, 0.5)',
                borderWidth: 6,
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
                label: '   Luminosità',
                data: luminosita,
                borderColor: 'rgba(75, 192, 192, 1)',
                backgroundColor: 'rgba(75, 192, 192, 0.5)',
                borderWidth: 6,
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
                        text: 'Lux [lx]',
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
                label: '   Anidride Carbonica (CO2)',
                data: co2,
                borderColor: 'rgba(75, 192, 192, 1)',
                backgroundColor: 'rgba(75, 192, 192, 0.5)',
                borderWidth: 6,
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
                        text: 'Parti Per Milione [ppm]',
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

    var ctx_irrigazione = document.getElementById('lineChart_irrigazione').getContext('2d');
    var Chart_irrigazione = new Chart(ctx_irrigazione, {
        type: 'line',
        data: {
            labels: labels,
            datasets: [{
                label: '   Irrigazione',
                data: irrigazione,
                borderColor: 'rgba(75, 192, 192, 1)',
                backgroundColor: 'rgba(75, 192, 192, 0.5)',
                borderWidth: 6,
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
                        text: 'Millilitri [ml]',
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

    // Aggiunta id per i grafici
    $('#lineChart_temperatura').attr('data-chart-id', 'temperatura');
    $('#lineChart_umidita').attr('data-chart-id', 'umidita');
    $('#lineChart_irrigazione').attr('data-chart-id', 'irrigazione');
    $('#lineChart_co2').attr('data-chart-id', 'co2');
    $('#lineChart_luminosita').attr('data-chart-id', 'luminosita');

    // Variabile globale per il grafico ingrandito
    var enlargedChart = null;

    // Al click su un grafico, mostra il modal con il grafico ingrandito
    $('canvas').on('click', function() {
        var chartId = $(this).attr('data-chart-id');
        var ctx = document.getElementById('enlargedChart').getContext('2d');
        var data;
        switch(chartId) {
            case 'temperatura':
                data = temperature;
                label_legend = "   Temperatura";
                label_y_scale = "Gradi Celsius [°C]";
                break;
            case 'umidita':
                data = umidita;
                label_legend = "   Umidità";
                label_y_scale = "Percentuale [%]";
                break;
            case 'luminosita':
                data = luminosita;
                label_legend = "   Luminosità";
                label_y_scale = "Lux [lx]";
                break;
            case 'co2':
                data = co2;
                label_legend = "   Anidride Carbonica (CO2)";
                label_y_scale = "Parti Per Milione [ppm]";
                break;
            case 'irrigazione':
                data = irrigazione;
                label_legend = "   Irrigazione";
                label_y_scale = "Millilitri [ml]";
                break;
            default:
                data = [];
                label_legend = "";
                label_y_scale = "";
                break;
        }
        
        $('.btn-close').on('click', function(){
            enlargedChart.destroy();
        });

        var enlargedChart = new Chart(ctx, {
            type: 'line',
            data: {
                labels: labels,
                datasets: [{
                    label: label_legend,
                    data: data,
                    borderColor: 'rgba(75, 192, 192, 1)',
                    backgroundColor: 'rgba(75, 192, 192, 0.5)',
                    borderWidth: 6,
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
                            text: label_y_scale, 
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

        $('#staticBackdrop').modal('show');

    });

    $('#refresh').bind('click', function (){
        document.location.reload();
    });
</script>

@endsection
