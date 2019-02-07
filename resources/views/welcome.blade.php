<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Mika Chat App</title>

        <!--Cookie banner-->
        <link rel="stylesheet" type="text/css" href="//cdnjs.cloudflare.com/ajax/libs/cookieconsent2/3.1.0/cookieconsent.min.css" />
        <script src="//cdnjs.cloudflare.com/ajax/libs/cookieconsent2/3.1.0/cookieconsent.min.js"></script>
        <script>
            window.addEventListener("load", function(){
            window.cookieconsent.initialise({
            "palette": {
                "popup": {
                "background": "#000"
                },
                "button": {
                "background": "#f1d600"
                }
            },
            "position": "bottom-left"
            })});
        </script>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet" type="text/css">

        <!-- Styles -->
        <style>
            html, body {
                background-image: url("/images/bg3.jpg");
                background-repeat: no-repeat;
                background-size: 100%;
                color: #636b6f;
                font-family: 'Nunito', sans-serif;
                font-weight: 200;
                height: 100vh;
                margin: 0;
            }

            /*Reasom for 93 is so the footer gets visible*/
            .full-height {
                height: 93vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
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

            .content {
                text-align: center;
            }

            .title {
                font-size: 84px;
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
            .m-b-md {
                margin-bottom: 30px;
            }

        </style>
    </head>
    <body>
        <div class="flex-center position-ref full-height">
            @if (Route::has('login'))
                <div class="top-right links">
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

            <div class="content" id="front-page-content-box">
                <div class="title m-b-md">
                    Public Chat
                </div>

                <div class="links">
                    @auth
                        <a href="{{route('chat')}}" style="font-size: 18px;"> Go to chat </a>
                    @else
                        <a href="{{route('login')}}">Login in order to chat!</a>
                    @endauth
                </div>
            </div>
        </div>
        <footer>
                <p style="text-align: center;">Created by Mika Lehtinen, WCM17 2019.</p>
        </footer>
    </body>

</html>
