<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('pageTitle')</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">

    {{-- tom tom script --}}
    <script src="https://api.tomtom.com/maps-sdk-for-web/cdn/6.x/6.14.0/maps/maps-web.min.js"></script>
    <script src="https://api.tomtom.com/maps-sdk-for-web/cdn/6.x/6.14.0/maps/maps-web.min.js"></script>
    <link rel='stylesheet' type='text/css' href='https://api.tomtom.com/maps-sdk-for-web/cdn/6.x/6.14.0/maps/maps.css'>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app">
        <header>
            <nav class="basic-nav-admin">
                <div>
                    <a href="{{ url('/') }}">
                        <img class="img-logo" src="{{ asset('images/logo_lg_gray.png') }}" alt="logo_boolbnb">
                    </a>
                </div>
                {{-- div vuoto per spaziatura --}}
                <div class="g-2"></div>
                <div>
                    <span> 
                        <span class="user-name">{{ Auth::user()->name }},  </span>
                        sei pronto per una nuova avventura?
                    </span>
                </div>
                    
                <div>
                    <a href="{{ route('logout') }}"
                        onclick="event.preventDefault();
                                document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                    </a>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                    @csrf
                    </form>
                    
                </div>
            </nav>
            <div class="dashboard-bar">
                <div>
                    <a href="{{ route('admin.index') }}">visita la tua pagina personale</a>
                </div>
            </div>
        </header>
        

    
        <main>
            <div class="continainer">
                @yield('content')
            </div>    
        </main>
    </div>
</body>
</html>
