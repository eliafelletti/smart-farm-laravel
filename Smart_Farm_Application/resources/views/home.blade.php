@extends('layouts.app')

@section('content')
<div class="container">
    <h1 style="text-align: center;">Quick Links</h1>
    <hr/><br/><br/>

    @if ( Auth::user()->level == 1 )

        <div class="row row row-cols-1 row-cols-md-2 g-4">
            <div class="col-md-6">
                <a href="{{ url('/green_house') }}" style="text-decoration: none;">
                    <div class="card mycard border-success">
                        <div class="card-header mycard-header border-success">
                            <svg xmlns="http://www.w3.org/2000/svg" width="45" height="45" fill="currentColor" class="bi bi-graph-up" viewBox="0 0 18 18">
                                <path fill-rule="evenodd" d="M0 0h1v15h15v1H0zm14.817 3.113a.5.5 0 0 1 .07.704l-4.5 5.5a.5.5 0 0 1-.74.037L7.06 6.767l-3.656 5.027a.5.5 0 0 1-.808-.588l4-5.5a.5.5 0 0 1 .758-.06l2.609 2.61 4.15-5.073a.5.5 0 0 1 .704-.07"/>
                            </svg>
                        </div>

                        <div class="card-body" style="height: 130px;">
                            <h2 class="card-title">{{ __('Monitoring') }}<br/></h2>
                            <p class="card-text">{{ __('Shortcut disponibile per il monitoring di tutte le serre proprietarie') }}</p>
                        </div>
                    </div>
                </a>
            </div>

            <div class="col-md-6">
                <a href="{{ url('/realized_crop') }}" style="text-decoration: none;">
                    <div class="card mycard border-success">
                        <div class="card-header mycard-header border-success">
                            <svg xmlns="http://www.w3.org/2000/svg" width="45" height="45" fill="currentColor" class="bi bi-calendar4-range" viewBox="0 0 18 18">
                                <path d="M3.5 0a.5.5 0 0 1 .5.5V1h8V.5a.5.5 0 0 1 1 0V1h1a2 2 0 0 1 2 2v11a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V3a2 2 0 0 1 2-2h1V.5a.5.5 0 0 1 .5-.5M2 2a1 1 0 0 0-1 1v1h14V3a1 1 0 0 0-1-1zm13 3H1v9a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1z"/>
                                <path d="M9 7.5a.5.5 0 0 1 .5-.5H15v2H9.5a.5.5 0 0 1-.5-.5zm-2 3v1a.5.5 0 0 1-.5.5H1v-2h5.5a.5.5 0 0 1 .5.5"/>
                            </svg>
                        </div>

                        <div class="card-body" style="height: 130px;">
                            <h2>{{ __('Calendario') }}</h2>
                            {{ __('Shortcut disponibile per la visualizzazione del calendario riguardante tutti i raccolti proprietari') }}
                        </div>
                    </div>
                </a>
            </div>

            <div class="col-md-6">
                <a href="{{ url('/user_request/create') }}" style="text-decoration: none;">
                    <div class="card mycard border-success">
                        <div class="card-header mycard-header border-success">
                            <svg xmlns="http://www.w3.org/2000/svg" width="45" height="45" fill="currentColor" class="bi bi-envelope-plus" viewBox="0 0 18 18">
                                <path d="M2 2a2 2 0 0 0-2 2v8.01A2 2 0 0 0 2 14h5.5a.5.5 0 0 0 0-1H2a1 1 0 0 1-.966-.741l5.64-3.471L8 9.583l7-4.2V8.5a.5.5 0 0 0 1 0V4a2 2 0 0 0-2-2zm3.708 6.208L1 11.105V5.383zM1 4.217V4a1 1 0 0 1 1-1h12a1 1 0 0 1 1 1v.217l-7 4.2z"/>
                                <path d="M16 12.5a3.5 3.5 0 1 1-7 0 3.5 3.5 0 0 1 7 0m-3.5-2a.5.5 0 0 0-.5.5v1h-1a.5.5 0 0 0 0 1h1v1a.5.5 0 0 0 1 0v-1h1a.5.5 0 0 0 0-1h-1v-1a.5.5 0 0 0-.5-.5"/>
                            </svg>
                        </div>

                        <div class="card-body" style="height: 130px;">
                            <h2>{{ __('Invia Richiesta') }}</h2>
                            {{ __('Shortcut disponibile per l\'invio di una nuova richiesta per l\'aggiornamento delle tecnologie') }}
                        </div>
                    </div>
                </a>
            </div>

            <div class="col-md-6">
                <a href="{{ url('/user_request') }}" style="text-decoration: none;">
                    <div class="card mycard border-success">
                        <div class="card-header mycard-header border-success">
                            <svg xmlns="http://www.w3.org/2000/svg" width="45" height="45" fill="currentColor" class="bi bi-mailbox2-flag" viewBox="0 0 18 18">
                                <path d="M10.5 8.5V3.707l.854-.853A.5.5 0 0 0 11.5 2.5v-2A.5.5 0 0 0 11 0H9.5a.5.5 0 0 0-.5.5v8z"/>
                                <path d="M4 3h4v1H6.646A4 4 0 0 1 8 7v6h7V7a3 3 0 0 0-3-3V3a4 4 0 0 1 4 4v6a1 1 0 0 1-1 1H1a1 1 0 0 1-1-1V7a4 4 0 0 1 4-4m.585 4.157C4.836 7.264 5 7.334 5 7a1 1 0 0 0-2 0c0 .334.164.264.415.157C3.58 7.087 3.782 7 4 7s.42.086.585.157"/>
                            </svg>
                        </div>

                        <div class="card-body" style="height: 130px;">
                            <h2>{{ __('Visualizza Richieste') }}</h2>
                            {{ __('Shortcut disponibile per la visualizzazione di tutte le richieste proprietarie inviate') }}
                        </div>
                    </div>
                </a>
            </div>
        </div>

    @elseif ( Auth::user()->level == 2 )

        <div class="row row row-cols-1 row-cols-md-2 g-4">
            <div class="col-md-6">
                <a href="{{ url('/user_request/create') }}" style="text-decoration: none;">
                    <div class="card mycard border-success">
                        <div class="card-header mycard-header border-success">
                            <svg xmlns="http://www.w3.org/2000/svg" width="45" height="45" fill="currentColor" class="bi bi-envelope-plus" viewBox="0 0 18 18">
                                <path d="M2 2a2 2 0 0 0-2 2v8.01A2 2 0 0 0 2 14h5.5a.5.5 0 0 0 0-1H2a1 1 0 0 1-.966-.741l5.64-3.471L8 9.583l7-4.2V8.5a.5.5 0 0 0 1 0V4a2 2 0 0 0-2-2zm3.708 6.208L1 11.105V5.383zM1 4.217V4a1 1 0 0 1 1-1h12a1 1 0 0 1 1 1v.217l-7 4.2z"/>
                                <path d="M16 12.5a3.5 3.5 0 1 1-7 0 3.5 3.5 0 0 1 7 0m-3.5-2a.5.5 0 0 0-.5.5v1h-1a.5.5 0 0 0 0 1h1v1a.5.5 0 0 0 1 0v-1h1a.5.5 0 0 0 0-1h-1v-1a.5.5 0 0 0-.5-.5"/>
                            </svg>
                        </div>

                        <div class="card-body" style="height: 130px;">
                            <h2>{{ __('Invia Richiesta') }}</h2>
                            {{ __('Shortcut disponibile per l\'invio di una nuova richiesta per l\'inserimento di nuove tecnologie') }}
                        </div>
                    </div>
                </a>
            </div>

            <div class="col-md-6">
                <a href="{{ url('/user_request') }}" style="text-decoration: none;">
                    <div class="card mycard border-success">
                        <div class="card-header mycard-header border-success">
                            <svg xmlns="http://www.w3.org/2000/svg" width="45" height="45" fill="currentColor" class="bi bi-mailbox2-flag" viewBox="0 0 18 18">
                                <path d="M10.5 8.5V3.707l.854-.853A.5.5 0 0 0 11.5 2.5v-2A.5.5 0 0 0 11 0H9.5a.5.5 0 0 0-.5.5v8z"/>
                                <path d="M4 3h4v1H6.646A4 4 0 0 1 8 7v6h7V7a3 3 0 0 0-3-3V3a4 4 0 0 1 4 4v6a1 1 0 0 1-1 1H1a1 1 0 0 1-1-1V7a4 4 0 0 1 4-4m.585 4.157C4.836 7.264 5 7.334 5 7a1 1 0 0 0-2 0c0 .334.164.264.415.157C3.58 7.087 3.782 7 4 7s.42.086.585.157"/>
                            </svg>
                        </div>

                        <div class="card-body" style="height: 130px;">
                            <h2>{{ __('Visualizza Richieste') }}</h2>
                            {{ __('Shortcut disponibile per la visualizzazione di tutte le richieste inviate') }}
                        </div>
                    </div>
                </a>
            </div>
        </div>

    @elseif ( Auth::user()->level == 0 )

        <div class="row row row-cols-1 row-cols-md-2 g-4">
            <div class="col-md-6">
                <a href="{{ url('/green_house') }}" style="text-decoration: none;">
                    <div class="card mycard border-success">
                        <div class="card-header mycard-header border-success">
                            <svg xmlns="http://www.w3.org/2000/svg" width="45" height="45" fill="currentColor" class="bi bi-graph-up" viewBox="0 0 18 18">
                                <path fill-rule="evenodd" d="M0 0h1v15h15v1H0zm14.817 3.113a.5.5 0 0 1 .07.704l-4.5 5.5a.5.5 0 0 1-.74.037L7.06 6.767l-3.656 5.027a.5.5 0 0 1-.808-.588l4-5.5a.5.5 0 0 1 .758-.06l2.609 2.61 4.15-5.073a.5.5 0 0 1 .704-.07"/>
                            </svg>
                        </div>

                        <div class="card-body" style="height: 130px;">
                            <h2 class="card-title">{{ __('Monitoring') }}<br/></h2>
                            <p class="card-text">{{ __('Shortcut disponibile per il monitoring di tutte le serre') }}</p>
                        </div>
                    </div>
                </a>
            </div>

            <div class="col-md-6">
                <a href="{{ url('/user_request') }}" style="text-decoration: none;">
                    <div class="card mycard border-success">
                        <div class="card-header mycard-header border-success">
                            @if ( $num_unsatisfied_req > 0 )
                                <svg xmlns="http://www.w3.org/2000/svg" width="45" height="45" fill="currentColor" class="bi bi-mailbox2-flag" viewBox="0 0 18 18">
                                    <path d="M10.5 8.5V3.707l.854-.853A.5.5 0 0 0 11.5 2.5v-2A.5.5 0 0 0 11 0H9.5a.5.5 0 0 0-.5.5v8z"/>
                                    <path d="M4 3h4v1H6.646A4 4 0 0 1 8 7v6h7V7a3 3 0 0 0-3-3V3a4 4 0 0 1 4 4v6a1 1 0 0 1-1 1H1a1 1 0 0 1-1-1V7a4 4 0 0 1 4-4m.585 4.157C4.836 7.264 5 7.334 5 7a1 1 0 0 0-2 0c0 .334.164.264.415.157C3.58 7.087 3.782 7 4 7s.42.086.585.157"/>
                                </svg>
                                <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">{{ $num_unsatisfied_req }}</span>
                            @else
                                <svg xmlns="http://www.w3.org/2000/svg" width="45" height="45" fill="currentColor" class="bi bi-mailbox2" viewBox="0 0 18 18">
                                    <path d="M9 8.5h2.793l.853.854A.5.5 0 0 0 13 9.5h1a.5.5 0 0 0 .5-.5V8a.5.5 0 0 0-.5-.5H9z"/>
                                    <path d="M12 3H4a4 4 0 0 0-4 4v6a1 1 0 0 0 1 1h14a1 1 0 0 0 1-1V7a4 4 0 0 0-4-4M8 7a4 4 0 0 0-1.354-3H12a3 3 0 0 1 3 3v6H8zm-3.415.157C4.42 7.087 4.218 7 4 7s-.42.086-.585.157C3.164 7.264 3 7.334 3 7a1 1 0 0 1 2 0c0 .334-.164.264-.415.157"/>
                                </svg>
                            @endif
                        </div>

                        <div class="card-body" style="height: 130px;">
                            <h2>{{ __('Visualizza Richieste') }}</h2>
                            {{ __('Shortcut disponibile per la visualizzazione di tutte le richieste ricevute') }}
                        </div>
                    </div>
                </a>
            </div>
        </div>

    @endif

</div>
@endsection
