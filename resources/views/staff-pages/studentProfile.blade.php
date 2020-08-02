@extends('layouts.app')


@section('styling')

<style>
    body,html {
        overflow: visible;
    }

</style>
@endsection

@section('content')
<div id="student-profile">

    <div class="card" id="student-info-panel" draggable="true">
        <div class="card-header"> <h1 class="student-header">Student Profile</h1> <p><i class="fas fa-arrows-alt"></i></p> </div>
        <div class="card-body">
            @foreach($student as $student_profile)
            <div class="student-profile">
                <img class="profile-picture" src="/uploads/avatars/{{ $student_profile->avatar }}" alt="" srcset="">
                <h1 class="student-name">{{$student_profile->name}} </h1>
                <h4 class="student-email">{{$student_profile->email}} </h4>
                <a class="btn btn-primary chat-btn"
                   href="{{ route('staffchat', ['studentid' => $student_profile->id] ) }}">Chat</a>

            </div>
            @endforeach
            <hr>
            <div class="module-list">
                <h4>Modules Taken: </h4>
                @if ($module_data->semester == 1)
                    <div class="modules"> <p> {{$module_data->module_1_name}} </p> </div>
                    <div class="modules"> <p> {{$module_data->module_2_name}} </p> </div>
                    <div class="modules"> <p> {{$module_data->module_3_name}} </p> </div>

                @else
                    <div class="modules"> <p> {{$module_data->module_4_name}} </p> </div>
                    <div class="modules"> <p> {{$module_data->module_5_name}} </p> </div>
                    <div class="modules"> <p> {{$module_data->module_6_name}} </p> </div>
                @endif

            </div>
        </div>
    </div>



    <div class="card" id="attendance-info-panel" draggable="true">
        <div class="card-header"> <h1>Risk Levels</h1> <p><i class="fas fa-arrows-alt"></i></p> </div>
        <div class="card-body">
            <div class="risk_level">
                {!! $risk_level->container() !!}
            </div>
        </div>
    </div>

    <div class="card" id="total-attendance" draggable="true">
        <div class="card-header"><h1>Total Attendance</h1> <p><i class="fas fa-arrows-alt"></i></p> </div>
        <div class="card-body">
            <div class="">
                {!! $weekly_graph->container() !!}
            </div>
        </div>
    </div>

    <div class="card" id="unknown1-info-panel" draggable="true">
    <div class="card-header"><h1>Emotions over time</h1> <p><i class="fas fa-arrows-alt"></i></p> </div>
        <div class="card-body">
            <div class="">
                {!! $emotion_graph->container() !!}
            </div>
        </div>
    </div>

</div>
@endsection

@section('graph-script')
{!! $risk_level->script() !!}
{!! $weekly_graph->script() !!}
{!! $emotion_graph->script() !!}
@endsection
