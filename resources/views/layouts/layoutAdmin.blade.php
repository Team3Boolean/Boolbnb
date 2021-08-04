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
    {{-- <link rel='stylesheet' type='text/css' href='https://api.tomtom.com/maps-sdk-for-web/cdn/6.x/6.14.0/maps/maps.css'/>
    <script src="https://api.tomtom.com/maps-sdk-for-web/cdn/6.x/6.14.0/maps/maps-web.min.js"></script>
    <script src='https://api.tomtom.com/maps-sdk-for-web/cdn/6.x/6.14.0/services/services-web.min.js'></script>
    <script src='https://api.tomtom.com/maps-sdk-for-web/cdn/plugins/SearchBox/3.1.11//SearchBox-web.js'></script> --}}

    <!-- includes jQuery -->
    <script src="http://code.jquery.com/jquery-3.2.1.min.js" crossorigin="anonymous"></script>
    <!-- includes the Braintree JS client SDK -->
    <script src="https://js.braintreegateway.com/web/dropin/1.31.0/js/dropin.min.js"></script>

    

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>

    <nav class="basic-nav-admin">

            <div class="basic-nav-admin-left1">
                <a href="{{ url('/') }}">
                    <img class="img-logo" src="{{ asset('images/logo_lg_gray.png') }}" alt="logo_boolbnb">
                </a>
            </div>

            <div class="basic-nav-admin-left2">
                <a href="{{ url('/') }}">
                    <img class="img-logo" src="{{ asset('images/logo_xs_gray.png') }}" alt="logo_boolbnb">
                </a>
            </div>


           
            <div class="basic-nav-admin-center">
                
                {{ Auth::user()->name }},  sei pronto per una nuova avventura?
               
                    
               
            </div>
                
            <div class="basic-nav-admin-right">
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

    <header>
        

    </header>
    


    <main>

        @yield('content')

    </main>

    @include('layouts.partials.footer')


</body>
</html>
