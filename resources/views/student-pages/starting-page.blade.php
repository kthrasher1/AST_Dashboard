@extends('layouts.app')

@section('styling')

<style>
    main, body, html {
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

@include('partials.shapes')

@section('content')
@mobile
<div class="container" id="student-start-page">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="image-container">
                <img class="icon" src="{{URL::asset('/img/very-happy-blink.svg')}}">
            </div>
            <div class="card">

                <div class="card-body">


                    <h1> Hey {{Auth::user()->name}}! </h1>
                    <h2> How has your week been? </h2>

                    <div class="links" >
                        <a class="btn btn-secondary back-button" href="/student-page-home"> Back </a>
                        <a class="btn btn-primary next-button" href="student-page-range">Start</a>
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
