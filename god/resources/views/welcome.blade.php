<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Dashboard</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Nunito', sans-serif;
                font-weight: 200;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 100vh;
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
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 84px;
            }

            .links > a {
                height: 100px;
                color: black;
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

            a > button {
                background-color: #3490dc;
                border-radius: 0.25rem;
                width: 100px;
                border: 0;
                padding: 10px 0;
                margin: 5px 0;
                text-align: center;
                color: #fff;
                cursor: pointer;
            }

            a > button:hover{
                background: #4bab78;
            }

            h1{
                font-size: 70px;
            }
            
            
        </style>
    </head>
    <body>
        <div class="flex-center position-ref full-height">
            

            <div class="content">
                <h1> Welcome! </h1>
                <div class="links">
                @if (Route::has('login'))
                    @auth

                        @if(Auth::user()->hasRole('admin'))
                            <a class="button" href="{{ url('/admin') }}"><button>Home</button></a>
                        @elseif(Auth::user()->hasRole('staff'))
                            <a class="button" href="{{ url('/staff') }}"><button>Home</button></a>
                        @elseif(Auth::user()->hasRole('student'))
                            <a class="button" href="{{ url('/student') }}"><button>Home</button></a>
                        @endif()

                    @else
                      
                        <a class="button" href="{{ route('login') }}"><button>Login</button></a>
                        @if (Route::has('register'))
                        <a class="button" href="{{ route('register') }}"><button>Register</button></a>
                        @endif
                        
                    @endauth
                </div>
            @endif
                </div>
            </div>
        </div>
    </body>
</html>
