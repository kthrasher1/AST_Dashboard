<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>AST-Dashboard</title>

        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
        <script src="{{ asset('js/app.js') }}" defer></script>

        <!-- Fonts -->
        <link rel="dns-prefetch" href="//fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

        <!-- Styles -->
        <style>
            html, body {
                background: #EFE9F4;
                color: #fff;
                font-family: 'Nunito', sans-serif;
                font-weight: 200;
                height: 100vh;
                margin: 0;
                position: relative;
                overflow: hidden;
            }

            header{
                position: relative;
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

            .container {
                text-align: center;

            }

            .title {
                font-size: 84px;
            }

            .m-b-md {
                margin-bottom: 30px;
            }


            h1{
                font-size: 70px;
            }

            .navbar {

                z-index: 1;

            }



            .bg-shape{
                position: absolute;
                background-image:  linear-gradient(100deg,#7642FF,#4259ff);
                top: -350px;
                right: -110px;
                border-radius: 30%;
                width: 50%;
                height: 800px;
                transform: skew(3deg, 30deg);
                opacity: 0.7;
            }

            .bg-big-circle {
                position: absolute;
                background-image: linear-gradient(100deg,#7642FF,#4259ff);
                top: -400px;
                left: -350px;
                border-radius: 100%;
                width: 800px;
                height: 800px;
                opacity: 0.4;
            }

            .bg-small-circle {
                position: absolute;
                background-image: linear-gradient(100deg,#7642FF,#4259ff);
                top: 150px;
                left: 350px;
                border-radius: 100%;
                width: 100px;
                height: 100px;
                opacity: 0.8;
            }


        </style>
    </head>
    <body>




    <header>
        @include('partials.nav')

        <div class="bg-shape"></div>
        <div class="bg-big-circle"></div>
        <div class="bg-small-circle"></div>

        <div class="row align-items-center">
            <div class="col-12 col-md-5">


                <h1> Welcome!  </h1>
                <div class="links">
                @if (Route::has('login'))
                    @auth

                        @if(Auth::user()->hasRole('admin'))
                            <a class="btn btn-primary" href="{{ url('/admin') }}">Home</a>
                        @elseif(Auth::user()->hasRole('staff'))
                            <a class="btn btn-primary" href="{{ url('/staff') }}">Home</a>
                        @elseif(Auth::user()->hasRole('student'))
                            <a class="btn btn-primary" href="{{ url('/student') }}">Home</a>
                        @endif()

                    @else

                        <a class="btn btn-primary" href="{{ route('login') }}">Login</a>
                        @if (Route::has('register'))
                        <a class="btn btn-primary" href="{{ route('register') }}">Register</a>
                        @endif

                    @endauth
                </div>
            @endif
                </div>
            </div>
        </div>
    </header>
    <section>

    </section>
    <section>

    </section>
    </body>
</html>
