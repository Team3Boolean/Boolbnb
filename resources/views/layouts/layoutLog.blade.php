<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    {{-- <title>{{ config('app.name', 'Laravel') }}</title> --}}
    <title>@yield('pageTitle')</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>

        
            <nav class="basic-nav-log">

                {{-- <div>
                    <a href="{{ url('/') }}">
                        home
                    </a>
                </div> --}}
                 <div class="basic-nav-log-left1">
                <a href="{{ url('/') }}">
                    <img class="img-logo" src="{{ asset('images/logo_lg_gray.png') }}" alt="logo_boolbnb">
                </a>
            </div>

            <div class="basic-nav-log-left2">
                <a href="{{ url('/') }}">
                    <img class="img-logo" src="{{ asset('images/logo_xs_gray.png') }}" alt="logo_boolbnb">
                </a>
            </div>

                <div class="basic-nav-log-center">
                    @guest
                        <a href="{{ route('login') }}">{{ __('Login') }}</a>
                        @if (Route::has('register'))
                                
                            <a href="{{ route('register') }}">{{ __('Register') }}</a>
                            
                        @endif
                        @else
                                
                            <a href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                        {{ Auth::user()->name }}
                            </a>

                                
                            <div aria-labelledby="navbarDropdown">
                                <a href="{{ route('logout') }}"
                                    onclick="event.preventDefault();
                                    document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                            @csrf
                                        </form>
                                    </div>
                            
                    @endguest

                </div>
            </nav>

        <header>
        </header>
        

        <main>
           
            @yield('content')

        </main>

         @include('layouts.partials.footer')

</body>
</html>
