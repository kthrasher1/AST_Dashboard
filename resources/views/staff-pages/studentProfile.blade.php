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
            <div>
                <img class="profile-picture" src="/uploads/avatars/{{ $student_profile->avatar }}" alt="" srcset="">
                <h1 class="student-name">{{$student_profile->name}} </h1>
                <h3 class="student-email">{{$student_profile->email}} </h3>
                <a class="btn btn-primary chat-btn"
                   href="{{ route('staffchat', ['studentid' => $student_profile->id] ) }}">Chat</a>

            </div>
            @endforeach
        </div>
    </div>

    <div class="card" id="module-info-panel" draggable="true">
        <div class="card-header"> <h1 class="module-header">Modules</h1>  <p><i class="fas fa-arrows-alt"></i></p></div>
        <div class="card-body">
                @foreach($module_data as $data)
                <div class="module-list">
                    @if ($data->semester == 1)
                    <div class="modules"> <h1> {{$data->module_1_name}} </h1> </div>
                    <div class="modules"> <h1> {{$data->module_2_name}} </h1> </div>
                    <div class="modules"> <h1> {{$data->module_3_name}} </h1> </div>

                    @else
                    <div class="modules"> <h1> {{$data->module_4_name}} </h1> </div>
                    <div class="modules"> <h1> {{$data->module_5_name}} </h1> </div>
                    <div class="modules"> <h1> {{$data->module_6_name}} </h1> </div>
                    @endif
                </div>
                @endforeach
            </div>
    </div>

    <div class="card" id="attendance-info-panel" draggable="true">
        <div class="card-header"> <h1></h1><p><i class="fas fa-arrows-alt"></i></p> </div>
        <div class="card-body">
            <div class="">

            </div>
        </div>
    </div>

    <div class="card" id="unknown-info-panel" draggable="true">
        <div class="card-header"> <h1>Total Attendance</h1><p><i class="fas fa-arrows-alt"></i></p> </div>
        <div class="card-body">
            <div class="">
                {{ $graph->container() }}
                {{ $graph->script() }}
            </div>
        </div>
    </div>

    <div class="card" id="unknown1-info-panel" draggable="true">
        <div class="card-header"><h1></h1> <p><i class="fas fa-arrows-alt"></i></p> </div>
        <div class="card-body">
            <div class="">
                @foreach($student_data as $data)

                @endforeach
            </div>
        </div>
    </div>

    <div class="card" id="unknown2-info-panel" draggable="true">
        <div class="card-header"> <h1></h1><p><i class="fas fa-arrows-alt"></i></p> </div>
        <div class="card-body">
            <div class="">
                @foreach($student_data as $data)

                @endforeach
            </div>
        </div>
    </div>
</div>
@endsection
