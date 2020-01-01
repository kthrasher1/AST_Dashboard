@extends('layouts.app');

@section('content')
    <h1>You are not allowed here</h1>

    @if (session('status'))
        <div class="alert alert-success" role="alert">
            {{ session('status') }}
        </div>
    @endif
@endsection