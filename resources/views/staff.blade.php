@extends('layouts.app')

@section('content')
<div class="justify-content-center" >
    <div class="card" id="staff">
        <div class="card-body">
            <div class="container">

                <h1 class="staff-welcome">Welcome {{ Auth::user()->name }}</h1>

                <h2>Your Students</h2>
                <div class="table-responsive">
                    <table class="table table-hover center">
                        <thead>
                            <tr>

                                <th>Name</th>
                                <th>Email</th>
                                <th>Data</th>
                                <th>Actions</th>
                                <th>Status</th>


                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($students as $student )
                            <tr>

                                <td class="cap-first"> {{ $student->name}} </td>
                                <td> {{ $student->email }} </td>


                                <td>
                                    {{$student->id}}

                                </td>
                                <td>

                                    <a class="btn btn-primary" href="{{ route('chatlink', ['studentid' => $student->id] ) }}" >Chat</a>

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

                <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.1/Chart.min.js" charset="utf-8">
                </script>
                {{ $barchart->script() }}
                {{ $linechart -> script() }}
                {{ $linechart_users -> script() }}
                {{ $piechart->script() }}
            </div>
        </div>
    </div> --}}

</div>

</div>
@endsection
