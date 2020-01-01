@extends('layouts.app');

@section('content')
    <h1> Hello students </h1>

    @if (session('status'))
        <div class="alert alert-success" role="alert">
            {{ session('status') }}
        </div>
    @endif
@endsection