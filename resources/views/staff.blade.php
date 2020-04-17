@extends('layouts.app')

@section('content')
<div class="justify-content-center">
    <div class="card" id="staff-dashboard">
        <div class="card-body">

            <h1 class="staff-welcome">Welcome {{ Auth::user()->name }}</h1>
            <h4>Here is your dashboard</h4>

            <div class="card" id="student-display">
                <h2 class="card-header">Your Students</h2>
                <div class="card-body">

                    <div class="table-responsive">
                        <table class="table table-hover center">
                            <tbody>
                                @foreach ($students as $student )
                                <tr>

                                    <td class="cap-first"> {{ $student->name}} </td>
                                    <td> {{ $student->email }} </td>


                                    <td>


                                        <div class="chart">
                                            {{ $linechart->container() }}

                                            {{ $linechart->script()}}

                                        </div>



                                    </td>
                                    <td>

                                        <a class="btn btn-primary chat-btn"
                                            href="{{ route('chatlink', ['studentid' => $student->id] ) }}">Chat</a>
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


        </div>

    </div>
    @endsection
