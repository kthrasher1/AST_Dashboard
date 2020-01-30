@extends('layouts.app')

@section('content')

<div class="container">
    <div class=" justify-content-center">
        <div class="">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif

                    <h1 class="welcome-text">Welcome {{ Auth::user()->name }} </h1>
                    <div class="row">
                      
                            <div class="table-responsive">
                                <table class="table table-bordered table-hover center">
                                    <thead>
                                        <tr>
                                            <th>Users</th>
                                            <th>Email</th>
                                            <th>Status</th>
                                            <th>Privileges</th>
                                            <th>Actions</th>
                                        
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($users as $user)
                                        @foreach($user->roles as $role)
                                        <tr>
                                          
                                            <td class="cap-first"> {{ $user->name }} </td>    
                                            <td> {{ $user->email }} </td>
                                            <td> 
                                            @if($user->isOnline())

                                                <li class="text-success"> Online </li>
                                            
                                            @else

                                                <li class="text-muted" style="list-style-type: circle;"> Offline </li>
                                            
                                            @endif
                                            </td>
                                            <td class="cap-first"> {{ $role->name }} </td>
                                            <td> 
                                            <a class="btn btn-primary" href="/admin/update/{{$user->id}}">Update</a>

                                                @if($user->hasRole('admin') || ($user->hasRole('staff') || ($user->hasRole('student'))))
                                                    <a class="btn btn-warning" href="/admin/remove-role/{{$user->id}}">Remove Privileges</a>

                                                @elseif($user->hasRole('unassigned'))
                                                    <a class="btn btn-primary" href="/admin/give-admin/{{$user->id}}">Make Admin</a>
                                                    <a class="btn btn-secondary" href="/admin/make-staff/{{$user->id}}">Make Staff</a>
                                                    <a class="btn btn-secondary" href="/admin/make-student/{{$user->id}}">Make Student</a>
                                                @endif

                                                <a class="btn btn-danger" href="/admin/delete/{{$user->id}}">Delete</a>
                                                
                                            </td>
                                     
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
