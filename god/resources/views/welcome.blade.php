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

        html,
        body {
            background: #fff;
            color: #3e396b;
            font-family: 'Nunito', sans-serif;
            font-weight: 200;
            position: relative;
            overflow: hidden;
            margin: 0;
        }

        header {
            position: relative;
        }

        .jumbotron-two .container{
            height: 400px;
            margin-top: 200px;
        }

        .jumbotron-two {
            height: 70vh;
        }

        .welcome-header {
            font-size: 70px;
            text-align: center
        }

        .navbar {
            z-index: 1;
            box-shadow: 0 9px 68px 0 rgba(62, 57, 107, .1);
        }

        .navbar a {
            color: inherit !important;
        }

        .bg-obj {
            position: absolute;
            background-image: linear-gradient(100deg, #7642FF, #3B60E4);
        }

       .shape {
            top: -350px;
            right: -110px;
            border-radius: 30%;
            width: 50%;
            height: 800px;
            transform: skew(3deg, 30deg);
            opacity: 0.7;
        }

        .big-circle {
            top: -400px;
            left: -350px;
            border-radius: 100%;
            width: 900px;
            height: 900px;
            opacity: 0.4;
        }

        .small-circle {
            top: 250px;
            left: 400px;
            border-radius: 100%;
            width: 100px;
            height: 100px;
            opacity: 0.8;
        }

        .btn-gradient {
            background-image: linear-gradient(100deg, #7642FF, #3B60E4);
            color: #fff !important;
        }

    </style>
</head>

<body>

    <header>
        @include('partials.nav')

        <div class="bg-obj shape"></div>
        <div class="bg-obj big-circle"></div>
        <div class="bg-obj small-circle"></div>


        <section class="jumbotron-two jumbotron-fluid">
            <div class="container">
                <div class="row justify-content-center align-items-center">
                    <div class="col-11 col-md-7 mb-3">
                        <h1 class="welcome-header"> Welcome to Dashboard </h1>
                        <p class="mb-3">
                            Lorem ipsum dolor, sit amet consectetur adipisicing elit. Quas aspernatur quam neque totam voluptates 
                            facilis deserunt eaque distinctio! Voluptatem a eligendi 
                            possimus iure sunt similique, amet illo voluptate error in.
                        </p>
                        <div class="links" style="text-align: center;">
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

                            <a class="btn btn-gradient href="{{ route('login') }}">Login</a>
                            @if (Route::has('register'))
                            <a class="btn btn-gradient" href="{{ route('register') }}">Register</a>
                            @endif

                            @endauth
                        </div>
                        @endif
                    </div>
                     </div>
                   </div>
                </div>
            </div>
            </div>
        </section>
    </header>
    <section>

    </section>
    <section>

    </section>
</body>

</html>
