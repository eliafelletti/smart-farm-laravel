<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" data-bs-theme="light">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Farming-Evolution</title>

        <!--  Favicon -->
        <link rel="icon" type="image/x-icon" href=" {{ URL::asset('icons/thermometer-sun.svg') }} ">

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
        <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

        <!-- Styles -->
        <link rel="stylesheet" type="text/css" href=" {{ URL::asset('css/app.css') }} ">

        <!-- Scripts -->
        <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
        
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    </head>

    <body>

        <div id="welcome" class="content">

            <nav class="navbar navbar-expand-md  shadow-sm sticky-top nav-welcome">
                <div class="container">
                    <a class="navbar-brand fs-4 nav-head" href="{{ url('/') }}">
                        {{ config('app.name', 'Laravel') }}
                    </a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                        <span class="navbar-toggler-icon"></span>
                    </button>

                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <!-- Right Side Of Navbar -->
                        <ul class="navbar-nav ms-auto">
                            <!-- Authentication Links -->
                            @guest
                                @if (Route::has('login'))
                                    <li class="nav-item">
                                        <a class="nav-link nav-text" href="{{ route('login') }}">{{ __('Login') }}</a>
                                    </li>
                                @endif

                                @if (Route::has('register'))
                                    <li class="nav-item">
                                        <a class="nav-link nav-text" href="{{ route('register') }}">{{ __('Register') }}</a>
                                    </li>
                                @endif
                            @else
                                <li class="nav-item">
                                    <a class="nav-link nav-text" href="{{ url('/home') }}">{{ __('Home') }}</a>
                                </li>
                            @endguest
                        </ul>
                    </div>
                </div>
            </nav>

            <main class="welcome">
                <div class="row">
                    <div class="col-md-12">
                        
                        <!-- Carousel start -->
                        <div id="carouselExampleCaptions" class="carousel carousel-light slide" data-bs-ride="carousel">
                            <div class="carousel-indicators carousel-indicators-welcome">
                                <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                                <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
                                <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
                            </div>
                            <div class="carousel-inner">
                                <div class="carousel-item active" data-bs-interval="4000">
                                <img src="{{ URL::asset('images/Carousel_1.jpg') }}" class="d-block w-100" alt="">
                                </div>
                                <div class="carousel-item" data-bs-interval="4000">
                                <img src="{{ URL::asset('images/Carousel_2.jpg') }}" class="d-block w-100" alt="">
                                </div>
                                <div class="carousel-item" data-bs-interval="4000">
                                <img src="{{ URL::asset('images/Carousel_3.jpg') }}" class="d-block w-100" alt="">
                                </div>
                            </div>
                            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
                                <span class="carousel-control-prev-icon carousel-control-prev-icon-welcome" aria-hidden="true"></span>
                                <span class="visually-hidden">Previous</span>
                            </button>
                            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
                                <span class="carousel-control-next-icon carousel-control-prev-next-welcome" aria-hidden="true"></span>
                                <span class="visually-hidden">Next</span>
                            </button>
                        </div>
                        <!-- Carousel end -->

                    </div>
                </div>

                <!-- Features Start -->
                <div class="container-xxl py-5">
                    <div class="container">
                        <div class="row g-5 align-items-center">
                            <div class="col-lg-6">
                                <p class="fs-5 fw-bold text-success">Perché Scegliere Noi?</p>
                                <h1 class="display-5 mb-4 fw-bold">Alcune Ragioni Per Scegliere Noi!</h1>
                                <p class="mb-4">Grazie alla nostra moderna soluzione di sorveglianza attiva, sarai sempre in grado di monitorare il micro-clima di tutte le serre per massimizzare l'efficienza produttiva</p>
                                <a class="btn btn-success py-3 px-4" href="{{ url('/home') }}">Esplora</a>
                            </div>
                            <div class="col-lg-6">
                                <div class="row g-4 align-items-center">
                                    <div class="col-md-6">
                                        <div class="row g-4">
                                            <div class="col-12">
                                                <div class="text-center rounded py-5 px-4 div-welcome">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="80" height="80" fill="currentColor" class="bi bi-check-lg text-success" viewBox="0 0 18 18">
                                                        <path d="M12.736 3.97a.733.733 0 0 1 1.047 0c.286.289.29.756.01 1.05L7.88 12.01a.733.733 0 0 1-1.065.02L3.217 8.384a.757.757 0 0 1 0-1.06.733.733 0 0 1 1.047 0l3.052 3.093 5.4-6.425z"/>
                                                    </svg>
                                                    <h4 class="mb-0">Soddisfazione 100%</h4>
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="text-center rounded py-5 px-4 div-welcome">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="80" height="80" fill="currentColor" class="bi bi-people-fill text-success" viewBox="0 0 18 18">
                                                        <path d="M7 14s-1 0-1-1 1-4 5-4 5 3 5 4-1 1-1 1zm4-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6m-5.784 6A2.24 2.24 0 0 1 5 13c0-1.355.68-2.75 1.936-3.72A6.3 6.3 0 0 0 5 9c-4 0-5 3-5 4s1 1 1 1zM4.5 8a2.5 2.5 0 1 0 0-5 2.5 2.5 0 0 0 0 5"/>
                                                    </svg>
                                                    <h4 class="mb-0">Team Dedicato</h4>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="text-center rounded py-5 px-4 div-welcome">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="75" height="75" fill="currentColor" class="bi bi-tools text-success" viewBox="0 0 18 18">
                                                <path d="M1 0 0 1l2.2 3.081a1 1 0 0 0 .815.419h.07a1 1 0 0 1 .708.293l2.675 2.675-2.617 2.654A3.003 3.003 0 0 0 0 13a3 3 0 1 0 5.878-.851l2.654-2.617.968.968-.305.914a1 1 0 0 0 .242 1.023l3.27 3.27a.997.997 0 0 0 1.414 0l1.586-1.586a.997.997 0 0 0 0-1.414l-3.27-3.27a1 1 0 0 0-1.023-.242L10.5 9.5l-.96-.96 2.68-2.643A3.005 3.005 0 0 0 16 3q0-.405-.102-.777l-2.14 2.141L12 4l-.364-1.757L13.777.102a3 3 0 0 0-3.675 3.68L7.462 6.46 4.793 3.793a1 1 0 0 1-.293-.707v-.071a1 1 0 0 0-.419-.814zm9.646 10.646a.5.5 0 0 1 .708 0l2.914 2.915a.5.5 0 0 1-.707.707l-2.915-2.914a.5.5 0 0 1 0-.708M3 11l.471.242.529.026.287.445.445.287.026.529L5 13l-.242.471-.026.529-.445.287-.287.445-.529.026L3 15l-.471-.242L2 14.732l-.287-.445L1.268 14l-.026-.529L1 13l.242-.471.026-.529.445-.287.287-.445.529-.026z"/>
                                            </svg>                                  
                                            <h4 class="mb-0">Tecnologie Innovative</h4>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Features End -->

                <!-- Service Start -->
                <div class="container-xxl py-5">
                    <div class="container">
                        <div class="text-center mx-auto" style="max-width: 500px;">
                            <p class="fs-5 fw-bold text-success">Nostri Servizi</p>
                            <h1 class="display-5 mb-5 fw-bold">Servizi Che Offriamo<br/>Per Te</h1>
                        </div>
                        <div class="row g-4 text-center">
                            <div class="col-lg-4 col-md-6">
                                <div class="service-item rounded d-flex h-100 div-welcome">
                                    <div class="service-text rounded p-5">
                                        <div class="btn-square rounded-circle mx-auto mb-3">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="80" height="80" fill="currentColor" class="bi bi-thermometer-half text-success" viewBox="0 0 18 18">
                                                <path d="M9.5 12.5a1.5 1.5 0 1 1-2-1.415V6.5a.5.5 0 0 1 1 0v4.585a1.5 1.5 0 0 1 1 1.415"/>
                                                <path d="M5.5 2.5a2.5 2.5 0 0 1 5 0v7.55a3.5 3.5 0 1 1-5 0zM8 1a1.5 1.5 0 0 0-1.5 1.5v7.987l-.167.15a2.5 2.5 0 1 0 3.333 0l-.166-.15V2.5A1.5 1.5 0 0 0 8 1"/>
                                            </svg>
                                        </div>
                                        <h4 class="mb-3">Temperatura</h4>
                                        <p class="mb-4">Servizio dedicato per il monitoring della temperatura all'interno del micro-clima presente in serra.</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-6">
                                <div class="service-item rounded d-flex h-100 div-welcome">
                                    <div class="service-text rounded p-5">
                                        <div class="btn-square rounded-circle mx-auto mb-3">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="80" height="80" fill="currentColor" class="bi bi-moisture text-success" viewBox="0 0 18 18">
                                                <path d="M13.5 0a.5.5 0 0 0 0 1H15v2.75h-.5a.5.5 0 0 0 0 1h.5V7.5h-1.5a.5.5 0 0 0 0 1H15v2.75h-.5a.5.5 0 0 0 0 1h.5V15h-1.5a.5.5 0 0 0 0 1h2a.5.5 0 0 0 .5-.5V.5a.5.5 0 0 0-.5-.5zM7 1.5l.364-.343a.5.5 0 0 0-.728 0l-.002.002-.006.007-.022.023-.08.088a29 29 0 0 0-1.274 1.517c-.769.983-1.714 2.325-2.385 3.727C2.368 7.564 2 8.682 2 9.733 2 12.614 4.212 15 7 15s5-2.386 5-5.267c0-1.05-.368-2.169-.867-3.212-.671-1.402-1.616-2.744-2.385-3.727a29 29 0 0 0-1.354-1.605l-.022-.023-.006-.007-.002-.001zm0 0-.364-.343zm-.016.766L7 2.247l.016.019c.24.274.572.667.944 1.144.611.781 1.32 1.776 1.901 2.827H4.14c.58-1.051 1.29-2.046 1.9-2.827.373-.477.706-.87.945-1.144zM3 9.733c0-.755.244-1.612.638-2.496h6.724c.395.884.638 1.741.638 2.496C11 12.117 9.182 14 7 14s-4-1.883-4-4.267"/>
                                            </svg>
                                        </div>
                                        <h4 class="mb-3">Umidità</h4>
                                        <p class="mb-4">Servizio dedicato per il monitoring dell'umidità all'interno del micro-clima presente in serra.</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-6">
                                <div class="service-item rounded d-flex h-100 div-welcome">
                                    <div class="service-text rounded p-5">
                                        <div class="btn-square rounded-circle mx-auto mb-3">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="80" height="80" fill="currentColor" class="bi bi-tree text-success" viewBox="0 0 18 18">
                                                <path d="M8.416.223a.5.5 0 0 0-.832 0l-3 4.5A.5.5 0 0 0 5 5.5h.098L3.076 8.735A.5.5 0 0 0 3.5 9.5h.191l-1.638 3.276a.5.5 0 0 0 .447.724H7V16h2v-2.5h4.5a.5.5 0 0 0 .447-.724L12.31 9.5h.191a.5.5 0 0 0 .424-.765L10.902 5.5H11a.5.5 0 0 0 .416-.777zM6.437 4.758A.5.5 0 0 0 6 4.5h-.066L8 1.401 10.066 4.5H10a.5.5 0 0 0-.424.765L11.598 8.5H11.5a.5.5 0 0 0-.447.724L12.69 12.5H3.309l1.638-3.276A.5.5 0 0 0 4.5 8.5h-.098l2.022-3.235a.5.5 0 0 0 .013-.507"/>
                                            </svg>
                                        </div>
                                        <h4 class="mb-3">Anidride Carbonica</h4>
                                        <p class="mb-4">Servizio dedicato per il monitoring della quantità di anidride carbonica all'interno del micro-clima presente in serra.</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-6">
                                <div class="service-item rounded d-flex h-100 div-welcome">
                                    <div class="service-text rounded p-5">
                                        <div class="btn-square rounded-circle mx-auto mb-3">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="80" height="80" fill="currentColor" class="bi bi-droplet-half text-success" viewBox="0 0 18 18">
                                                <path fill-rule="evenodd" d="M7.21.8C7.69.295 8 0 8 0q.164.544.371 1.038c.812 1.946 2.073 3.35 3.197 4.6C12.878 7.096 14 8.345 14 10a6 6 0 0 1-12 0C2 6.668 5.58 2.517 7.21.8m.413 1.021A31 31 0 0 0 5.794 3.99c-.726.95-1.436 2.008-1.96 3.07C3.304 8.133 3 9.138 3 10c0 0 2.5 1.5 5 .5s5-.5 5-.5c0-1.201-.796-2.157-2.181-3.7l-.03-.032C9.75 5.11 8.5 3.72 7.623 1.82z"/>
                                                <path fill-rule="evenodd" d="M4.553 7.776c.82-1.641 1.717-2.753 2.093-3.13l.708.708c-.29.29-1.128 1.311-1.907 2.87z"/>
                                            </svg>
                                        </div>
                                        <h4 class="mb-3">Irrigazione</h4>
                                        <p class="mb-4">Servizio dedicato per il monitoring del livello di irrigazione all'interno del micro-clima presente in serra.</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-6">
                                <div class="service-item rounded d-flex h-100 div-welcome">
                                    <div class="service-text rounded p-5">
                                        <div class="btn-square rounded-circle mx-auto mb-3">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="80" height="80" fill="currentColor" class="bi bi-calendar4-range text-success" viewBox="0 0 18 18">
                                                <path d="M3.5 0a.5.5 0 0 1 .5.5V1h8V.5a.5.5 0 0 1 1 0V1h1a2 2 0 0 1 2 2v11a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V3a2 2 0 0 1 2-2h1V.5a.5.5 0 0 1 .5-.5M2 2a1 1 0 0 0-1 1v1h14V3a1 1 0 0 0-1-1zm13 3H1v9a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1z"/>
                                                <path d="M9 7.5a.5.5 0 0 1 .5-.5H15v2H9.5a.5.5 0 0 1-.5-.5zm-2 3v1a.5.5 0 0 1-.5.5H1v-2h5.5a.5.5 0 0 1 .5.5"/>
                                            </svg>
                                        </div>
                                        <h4 class="mb-3">Calendario</h4>
                                        <p class="mb-4">Servizio dedicato per sincronizzare i raccolti tra le molteplici serre gestite dal proprietario.</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-6">
                                <div class="service-item rounded d-flex h-100 div-welcome">
                                    <div class="service-text rounded p-5">
                                        <div class="btn-square rounded-circle mx-auto mb-3">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="80" height="80" fill="currentColor" class="bi bi-lightbulb text-success" viewBox="0 0 18 18">
                                                <path d="M2 6a6 6 0 1 1 10.174 4.31c-.203.196-.359.4-.453.619l-.762 1.769A.5.5 0 0 1 10.5 13a.5.5 0 0 1 0 1 .5.5 0 0 1 0 1l-.224.447a1 1 0 0 1-.894.553H6.618a1 1 0 0 1-.894-.553L5.5 15a.5.5 0 0 1 0-1 .5.5 0 0 1 0-1 .5.5 0 0 1-.46-.302l-.761-1.77a2 2 0 0 0-.453-.618A5.98 5.98 0 0 1 2 6m6-5a5 5 0 0 0-3.479 8.592c.263.254.514.564.676.941L5.83 12h4.342l.632-1.467c.162-.377.413-.687.676-.941A5 5 0 0 0 8 1"/>
                                            </svg>
                                        </div>
                                        <h4 class="mb-3">Luminosità</h4>
                                        <p class="mb-4">Servizio dedicato per il monitoring della luminosità all'interno del micro-clima presente in serra.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Service End -->

                <!-- Team Start -->
                <div class="container-xxl py-5">
                    <div class="container">
                        <div class="text-center mx-auto" style="max-width: 500px;">
                            <p class="fs-5 fw-bold text-success">Nostro Team</p>
                            <h1 class="display-5 mb-5 fw-bold">Membri Del Team</h1>
                        </div>
                        <div class="row g-4 text-center">
                            <div class="col-lg-6 col-md-6">
                                <div class="team-item rounded">
                                    <img class="img-fluid img-welcome" src="https://placehold.co/200x200" alt="">
                                    <div class="team-text"><br/>
                                        <h4 class="mb-0">Dario Macchi</h4>
                                        <p class="text-success">Co-Founder</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6">
                                <div class="team-item rounded">
                                    <img class="img-fluid img-welcome" src="{{ URL::asset('images/elia.jpg') }}" alt="">
                                    <div class="team-text"><br/>
                                        <h4 class="mb-0">Elia Felletti</h4>
                                        <p class="text-success">Co-Founder</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Team End -->
            </main>

        </div><br/>

        <footer class="py-4 footer-welcome">
            <p class="text-center">© 2024 Farming-Evolution</p>
        </footer>

    </body>
</html>
