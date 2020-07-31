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
    <div class="row justify-content-center" id="student-modules-page">
        <div class="col-sm-6">
            <div class="card">
                <div class="card-body">
                    <h1> What issues are you having? </h1>
                    <form method="POST" action="/module-issues-detail">
                        @csrf
                        <div class="checkbox-block">
                                <label class="selection-label">

                                    <textarea id="issues" name="moduleIssues" placeholder="Write something..." style="height:300px"></textarea>
                                </label>
                        </div>

                        <input type="hidden" name="_page-num" value="6">

                        <a class="btn btn-secondary back-button" href="/student-back/6"> Back </a>
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
