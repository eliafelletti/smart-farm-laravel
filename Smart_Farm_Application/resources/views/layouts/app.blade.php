<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" data-bs-theme="dark">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!--  Favicon -->
    <link rel="icon" type="image/x-icon" href=" {{ URL::asset('icons/thermometer-sun.svg') }} ">

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">
    
    <!-- Styles -->
    <link rel="stylesheet" type="text/css" href=" {{ URL::asset('css/app.css') }} ">

    <!-- Scripts -->
    <!-- @vite(['resources/sass/app.scss', 'resources/js/app.js']) -->
    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</head>

<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-dark bg-body-tertiary shadow-sm sticky-top">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'Laravel') }}
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    @if ( Auth::user() )
                        <ul class="navbar-nav me-auto">

                            @if ( Auth::user()->level == 0 )
                                <li class="nav-item">
                                    <a class="nav-link" aria-current="page" href="{{ url('/smart_farm') }}">{{ __('Smart-Farms') }}</a>
                                </li>
                            @elseif ( Auth::user()->level == 1 && !empty($owner_nav) )
                                <li class="nav-item">
                                    <a class="nav-link" aria-current="page" href="{{ url('/smart_farm') }}">{{ __('Smart-Farm') }}</a>
                                </li>
                            @endif

                            @if ( Auth::user()->level == 0 || ( Auth::user()->level == 1 && !empty($owner_nav) && !empty($smart_farm_nav) ) )
                                <li class="nav-item">
                                    <a class="nav-link" aria-current="page" href="{{ url('/green_house') }}">{{ __('Serre') }}</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" aria-current="page" href="{{ url('/cultivation') }}">{{ __('Colture') }}</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" aria-current="page" href="{{ url('/realized_crop') }}">{{ __('Raccolti Realizzati') }}</a>
                                </li>
                            @endif

                            @if ( Auth::user()->level == 0 )
                                <li class="nav-item">
                                    <a class="nav-link" aria-current="page" href="{{ url('/technology') }}">{{ __('Tecnologie') }}</a>
                                </li>
                            @elseif ( Auth::user()->level == 2 && !empty($supplier_cp_nav) )
                                <li class="nav-item">
                                    <a class="nav-link" aria-current="page" href="{{ url('/technology') }}">{{ __('Tecnologie Proprietarie') }}</a>
                                </li>
                            @endif
                            
                            @if ( Auth::user()->level == 0 || ( Auth::user()->level == 1 && !empty($owner_nav) && !empty($smart_farm_nav) ) )
                                <li class="nav-item">
                                    <a class="nav-link" aria-current="page" href="{{ url('/measure') }}">{{ __('Misure') }}</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" aria-current="page" href="{{ url('/realized_measure') }}">{{ __('Misure Realizzate') }}</a>
                                </li>
                            @endif

                            @if ( Auth::user()->level == 0 || ( Auth::user()->level == 1 && !empty($owner_nav) && !empty($smart_farm_nav) ) || ( Auth::user()->level == 2 && !empty($supplier_cp_nav) ) )
                                <li class="nav-item">
                                    <a class="nav-link" aria-current="page" href="{{ url('/used_technology') }}">{{ __('Tecnologie Utilizzate') }}</a>
                                </li>
                            @endif

                            @if ( Auth::user()->level == 0 )
                                <li class="nav-item">
                                    <a class="nav-link" aria-current="page" href="{{ url('/supplier_company') }}">{{ __('Aziende Fornitrici') }}</a>
                                </li>
                            @elseif ( Auth::user()->level == 2 )
                                <li class="nav-item">
                                    <a class="nav-link" aria-current="page" href="{{ url('/supplier_company') }}">{{ __('I Tuoi Dati') }}</a>
                                </li>
                            @endif

                            @if ( Auth::user()->level == 0 )
                                <li class="nav-item">
                                    <a class="nav-link" aria-current="page" href="{{ url('/owner') }}">{{ __('Proprietari') }}</a>
                                </li>
                            @elseif ( Auth::user()->level == 1 )
                                <li class="nav-item">
                                    <a class="nav-link" aria-current="page" href="{{ url('/owner') }}">{{ __('I Tuoi Dati') }}</a>
                                </li>
                            @endif
            
                        </ul>
                    @endif

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ms-auto">
                        <!-- Authentication Links -->
                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>
                            @endif

                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <div class="dropdown">
                                    <button class="btn btn-info dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                        {{ Auth::user()->name }}
                                    </button>
                                    <ul class="dropdown-menu" style="">
                                        <li>
                                            <a class="dropdown-item" href="{{ url('/logout') }}">
                                                {{ __('Logout') }}
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">
            @yield('content')
        </main>
    </div>

    @stack('scripts')
</body>
</html>
