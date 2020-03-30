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

    .row {
      align-items: center;
      justify-content: center;
    }

    .chat {
      list-style: none;
      margin: 0;
      padding: 0;
    }

    .chat li {
      margin-bottom: 10px;
      padding-bottom: 5px;
      border-bottom: 1px dotted #B3A9A9;
    }

    .chat li .chat-body p {
      margin: 0;
      color: #777777;
    }

    .panel-body {
      overflow-y: scroll;
      height: 350px;
    }

    ::-webkit-scrollbar-track {
      -webkit-box-shadow: inset 0 0 6px rgba(0,0,0,0.3);
      background-color: #F5F5F5;
    }

    ::-webkit-scrollbar {
      width: 12px;
      background-color: #F5F5F5;
    }

    ::-webkit-scrollbar-thumb {
      -webkit-box-shadow: inset 0 0 6px rgba(0,0,0,.3);
      background-color: #555;
    }

    @media only screen and (max-width : 450px) {
      main{
        height: auto;
      }
      .panel {
        margin-top: 10px;
        height: 60%;
      }

      .panel-body{
          height: calc(100vh - 15rem);
          
      }

      .btn{
        height: calc(1.6em + 0.75rem + 2px);
      }

    

      
    }
</style>

@endsection

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-8">
            <div class="panel panel-default">
                <div class="panel-heading">Chats</div>

                <div class="panel-body" v-chat-scroll>
                    <chat-messages :messages="messages" ></chat-messages>
                </div>
                <div class="panel-footer">
                    <chat-form
                        v-on:messagesent="PostMessage"
                        :user="{{ Auth::user() }}"
                    ></chat-form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
