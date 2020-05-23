@extends('layouts.app')

@section('styling')

<style>
    main,
    body,
    html {
        overflow: hidden;

    }

    main {
        display: flex;
        align-items: center;
        justify-content: center;
        height: calc(100vh - 6rem);

    }


</style>
@endsection

@section('content')

@mobile

<div class="container" id="student-modules-page">
    <div class="row justify-content-center">
        <div class="col-sm-6">
            <div class="card">
                <div class="card-body">
                    <form method="POST" action="/student-modules">
                        @csrf
                        <h1> Are you having any issues with your modules?  </h1>
                        <div class="checkbox-block">

                                <div class="selection-container">
                                    <input type="radio" name="radioSelect" id="no" value="1" class="radio-btn">
                                    <br>
                                    <p> No </p>
                                </div>



                                <div class="selection-container">
                                    <input type="radio" name="radioSelect" id="yes" value="2" class="radio-btn">
                                    <br>
                                    <p> Yes </p>
                                </div>

                        </div>

                        <input type="hidden" name="_page-num" value="3">



                        <a class="btn btn-secondary back-button" href="{{ url()->previous() }}"> Back </a>
                        <button class="btn btn-primary next-button" type="submit">Next</button>

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
