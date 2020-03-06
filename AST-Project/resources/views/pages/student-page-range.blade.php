@extends('layouts.app')

@section('styling')
<style>
    main, body, html{
        overflow: hidden;
        background: #E1F2F7;
    }

    main{
        display: flex;
        align-items: center;
        justify-content: center;
        height: calc(100vh - 6rem);

    }

    .navbar {
        z-index: 1;
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
        font-size: 26px;
        font-weight: 600;
    }
    h2{
        font-family: 'Open sans', sans-serif;
        font-size: 18px;
    }

    .slider {
        margin: 30px 0 30px 0;
        -webkit-appearance: none;
        width: 100%;
        height: 15px;
        border-radius: 5px;
        background: #d3d3d3;
        outline: none;
        opacity: 1;
    }

    .slider::-webkit-slider-thumb {
        -webkit-appearance: none;
        appearance: none;
        width: 25px;
        height: 25px;
        border-radius: 50%;
        background: #333;
        cursor: pointer;
    }

    .slider::-moz-range-thumb {
        width: 25px;
        height: 25px;
        border-radius: 50%;
        background: #333;
        cursor: pointer;
    }

    .btn{
        margin: 25px;
        width: 100px;
    }

    #emotion-text{
        font-size: 16px;
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
        transform: translate(-50%, -30px);
        opacity: 0.7;
    }

    .bottom-blob {
        width: 50vmax;
        z-index: 0;
        transform: translate(60%, 70%);
        opacity: 0.3;
    }
}

</style>
@endsection

@section('content')

<div class="shape blob">

    <svg xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 310 350">
    <path d="M156.4,339.5c31.8-2.5,59.4-26.8,80.2-48.5c28.3-29.5,40.5-47,56.1-85.1c14-34.3,20.7-75.6,2.3-111  c-18.1-34.8-55.7-58-90.4-72.3c-11.7-4.8-24.1-8.8-36.8-11.5l-0.9-0.9l-0.6,0.6c-27.7-5.8-56.6-6-82.4,3c-38.8,13.6-64,48.8-66.8,90.3c-3,43.9,17.8,88.3,33.7,128.8c5.3,13.5,10.4,27.1,14.9,40.9C77.5,309.9,111,343,156.4,339.5z"/>
    </svg>
</div>

<div class="shape bottom-blob">

    <svg xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 310 350">
    <path d="M156.4,339.5c31.8-2.5,59.4-26.8,80.2-48.5c28.3-29.5,40.5-47,56.1-85.1c14-34.3,20.7-75.6,2.3-111  c-18.1-34.8-55.7-58-90.4-72.3c-11.7-4.8-24.1-8.8-36.8-11.5l-0.9-0.9l-0.6,0.6c-27.7-5.8-56.6-6-82.4,3c-38.8,13.6-64,48.8-66.8,90.3c-3,43.9,17.8,88.3,33.7,128.8c5.3,13.5,10.4,27.1,14.9,40.9C77.5,309.9,111,343,156.4,339.5z"/>
    </svg>
</div>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-body">
                    @mobile
                    <img id="emotion-icons" src="{{URL::asset('/img/neutral.svg')}}" height="150" width="150">
                    <form method="POST" action="/student-range-slider" >
                        @csrf

                        <label class="feeling-range">
                            <h1>How was your week?</h1>
                            <input id="slider" name="rangeSlider" type="range" min="1" max="5" value="3" class="slider">
                            <h3 id="emotion-text"> Okay </h3>
                            <input type="hidden" name="_page-num" value="1">
                        </label>

                        <a class="btn btn-secondary" href="student-page-home"> Back </a>
                        <button class="btn btn-primary" type="submit">Next</button>

                    </form>

                    </div>

                    @elsemobile
                    <p> This is a mobile app </p>
                    @endmobile

                </div>
            </div>

        </div>
    </div>
</div>
<script src="{{ asset('js/slider.js') }}" defer></script>
@endsection

