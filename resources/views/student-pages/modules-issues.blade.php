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
                    <form method="POST" action="/module-issues">
                        @csrf
                        <h1> Do you want to expand on the issues with those modules? </h1>
                        <div class="checkbox-block">

                            <div class="selection-container">
                                <input type="radio" name="radioSelect" id="no" value="0" class="radio-btn">
                                <br>
                                <p> No </p>
                            </div>



                            <div class="selection-container">
                                <input type="radio" name="radioSelect" id="yes" value="1" class="radio-btn">
                                <br>
                                <p> Yes </p>
                            </div>

                        </div>

                        <input type="hidden" name="_page-num" value="5">


                        <div class="links">
                            <a class="btn btn-secondary back-button" href="/student-back/5"> Back </a>
                            <button class="btn btn-primary next-button" type="submit">Next</button>
                        </div>

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
