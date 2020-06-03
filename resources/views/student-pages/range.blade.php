@extends('layouts.app')

@section('styling')
<style>
    main, body, html{
        overflow: hidden;
    }

    main{
        display: flex;
        align-items: center;
        justify-content: center;
        height: calc(100vh - 6rem);
    }

</style>
@endsection

@section('content')

@include('partials.shapes')

<div class="container" id='student-range-page'>
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="image-container">
                <img id="emotion-icons" src="{{URL::asset('/img/neutral.svg')}}" height="150" width="150">
            </div>
            <div class="card">
                <div class="card-body">
                    @mobile
                    <form method="POST" action="/student-range-slider" >
                        @csrf

                        <label class="feeling-range">
                            <h1>How was your week?</h1>
                            <input id="slider" name="rangeSlider" type="range" min="1" max="5" value="3" class="slider">
                            <h3 id="emotion-text"> Okay </h3>
                            <input type="hidden" name="_page-num" value="1">
                        </label>

                        <a class="btn btn-secondary back-button" href="/student-back/1"> Back </a>
                        <button class="btn btn-primary next-button" type="submit">Next</button>

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
