@extends('layouts.app')

@section('content')
<div class="container">
    <div class="justify-content-center">
        <div class="card">
            <div class="card-header">Dashboard</div>
            <div class="card-body">
                <h1>Welcome {{ Auth::user()->name }} </h1>

                <div class="app">
                    {{ $attendanceGraph->container() }}
                </div>
                <div class="graph">
                    {{ $attendanceGraph->container() }}
                </div>
                    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.1/Chart.min.js" charset="utf-8"></script>
                    {{ $attendanceGraph->script() }}
                </div>
        </div>
    </div>
</div>

</div>
@endsection
