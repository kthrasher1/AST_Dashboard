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
        <div class="card-header"> Student Info <i class="fas fa-arrows-alt"></i> </div>
        <div class="card-body">
            @foreach($student as $student_profile)
            <div>
                <img class="profile-picture" src="/uploads/avatars/{{ $student_profile->avatar }}" alt="" srcset="">
                <h1 class="student-name">{{$student_profile->name}} </h1>
                <h3 class="student-email">{{$student_profile->email}} </h3>
                <a class="btn btn-primary chat-btn"
                    href="{{ route('chatlink', ['studentid' => $student_profile->id] ) }}">Chat</a>

            </div>
            @endforeach
        </div>
    </div>

    <div class="card" id="module-info-panel" draggable="true">
        <div class="card-header"> Modules  <i class="fas fa-arrows-alt"></i></div>
        <div class="card-body">
            <div class="module_list">
                @foreach($student_data as $data)
                <ul>
                    <li> {{$data->module_1_name}} </li>
                    <li> {{$data->module_2_name}} </li>
                    <li> {{$data->module_3_name}} </li>
                    <li> {{$data->module_4_name}} </li>
                    <li> {{$data->module_5_name}} </li>
                    <li> {{$data->module_6_name}} </li>
                </ul>
                @endforeach
            </div>
        </div>
    </div>

    <div class="card" id="attendance-info-panel" draggable="true">
        <div class="card-header"> <i class="fas fa-arrows-alt"></i> </div>
        <div class="card-body">
            <div class="">
                @foreach($student_data as $data)

                @endforeach
            </div>
        </div>
    </div>

    <div class="card" id="unknown-info-panel" draggable="true">
        <div class="card-header"> <i class="fas fa-arrows-alt"></i> </div>
        <div class="card-body">
            <div class="">
                @foreach($student_data as $data)

                @endforeach
            </div>
        </div>
    </div>

    <div class="card" id="unknown1-info-panel" draggable="true">
        <div class="card-header"> <i class="fas fa-arrows-alt"></i> </div>
        <div class="card-body">
            <div class="">
                @foreach($student_data as $data)

                @endforeach
            </div>
        </div>
    </div>

    <div class="card" id="unknown2-info-panel" draggable="true">
        <div class="card-header"> <i class="fas fa-arrows-alt"></i> </div>
        <div class="card-body">
            <div class="">
                @foreach($student_data as $data)

                @endforeach
            </div>
        </div>
    </div>
</div>

{{--  <div class="card">
            <div class="card-header">Dashboard</div>
            <div class="card-body">
                <h1 class="welcome-text">Welcome {{ Auth::user()->name }} </h1>
<div class="container">
    <div class="barchart">
        {{ $barchart->container() }}
    </div>

    <div class="piechart">
        {{ $piechart->container() }}
    </div>

    <div class="linechart">
        {{ $linechart->container() }}
    </div>

    <div class="linechart-users">
        {{ $linechart_users->container() }}
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.1/Chart.min.js" charset="utf-8"></script>
    {{ $barchart->script() }}
    {{ $linechart -> script() }}
    {{ $linechart_users -> script() }}
    {{ $piechart->script() }}
</div>
</div>
</div> --}}




@endsection
