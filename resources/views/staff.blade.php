@extends('layouts.app')



@section('content')

<div class="justify-content-center">

    <div class="card" id="staff-dashboard">
        <div class="card-body" id="staff-body">
            <div class="student-content">

                <div class="card" id="student-display">
                    <h1 class="card-header" id="student-title">Your Students</h2>
                        <div class="card-body">

                            <div class="table-responsive">
                                <table class="table table-hover center scroll">
                                    <tbody>
                                        @foreach ($students as $student )
                                        <tr>
                                            <td><img class="profile-picture"
                                                    src="/uploads/avatars/{{ $student->avatar }}" alt="" srcset=""></td>
                                            <td class="cap-first"> {{ $student->name}} </td>
                                            <td> {{ $student->email }} </td>
                                            <td>

                                                <a class="btn btn-primary chat-btn"
                                                    href="{{ route('staffchat', ['studentid' => $student->id] ) }}">Chat</a>
                                                <a class="btn btn-primary view-btn"
                                                    href="{{ route('student-profile', ['studentid' => $student->id] ) }}">View
                                                    Profile</a>

                                            </td>

                                            <td>
                                                @if($student->isOnline())

                                                <li class="text-success"> Online </li>

                                                @else

                                                <li class="text-muted" style="list-style-type: circle;"> Offline </li>

                                                @endif

                                            </td>
                                        </tr>
                                    </tbody>
                                    @endforeach
                                </table>


                            </div>


                        </div>
                </div>

                <div id="notice-board">
                    <div class="card">
                        <h1 class="card-header">Notice Board</h1>
                        <div class="card-body">
                            @foreach ($students as $student )
                            @if($student->id == 3)
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                                {{ $student->name}} is risk level is at 5
                            </div>
                            @endif
                            </ul>


                            @endforeach
                        </div>
                        <div>

                        </div>
                    </div>
                </div>


            </div>
            <div class="graphs">
                <div class="card">
                    <h1 class="card-header" id="student-title">Quick Overview</h2>
                        <div class="card-body">

                            <div class="card" id="chart">
                                <div class="card-body">
                                    <div class="chart">
                                        {{ $linechart->container() }}
                                        {{ $linechart->script() }}

                                    </div>
                                </div>
                            </div>


                        </div>
                </div>
            </div>

        </div>

    </div>
    @endsection
