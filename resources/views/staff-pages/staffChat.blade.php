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
        height: calc(100vh - 6rem);
        align-items: center;
        justify-content: center;

    }

    @media only screen and (max-width : 450px) {
        main {
            height: auto;
        }


    }

</style>

@endsection

@section('content')

<div class="container" id="chat">
    <div class="row">
        <div class="col-md-8 ">
            <div class="card">
                @foreach($students as $student)

                <div class="card-header">
                    <img class="user-image" src="/uploads/avatars/{{ $student->avatar }}" alt="Picture of the user you are talking to" srcset="">
                    {{ $student->name }}

                </div>

                <div class="card-body scroll" v-chat-scroll>

                    <chat-messages :messages="messages" :user="{{ $currentUser }}" :otheruser="{{ $student->id }}">
                    </chat-messages>

                </div>
                <div class="card-footer">
                    <chat-form v-on:messagesent="PostMessage" :user="{{ Auth::user() }}"></chat-form>
                </div>

                @endforeach
            </div>
            <div class="link">
                <a class="btn btn-secondary back-button" href="{{ url()->previous() }}"> Back </a>
            </div>
        </div>
    </div>
    @endsection
