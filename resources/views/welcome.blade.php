@extends('layouts.app')

@section('styling')
<style>

    .content{
        margin-top: 125px;
        width: 300px;
        height: auto;
    }

</style>
@endsection

@include('partials.shapes')

@section('content')

        <section class="jumbotron-two jumbotron-fluid welcome-jumbotron">
            <div class="container">
                <div class="row justify-content-center ">
                    <div class="content col-md-7">
                        <h1 class="welcome-header">Welcome to Check-in</h1>
                        <p class="mb-4 pb-1 welcome-text">
                            Lorem ipsum dolor, sit amet consectetur adipisicing elit. Quas aspernatur quam neque totam
                            voluptates
                            facilis deserunt eaque distinctio! Voluptatem a eligendi possimus iure sunt similique, amet
                            illo voluptate error in.
                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Sed officiis eveniet odio dolorem
                            nisi sequi atque temporibus

                        </p>
                        <div class="welcome-links">
                            @if (Route::has('login'))
                            @auth

                            @if(Auth::user()->hasRole('admin'))
                                <a class="btn btn-primary welcome-button" href="{{ url('/admin') }}">Home</a>
                            @elseif(Auth::user()->hasRole('staff'))
                                <a class="btn btn-primary welcome-button" href="{{ url('/staff') }}">Home</a>
                            @elseif(Auth::user()->hasRole('student'))
                                <a class="btn btn-primary welcome-button" href="{{ url('/student') }}">Home</a>
                            @endif

                            @else

                                <a class="btn btn-bg welcome-button" href="{{ route('login') }}">Login</a>
                            @if (Route::has('register'))
                                <a class="btn btn-bg welcome-button" href="{{ route('register') }}">Register</a>
                            @endif

                            @endauth
                        </div>
                        @endif
                    </div>
                </div>
        </section>


 @endsection
