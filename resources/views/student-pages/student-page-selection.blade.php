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
        align-items: center;
        justify-content: center;
        height: calc(100vh - 6rem);

    }


    .card {
        background: rgba(0, 0, 0, 0);
        border: none;
        text-align: center;
    }

    img {
        margin: 20px;
        margin-bottom: 30px;
        max-width: 150px;
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

    label {
        margin: 0;
    }

    .checkbox-block {
        margin: 15px;
        padding: 15px;
    }



    .checkbox {
        -webkit-appearance: none;
        display: inline-flex;
        justify-content: center;
        align-items: center;
    }

    .checkbox:before {
        content: "";

        height: 2rem;
        width: 2rem;

        background: #bdbdbd;
    }

    .checkbox:checked {
        position: relative;
    }

    .checkbox:after {
        content: "";

        position: absolute;

        font-size: 1.5rem;
        font-weight: 700;
        color: #ff4081;
    }

    .checkbox:checked:after {

        color: white;
    }

    .checkbox:focus {
        outline: none;
    }

    .checkbox:checked:before {
        background-color: #039be5;
    }

    .checkbox-round:before {
        border-radius: 100%;
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
                <div class="card-body">
                    <form method="POST" action="/student-selection">
                        @csrf

                        @if($rangeSlider == 1)
                        <img src="{{URL::asset('/img/very-sad.svg')}}" alt="">
                        <h1>Oh no - What made your week terrible</h1>
                        @elseif($rangeSlider == 2)
                        <img src="{{URL::asset('/img/kinda-sad.svg')}}" alt="">
                        <h1>Oh no - What made your week bad?</h1>
                        @elseif($rangeSlider == 3)
                        <img src="{{URL::asset('/img/neutral.svg')}}" alt="">
                        <h1>Okay - What made your day okay?</h1>
                        @elseif($rangeSlider == 4)
                        <img src="{{URL::asset('/img/kinda-happy.svg')}}" alt="">
                        <h1>Awesome - What made your day good?</h1>
                        @elseif($rangeSlider == 5)
                        <img src="{{URL::asset('/img/very-happy.svg')}}" alt="">
                        <h1>Great - What made your day AMAZING?</h1>
                        @endif



                        <div class="checkbox-block">
                                <label class="selection-label">
                                    <input type="checkbox" name="checkboxSelect" id="" value="1" class="checkbox checkbox-round"><span> 1 </span>
                                </label>



                                <label class="selection-label">
                                    <input type="checkbox" name="checkboxSelect1" id="" value="2" class="checkbox checkbox-round"><span> 2 </span>
                                </label>



                                <label class="selection-label">
                                    <input type="checkbox" name="checkboxSelect2" id="" value="3" class="checkbox checkbox-round"><span> 3 </span>
                                </label>



                                <label class="selection-label">
                                    <input type="checkbox" name="checkboxSelect3" id="" value="4" class="checkbox checkbox-round"><span> 4 </span>
                                </label>



                                <label class="selection-label">
                                    <input type="checkbox" name="checkboxSelect4" id="" value="5" class="checkbox checkbox-round"><span> 5 </span>
                                </label>

                        </div>

                            <input type="hidden" name="_page-num" value="2">



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
