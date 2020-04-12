@extends('layouts.app')

@section('styling')

<style>


    main, body, html {
        background-color: #E1F2F7;
        overflow: hidden;

    }

    main{
        display: flex;
        align-items: center;
        justify-content: center;
        height: calc(100vh - 6rem);

    }


    .card{
        background: rgba(0, 0, 0, 0);
        border: none;
        text-align: center;
    }

    img{
        margin: 20px;
        margin-bottom: 30px;
    }



    h1{
        /*font-size: 24px;*/
        font-weight: 600;
    }
    h2{
        font-family: 'Open sans', sans-serif;
        font-size: 18px;
    }

    .bg-obj {
        position: fixed;
        background: #FA7C92;
    }

    .navbar{
        z-index: 1 !important;
    }

    .shape{
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

    .btn{
        margin: 30px;
        width: 100px;
    }



</style>
@endsection

@section('content')

@mobile
<div class="container" id="student-start-page">
    <div class="row justify-content-center">
        <div class="col-sm-6">
            <div class="card">
                <div class="card-body">
                    <img class="logo" src="{{URL::asset('/img/very-happy-blink.svg')}}">

                    <h1> Hey {{Auth::user()->name}}! </h1>
                    <h2> How has your week been? </h2>

                    <div class="links" >
                        <a class="btn btn-secondary" href="{{ url()->previous() }}"> Back </a>
                        <a class="btn btn-primary" href="student-page-range">Start</a>
                    </div>
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
