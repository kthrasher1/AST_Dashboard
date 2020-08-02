@extends('layouts.app')

@section('content')
<div class=" justify-content-center">
    <div class="card" id="admin-dashboard">
        <div class="card-body" id="admin-body">



            @if (session('status'))
            <div class="alert alert-success" role="alert">
                {{ session('status') }}
            </div>
            @endif
            <div class="user-content">
                <div class="card" id="user-display">
                    <h1 class="card-header" id="user-title">Users</h2>
                        <div class="card-body">
                            <div class="row">

                                <div class="table-responsive">
                                    <table class="table table-hover center scroll">
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

                                                        <li class="text-muted" style="list-style-type: circle;"> Offline
                                                        </li>

                                                        @endif
                                                    </td>
                                                    <td class="cap-first"> {{ $role->name }} </td>
                                                    <td>
                                                        <a class="btn btn-primary admin-btn"
                                                            href="/admin/update/{{$user->id}}">Update</a>

                                                        @if($user->hasRole('admin') || ($user->hasRole('staff') ||
                                                        ($user->hasRole('student'))))
                                                        <a class="btn btn-secondary admin-btn"
                                                            href="/admin/remove-role/{{$user->id}}">Remove
                                                            Privileges</a>

                                                        @elseif($user->hasRole('unassigned'))
                                                        <a class="btn btn-primary admin-btn"
                                                            href="/admin/give-admin/{{$user->id}}">Make
                                                            Admin</a>
                                                        <a class="btn btn-secondary admin-btn"
                                                            href="/admin/make-staff/{{$user->id}}">Make
                                                            Staff</a>
                                                        <a class="btn btn-secondary admin-btn"
                                                            href="/admin/make-student/{{$user->id}}">Make
                                                            Student</a>
                                                        @endif

                                                        <a class="btn btn-danger admin-btn"
                                                            onclick="return confirm('Please Click OK to Confirm.')"
                                                            href="/admin/delete/{{$user->id}}">Delete</a>

                                                    </td>
                                                </tr>
                                                @endforeach
                                            @endforeach
                                        </tbody>
                                    </table>

                                    <div>{{ $users->links() }}</div>

                                </div>

                            </div>

                        </div>
                </div>

                <div id="notice-board">
                    <div class="card">
                        <h1 class="card-header">Notice Board</h1>
                        <div class="card-body">

                            @if(count($notify) == 0)
                                <p class="no-notifs">You have no notifications!</p>
                            @else

                            @foreach($notify as $notif)
                            <div class="alert alert-success notif" role="alert">
                                <a type="button" href="{{ route('markedNotification', ['notifID' => $notif->id]) }}" class="close"> &times;</a>
                                Please Assign: {{$notif->data['name']}} {{$notif->data['email']}}
                            </div>
                            @endforeach

                            @endif

                            @include('partials.alerts')

                        </div>
                        <div>

                        </div>
                    </div>
                </div>
            </div>
@endsection
