@extends('layouts.app')

@section('styling')

<style>

    main, body, html {
            overflow: hidden;

    }

    main{
        display: flex;
        height: calc(100vh - 6rem);
        align-items: center;
        justify-content: center;

    }

    @media only screen and (max-width : 450px) {
      main{
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

                <div class="card-body scroll" v-chat-scroll>

                <chat-messages :messages="messages" :user1="{{ $currentUser }}" :otheruser1="{{ $studentid }}"  ></chat-messages>

                </div>
                <div class="card-footer">
                    <chat-form
                        v-on:messagesent="PostMessage"
                        :user="{{ Auth::user() }}"
                    ></chat-form>
                </div>
        </div>
    </div>
</div>
@endsection
