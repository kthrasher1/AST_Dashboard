

@desktop


@section('styling')

<style>

    body, html{
        height: 100vh;
        display: flex;
        justify-content: center;
        align-items: center;
    }

    nav {
        display: none !important;
    }

    #mobile-only{
        display: flex;
        justify-content: center;
        align-items: center;
    }

</style>
@endsection

@include('partials.shapes')

@section('content')
<div id="mobile-only">
    <div class="card">
        <div class="card-body">
            <h1> You need a mobile phone </h1>
            <p> Lorem ipsum dolor sit amet consectetur, adipisicing elit. Sed harum ratione porro eum, tempore culpa dolore perferendis ipsam cumque optio eius. Qui quis quidem dolore modi eveniet hic molestias minus.</p>
        </div>
    </div>
<div>
@endsection

@elsedesktop

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
                        <a class="btn btn-primary  student-btn" href="{{ route('studentChat') }}" >
                            <span class="text-chat">Chat</span>

                            @if($ast->unread != 0)
                            <span class="unread">{{ $ast->unread}}</span>
                            @endif
                        </a>
                        </div>
                    </div>

                </div>
            </div>
        </div>

            <div class="card" id="student-cards">



                <div class="card-header"> <h4> How was your week? </h4> </div>
                <div class="card-body">
                    <p class="card-text"> Please complete this weeks check-in, tell us how you are doing!</p>
                    <a class="btn btn-primary student-btn" href="student-page">Start</a>
                </div>

            </div>
    </div>
</div>
@endsection

@enddesktop
