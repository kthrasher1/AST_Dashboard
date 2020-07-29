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
                                        @foreach ($students as $student)
                                        <tr>
                                            <td><img class="profile-picture"
                                                    src="/uploads/avatars/{{ $student->avatar }}" alt="" srcset=""></td>
                                            <td class="cap-first"> {{ $student->name}} </td>
                                            <td> {{ $student->email }} </td>
                                            <td>
                                                <a class="btn btn-primary chat-btn" href="{{ route('staffchat') }}">
                                                    <span class="text-chat">Chat</span>
                                                    @if($student->unread != 0)
                                                    <span class="unread">{{$student->unread}}</span>
                                                    @endif
                                                </a>
                                            </td>

                                            <td>
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
                        <div class="card-header"><h1> Notice Board </h1></div>

                        <div class="card-body">
                            @if(count($notify) == 0)
                                <p class="no-notif">You have no notifications!</p>
                            @else

                            @foreach($notify as $notif)
                                <div class="alert alert-success notif" role="alert">
                                    <a type="button" class="close" href="{{ route('markedNotification', ['notifID' => $notif->id]) }}">
                                        <span aria-hidden="true">&times;</span>
                                    </a>

                                    <p> {{$notif->data['name']}} has finished their weekly checkup ({{$notif->created_at->format('Y-m-d')}}), their risk level is: {{$notif->data['risk_level']}}. </p>

                                    <button data-path="{{ route('quick-view', ['checkup_id' => $notif->data['checkup_id']]) }}"
                                        class="btn btn-primary load-ajax-modal"
                                        role="button"
                                        data-toggle="modal" data-target="#student-quick-view">
                                      Quick View
                                     </button>
                                </div>
                            @endforeach
                            @endif
                        </div>
                        <div>

                        </div>
                    </div>
                </div>


            </div>
            <div class="graphs">
                <div class="card">
                    <h2 class="card-header" id="student-title">Quick Overview</h2>
                        <div class="card-body">

                            {{--  <div class="card" id="attendance-chart">
                                <div class="card-body">
                                    <div class="chart">

                                        {!! $attendanceChart->container() !!}
                                        {!! $attendanceChart->script() !!}

                                    </div>
                                </div>
                            </div>  --}}

                            <div class="card" id="weekly-chart">
                                <div class="card-body">
                                    <div class="chart">
                                        {!! $weeklyChart->container() !!}
                                    </div>
                                </div>
                            </div>
                    </div>
                </div>
            </div>

        </div>


    </div>


    <!-- Modal -->
    <div class="modal fade" id="student-quick-view" tabindex="-1" role="dialog" aria-labelledby="quick-view-title" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close quick-view-close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="chart">

                </div>
            </div>
        </div>

        </div>

    </div>


</div>


@include('partials.footer')
@endsection

@section('graph-script')
    {!! $weeklyChart->script() !!}
@endsection
