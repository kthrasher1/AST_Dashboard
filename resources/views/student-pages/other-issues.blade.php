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

<div class="container" id="student-issues">
    <div class="row justify-content-center">
        <div class="col-sm-6">
            <div class="card">
                <div class="card-body">
                    <form method="POST" action="/student-other-issues">
                        @csrf
                        <h1> Are you having any other issues? </h1>
                        <div class="checkbox-block">
                            <label class="selection-label">

                                <textarea id="issues" name="issues" placeholder="Write something.." style="height:300px"></textarea>
                            </label>
                        </div>

                        <input type="hidden" name="_page-num" value="7">

                        <a class="btn btn-secondary back-button" href="/student-back/7"> Back </a>
                        <button class="btn btn-primary next-button" type="submit">Submit</button>

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
