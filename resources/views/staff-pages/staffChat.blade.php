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


@include('partials.shapes')
@section('content')

<div class="container" id="chat">
    <div class="chat-content">
        <div>
            <div class="card">
                <chat-app :user = "{{auth()->user()}}"> </chat-app>
            </div>
            <div class="link">
                <a class="btn btn-secondary back-button" href="{{ url()->previous() }}"> Back </a>
            </div>
        </div>
    </div>
    @endsection
