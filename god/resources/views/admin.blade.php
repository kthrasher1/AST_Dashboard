@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif

                    <h1 style=" text-align: center;">Welcome {{ Auth::user()->name }} </h1>
                    <div class="row">
                        <div class="col-xs-12">
                            <div class="table-responsive">
                                <table class="table table-bordered table-hover">
                                    <thead>
                                        <tr>
                                            <th>Users</th>
                                            <th>Email</th>
                                            <th>Privileges</th>
                                            <th>Edit Privileges</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($users as $user)
                                        @foreach($user->roles as $role)
                                        <tr>
                                        @if($user->id !=Auth::user()->id)  
                                            <td> {{ $user->name }} </td>    
                                            <td> {{ $user->email }} </td>
                                            <td> {{ $role->name }} </td>
                                            <td> 
                                                @if($user->hasRole('admin'))
                                                    <option href="/admin/remove-admin/{{ $user->id }}">Remove Admin</option>
                                                @elseif($user->hasRole('staff'))
                                                    <a href="/admin/make-admin/{{ $user->id }}">Make Admin</a>
                                                    <a href="/admin/make-student/{{ $user->id }}">Make Student</a>
                                                @elseif($user->hasRole('student'))
                                                    <a href="/admin/make-admin/{{ $user->id }}">Make Admin</a>
                                                    <a href="/admin/make-staff/{{ $user->id }}">Make Staff</a>
                                                @endif
                                            </td>
                                        @endif   
                                        </tr>
                                        @endforeach
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endsection
