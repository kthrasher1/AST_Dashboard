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

<div class="blob shape">
    <svg class="blob2" xmlns="http://www.w3.org/2000/svg" width="600" height="600" viewBox="0 0 600 600">
        <path d="M416 239.2C456.5 303 499.5 371.5 480.6 428.2 461.7 485 380.8 530 297.8 531.3 214.8 532.5 129.7 490 93.7 423.4 57.8 356.8 71.1 266.2 113.7 201.1 156.2 136 228.1 96.5 283 106.3 337.8 116.2 375.6 175.3 416 239.2Z" /></svg>

</div>

<div class="rotate-blob shape">
    <svg class="blob2" xmlns="http://www.w3.org/2000/svg" width="600" height="600" viewBox="0 0 600 600">
        <path d="M416 239.2C456.5 303 499.5 371.5 480.6 428.2 461.7 485 380.8 530 297.8 531.3 214.8 532.5 129.7 490 93.7 423.4 57.8 356.8 71.1 266.2 113.7 201.1 156.2 136 228.1 96.5 283 106.3 337.8 116.2 375.6 175.3 416 239.2Z" /></svg>

</div>


<div class="upside-blob shape">
    <svg class="blob2" xmlns="http://www.w3.org/2000/svg" width="600" height="600" viewBox="0 0 600 600">
        <path d="M416 239.2C456.5 303 499.5 371.5 480.6 428.2 461.7 485 380.8 530 297.8 531.3 214.8 532.5 129.7 490 93.7 423.4 57.8 356.8 71.1 266.2 113.7 201.1 156.2 136 228.1 96.5 283 106.3 337.8 116.2 375.6 175.3 416 239.2Z" /></svg>

</div>

<div class="big-upside-blob shape">
    <svg class="blob2" xmlns="http://www.w3.org/2000/svg" width="600" height="600" viewBox="0 0 600 600">
        <path d="M416 239.2C456.5 303 499.5 371.5 480.6 428.2 461.7 485 380.8 530 297.8 531.3 214.8 532.5 129.7 490 93.7 423.4 57.8 356.8 71.1 266.2 113.7 201.1 156.2 136 228.1 96.5 283 106.3 337.8 116.2 375.6 175.3 416 239.2Z" /></svg>

</div>


<div class="container">
    <div class="row justify-content-center">
        <div class="col-sm-6">
            <div class="card">
                <div class="card-body">
                        <form method="POST" action="/student-page-selection" >
                            @csrf
                            @if($rangeSlider == 1)
                                    <img src="{{URL::asset('/img/very-sad.svg')}}" alt="" >
                                    <h1>Oh no! What made it bad? </h1>

                                @elseif($rangeSlider == 2)
                                    <img src="{{URL::asset('/img/kinda-sad.svg')}}" alt="" >
                                    <h1>That's great </h1>
                                @elseif($rangeSlider == 3)
                                    <img src="{{URL::asset('/img/neutral.svg')}}" alt="" >
                                    <h1>Okay! </h1>
                                @elseif($rangeSlider == 4)
                                    <img src="{{URL::asset('/img/kinda-happy.svg')}}" alt="" >
                                    <h1>That's okay! </h1>
                                @elseif($rangeSlider == 5)
                                    <img src="{{URL::asset('/img/very-happy.svg')}}" alt="" >
                                    <h1>That's great! </h1>
                            @endif

                            <label class="selection-label">
                                <input type="checkbox" id="" name="" value="">
                                <input type="checkbox" id="vehicle1" name="vehicle1" value="Bike">
                                <input type="checkbox" id="vehicle1" name="vehicle1" value="Bike">
                                <input type="checkbox" id="vehicle1" name="vehicle1" value="Bike">
                                <input type="checkbox" id="vehicle1" name="vehicle1" value="Bike">
                                <input type="checkbox" id="vehicle1" name="vehicle1" value="Bike">
                                <input type="checkbox" id="vehicle1" name="vehicle1" value="Bike">
                                <h1></h1>
                                <input type="hidden" name="_page-num" value="2">
                            </label>

                            <a class="btn btn-secondary" href="{{ url()->previous() }}"> Back </a>
                            <button class="btn btn-primary" type="submit">Next</button>

                        </form>


                </div>
            </div>

        </div>
    </div>
</div>

@elsemobile

    <h1> You need a mobile phone </h1>

@endmobile
@endsection
