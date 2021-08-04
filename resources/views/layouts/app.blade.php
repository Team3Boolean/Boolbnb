<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'BoolBnb') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    {{-- CDN VUE --}}
    <script src="https://cdn.jsdelivr.net/npm/vue@2.6.12/dist/vue.js"></script>

    {{-- tom tom script --}}
    {{-- <link rel='stylesheet' type='text/css' href='../assets/ui-library/index.css'/> --}}
    <script src="https://api.tomtom.com/maps-sdk-for-web/cdn/6.x/6.14.0/maps/maps-web.min.js"></script>
    <script src='https://api.tomtom.com/maps-sdk-for-web/cdn/6.x/6.14.0/services/services-web.min.js'></script>
    <script src="https://api.tomtom.com/maps-sdk-for-web/cdn/plugins/SearchBox/3.1.3-public-preview.0/SearchBox-web.js">
    <link rel='stylesheet' type='text/css' href='https://api.tomtom.com/maps-sdk-for-web/cdn/6.x/6.14.0/maps/maps.css'>
    <link rel='stylesheet' type='text/css' href='https://api.tomtom.com/maps-sdk-for-web/cdn/plugins/SearchBox/3.1.3-public-preview.0/SearchBox.css'>
    <script src="https://api.tomtom.com/maps-sdk-for-web/cdn/6.x/6.1.2-public-preview.15/services/services-web.min.js"></script>
    

    <!-- CDN vue -->
    <script src="https://cdn.jsdelivr.net/npm/vue@2.6.12/dist/vue.js"></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>

    
        <nav class="basic-nav">
            <div class="basic-nav-left1">
                <a href="{{ url('/') }}">
                    <img class="img-logo" src="{{ asset('images/logo_lg_gray.png') }}" alt="logo_boolbnb">
                </a>
            </div>
             <div class="basic-nav-left2">
                <a href="{{ url('/') }}">
                    <img class="img-logo" src="{{ asset('images/logo_xs_gray.png') }}" alt="logo_boolbnb">
                </a>
            </div>
            {{-- div vuoto per spaziatura --}}
            <div class="basic-nav-right">
                @guest
                <div class="basic-nav-right-1">
                    <a href="{{ route('login') }}">{{ __('Login') }}</a>
                </div>
                @if (Route::has('register'))
                    <div class="basic-nav-right-2">
                        <a href="{{ route('register') }}">{{ __('Register') }}</a>
                    </div>
                @endif
            @else
                <div class="basic-nav-right-auth">

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
                </div>
            @endguest    
            </div>  
            
        </nav>
        {{-- mostrare barra per la dashboard se loggato --}}
        @auth
             <div class="dashboard-bar1">
            <div>
                <a href="{{ route('admin.index') }}">visita la tua pagina personale</a>
            </div>
        </div>

        <div class="dashboard-bar2">
            <div>
                <a href="{{ route('admin.index') }}"><i class="fas fa-user-shield"></i></a>
            </div>
        </div>
        @endauth

    <header>
    </header>
    <main>
    
        @yield('content')

    </main>

    @include('layouts.partials.footer')

</body>
</html>
