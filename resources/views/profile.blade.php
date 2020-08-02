@extends('layouts.app')

@section('styling')

<style>
    body,
    html {
        overflow: visible;
    }

    main {
        margin-top: 10px;
        height: auto;
        align-items: center;
        justify-content: center;

    }

</style>
@endsection
@include('partials.shapes')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-sm-8">
            <div id="user-profile">
                <h1 class="user-name">{{ $user->name }}</h1>


                <form enctype="multipart/form-data" action="/profile" method="POST">
                    <img class="user-image" src="/uploads/avatars/{{ $user->avatar }}" alt="" srcset="">
                    @csrf
                    <p style="text-align:center;">Edit image</p>
                    <div class="edit-user-image">
                        <div class="file-upload">
                            <input type="file" name="avatar" />
                            <i class="fas fa-camera"></i>
                        </div>

                        <button type="submit" class="btn btn-primary profile-button"> Update Image </button>
                    </div>
                </form>
            <hr>
                <form class="update-password" method="POST" action="{{ route('UpdatePassword') }}">
                    <h4>Update Password</h4>
                    @csrf
                    <div class="form-group{{ $errors->has('current-password') ? ' has-error' : '' }}">
                        <label for="new-password" class="control-label">Current Password</label>

                        <input id="current-password" type="password" class="form-control" name="current-password"
                            >

                        @if ($errors->has('current-password'))
                        <span class="help-block">
                            <strong>{{ $errors->first('current-password') }}</strong>
                        </span>
                        @endif

                    </div>

                    <div class="form-group{{ $errors->has('new-password') ? ' has-error' : '' }}">
                        <label for="new-password" class="control-label">New Password</label>


                        <input id="new-password" type="password" class="form-control" name="new-password" >

                        @if ($errors->has('new-password'))
                        <span class="help-block">
                            <strong>{{ $errors->first('new-password') }}</strong>
                        </span>
                        @endif

                    </div>

                    <div class="form-group">
                        <label for="new-password-confirm" class="control-label">Confirm New Password</label>

                        <input id="new-password-confirm" type="password" class="form-control"
                            name="new-password_confirmation" >

                    </div>

                    <div>
                        <button type="submit" class="btn btn-primary">
                            Save
                        </button>

                        <div class="back-button">
                            <a class="btn btn-secondary" href="{{ url()->previous() }}"> Back </a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
