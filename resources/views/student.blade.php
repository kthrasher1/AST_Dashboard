@extends('layouts.app')

@section('styling')

<style>
    body,html {
        overflow: visible;
    }

    main {
        margin-top: 10px;
        height: calc(100vh - 6rem);
        align-items: center;
        justify-content: center;

    }

</style>
@endsection

@mobile
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-sm-6">
            <div class="student-info">
                <img class="user-image" src="/uploads/avatars/{{ Auth::user()->avatar }}" alt="" srcset="">
                <h1 class="welcome-text">Welcome <span class="student-name"> {{ Auth::user()->name }}</span>! </h1>
                <a href="{{ route('profile') }}" >Edit Profile</a>
            </div>
            <div class="card" id="student-cards">
                <div class="card-header"> <h4>AST</h4> </div>
                <div class="card-body" id="staff-info">
                    <div class="staff-info">
                        <div class="staff-profile">
                            @foreach($staff as $ast)
                            <img class="staff-image" src="/uploads/avatars/{{ $ast->avatar }}" alt="" srcset="">

                                <span class="info">
                                    <p>{{$ast->name}}</p>
                                    <p>{{$ast->email}}</p>
                                </span>

                            @endforeach
                        </div>

                    <div class="chat-container">
                        <div class="chat">
                            <a class="btn btn-primary  student-btn" href="{{ route('studentChat', ['staffid' => $ast->id] ) }}" >Chat</a>
                        </div>
                    </div>

                </div>
            </div>
        </div>

            <div class="card" id="student-cards">

                <div class="card-header"> <h4> How was your week? </h4> </div>
                <div class="card-body">
                    <p class="card-text"> Lorem ipsum dolor sit amet consectetur adipisicing elit. Sed officiis eveniet odio dolorem</p>
                    <a class="btn btn-primary student-btn" href="student-page">Start</a>
                </div>

            </div>
    </div>
</div>
@endsection
@elsemobile
<div class="card">
    <div class="card-body">
        <h1> You need a mobile phone </h1>
    </div>
</div>
@endmobile
