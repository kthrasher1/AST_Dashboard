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
                <img class="logo" src="{{URL::asset('/img/very-happy-blink.svg')}}">
            </div>
            <div class="card">

                <div class="card-body">
                    @foreach($staff as $ast)

                        <h1> Congrats {{Auth::user()->name}}! </h1>
                        <h2> You've completed this weeks check-in </h2>

                        <p> If you need any further assistance remember you can contact your AST at anytime using the chat window, here's a link if you want to talk now</p>
                        <a class="btn btn-primary  student-btn" href="{{ route('studentChat', ['staffid' => $ast->id] ) }}" >Chat</a>

                        <p> Remember that the university offers mental health services and services to help your studies, you are not alone. click this link to find out more </p>
                        <a class="btn btn-primary  student-btn" href="" >University Services</a>

                        <div class="links">
                            <a class="btn btn-secondary back-button" href="{{ url()->previous() }}"> Back to the check-in</a>
                            <a class="btn btn-primary next-button" href="student-page-completed">Back Home</a>
                        </div>

                    @endforeach
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
