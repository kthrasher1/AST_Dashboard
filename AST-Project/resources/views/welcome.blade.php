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

        .jumbotron-two {
            height: 70vh;
        }

        .content{
            margin-top: 200px;
            width: 300px;
            height: auto;
        }

        .welcome-header {
            font-size: 4em;

        }

        .bg-obj {
            position: absolute;
            background-image: linear-gradient(100deg, #7642FF, #3B60E4);
        }

        .navbar {
            z-index: 1;
            box-shadow: 0 9px 68px 0 rgba(62, 57, 107, .1);

        }

        .navbar .navbar-toggler{
            border: none;
            stroke: #3556cd;
        }

        .navbar .nav-link {
            color: inherit !important;

            &:hover {
                text-decoration: underline;
            }
        }

        .shape {
            top: -250px;
            right: -200px;
            border-radius: 30%;
            width: 50%;
            height: 800px;
            transform: skew(3deg, 36deg);
            opacity: 0.7;
            z-index: 0;
        }

        .left-side-shape {
            top: -400px;
            left: -600px;
            border-radius: 30%;
            width: 50%;
            height: 800px;
            transform: skew(3deg, 36deg);
            opacity: 0.2;
        }

        .big-circle {
            top: -400px;
            left: -350px;
            border-radius: 100%;
            width: 900px;
            height: 900px;
            opacity: 0.4;
        }

        .right-side-circle {
            top: 500px;
            right: 350px;
            border-radius: 100%;
            width: 100px;
            height: 100px;
            opacity: 0.8;
        }

        .small-circle {
            top: 250px;
            left: 400px;
            border-radius: 100%;
            width: 100px;
            height: 100px;
            opacity: 0.8;
        }

        .links{
            text-align: center;
        }

        .links .btn{
            width: 100px;
        }

        .btn-bg {
            background: #3B60E4;
            color: #fff;
        }

        .btn-bg:hover {
            color: #fff;
            background: #3556cd;
        }

        @media only screen and (max-width : 450px) {

            body{
                overflow-y: visible;
                overflow-x: hidden;
            }

            p{
                text-align: center;
            }

            .jumbotron-two{
                height: 100%;
            }

            .content{
                margin-top: 170px;
            }

            .welcome-header{
                font-size: 3em;
                text-align: center;
            }

            .small-circle{
                display: none;
            }

            .right-side-circle{
                display: none;
            }

            .left-side-shape{
                display: none;
            }

            .shape{
                display: none;
            }

            .big-circle{
                transform: translate(-50%, -115%);
                top: 50%;
                left: 50%;
                opacity: 0.6;
            }
        }

    </style>
</head>

<body>

    <header>
        @include('partials.nav')

        <div class="bg-obj shape"></div>
        <div class="bg-obj left-side-shape"></div>
        <div class="bg-obj big-circle"></div>
        <div class="bg-obj small-circle"></div>
        <div class="bg-obj right-side-circle"></div>


        <section class="jumbotron-two jumbotron-fluid">
            <div class="container">
                <div class="row justify-content-center ">
                    <div class="content col-md-7">
                        <h1 class="welcome-header">Welcome to Dashboard</h1>
                        <p class="mb-4 pb-1">
                            Lorem ipsum dolor, sit amet consectetur adipisicing elit. Quas aspernatur quam neque totam
                            voluptates
                            facilis deserunt eaque distinctio! Voluptatem a eligendi possimus iure sunt similique, amet
                            illo voluptate error in.
                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Sed officiis eveniet odio dolorem
                            nisi sequi atque temporibus
                            ipsa ullam distinctio odit pariatur quibusdam, voluptas iure, ex id! Saepe, quos ratione?
                        </p>
                        <div class="links">
                            @if (Route::has('login'))
                            @auth

                            @if(Auth::user()->hasRole('admin'))
                                <a class="btn btn-primary" href="{{ url('/admin') }}">Home</a>
                            @elseif(Auth::user()->hasRole('staff'))
                                <a class="btn btn-primary" href="{{ url('/staff') }}">Home</a>
                            @elseif(Auth::user()->hasRole('student'))
                                <a class="btn btn-primary" href="{{ url('/student') }}">Home</a>
                            @endif

                            @else

                                <a class="btn btn-bg" href="{{ route('login') }}">Login</a>
                            @if (Route::has('register'))
                                <a class="btn btn-bg" href="{{ route('register') }}">Register</a>
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
