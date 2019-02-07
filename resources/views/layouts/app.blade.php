<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">


    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

        <style>
            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }
            .top-right {
                position: absolute;
                text-align: center;
                top: 18px;
                background: rgba(255,255,255,0.9);
                border-style: solid;
                border-color: black;
                border-width: 1px;
            }
            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 13px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }
            .navbar{
                margin-left: 50%;
                margin-bottom: 38px;
            }
        </style>

    <script>
        window.Laravel = {!! json_encode([
            'csrfToken'=> csrf_token(),
            'user'=> [
                'authenticated' => auth()->check(),
                'id' => auth()->check() ? auth()->user()->id : null,
                'name' => auth()->check() ? auth()->user()->name : null,
                ]
            ])
        !!};
    </script>
</head>
<body>
    <div id="app">
        <nav class="navbar">
                 <div class="flex-center position-ref full-height">
                 @if (Route::has('login'))
                <div class="top-right links">
                        <a href="{{url('/')}}">Home</a>
                    @auth
                        <a href="{{ url('/chat') }}">Chat</a>
                    @endauth
                        <a href="{{url('agreement')}}">Terms of use</a>
                        <a href="{{url('about')}}">About</a>
                    @auth
                        <a href="{{ url('/logout') }}"> Logout </a>
                    @else
                        <a href="{{ route('login') }}">Login</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}">Register</a>
                        @endif
                    @endauth
                </div>
            @endif
            </div>
        </nav>
        <main class="py-4">
            @yield('content')
        </main>
    </div>
</body>
</html>
