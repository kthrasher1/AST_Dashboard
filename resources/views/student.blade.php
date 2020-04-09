@extends('layouts.app')

@section('styling')

<style>
    main,
    body,
    html {
        background-color: #E1F2F7;
        overflow: hidden;

    }

    main {
        display: flex;
        height: calc(100vh - 6rem);
        align-items: center;
        justify-content: center;

    }


    .card {
        text-align: center;
        margin-bottom: 15px;
        margin-top: 15px;

    }

    h1 {
        /*font-size: 24px;*/
        font-weight: 600;
    }

    h2 {
        font-family: 'Open sans', sans-serif;
        font-size: 18px;
    }

    .bg-obj {
        position: fixed;
        background: #FA7C92;
    }

    .navbar {
        z-index: 1 !important;
    }

    .shape {
        position: fixed;
        top: 0;
        left: 0;
        fill: #FA7C92;
    }

    .blob {
        width: 50vmax;
        z-index: 0;
        transform: translate(-10%, -40%) scale(0.4);
        opacity: 0.4;
    }

    .rotate-blob {
        width: 50vmax;
        z-index: 0;
        transform: translate(-30%, -50%) scale(0.8) rotate(46deg);
        opacity: 0.6;
    }

    .upside-blob {
        width: 50vmax;
        z-index: 0;
        transform: translate(20%, 50%) scale(0.4);
        opacity: 0.4;
    }

    .big-upside-blob {
        width: 50vmax;
        z-index: 0;
        transform: translate(30%, 60%) scale(0.8) rotate(46deg);
        opacity: 0.6;
    }

    .btn {
        margin: 30px;
        width: 100px;
    }

</style>
@endsection

@section('content')

@mobile

<div class="blob shape">
    <svg class="blob2" xmlns="http://www.w3.org/2000/svg" width="600" height="600" viewBox="0 0 600 600">
        <path
            d="M416 239.2C456.5 303 499.5 371.5 480.6 428.2 461.7 485 380.8 530 297.8 531.3 214.8 532.5 129.7 490 93.7 423.4 57.8 356.8 71.1 266.2 113.7 201.1 156.2 136 228.1 96.5 283 106.3 337.8 116.2 375.6 175.3 416 239.2Z" />
        </svg>

</div>

<div class="rotate-blob shape">
    <svg class="blob2" xmlns="http://www.w3.org/2000/svg" width="600" height="600" viewBox="0 0 600 600">
        <path
            d="M416 239.2C456.5 303 499.5 371.5 480.6 428.2 461.7 485 380.8 530 297.8 531.3 214.8 532.5 129.7 490 93.7 423.4 57.8 356.8 71.1 266.2 113.7 201.1 156.2 136 228.1 96.5 283 106.3 337.8 116.2 375.6 175.3 416 239.2Z" />
        </svg>

</div>


<div class="upside-blob shape">
    <svg class="blob2" xmlns="http://www.w3.org/2000/svg" width="600" height="600" viewBox="0 0 600 600">
        <path
            d="M416 239.2C456.5 303 499.5 371.5 480.6 428.2 461.7 485 380.8 530 297.8 531.3 214.8 532.5 129.7 490 93.7 423.4 57.8 356.8 71.1 266.2 113.7 201.1 156.2 136 228.1 96.5 283 106.3 337.8 116.2 375.6 175.3 416 239.2Z" />
        </svg>

</div>

<div class="big-upside-blob shape">
    <svg class="blob2" xmlns="http://www.w3.org/2000/svg" width="600" height="600" viewBox="0 0 600 600">
        <path
            d="M416 239.2C456.5 303 499.5 371.5 480.6 428.2 461.7 485 380.8 530 297.8 531.3 214.8 532.5 129.7 490 93.7 423.4 57.8 356.8 71.1 266.2 113.7 201.1 156.2 136 228.1 96.5 283 106.3 337.8 116.2 375.6 175.3 416 239.2Z" />
        </svg>

</div>


<div class="container">
    <div class="row justify-content-center">
        <div class="col-sm-6">
            <div class="card">
                <div class="card-header"> Your AST </div>
                <div class="card-body">


                    @foreach($staff as $ast)


                        <p>{{$ast->name}}</p>
                        <p>{{$ast->email}}</p>


                    @endforeach


                </div>
            </div>

            <div class="card">
                <div class="card-header"> Chat With Your AST</div>
                <div class="card-body">
                    <p class="card-text">Click the button to chat with your AST</p>
                    <a class="btn btn-primary" href="chat">Chat</a>
                </div>
            </div>

            <div class="card">
                <div class="card-header"> How was your week? </div>
                <div class="card-body">
                    <p class="card-text">Tell us about your week! The good, bad and ugly. (We don't judge)</p>
                    <a class="btn btn-primary" href="student-page">Start</a>
                </div>
            </div>

        </div>
    </div>
</div>

@elsemobile
<div class="card">
    <div class="card-body">
        <h1> You need a mobile phone </h1>
    </div>
</div>
@endmobile
@endsection
