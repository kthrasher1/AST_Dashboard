@extends('layouts.app')

@section('content')
    <div class="justify-content-center">
    <div class="card">
            <div class="card-header">Dashboard</div>
            <div class="card-body">
                <div class="container">

                    @foreach ($staff as $ast_staff )
                        @foreach ($ast_staff->staff_users as $currentStaff)
                            @if($currentStaff->id == Auth::user()->id)
                                @foreach ($users as $user)
                                    @foreach ($user->student as $student )
                                        @if($ast_staff->id == $student->ast_id)
                                            @if($student->pivot->user_id == $user->id)




                                                <div class="table-responsive">
                                                    <table class="table table-bordered table-hover center">
                                                        <thead>
                                                            <tr>

                                                                <th>Student</th>
                                                                <th>Email</th>
                                                                <th>Data</th>
                                                                <th>Actions</th>
                                                                <th>Status</th>


                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <tr>

                                                                <td class="cap-first">  {{ $user->name }} </td>
                                                                <td> {{ $user->email }} </td>

                                                                <td>

                                                                </td>

                                                                <td>

                                                                </td>

                                                                <td>
                                                                @if($user->isOnline())

                                                                    <li class="text-success"> Online </li>

                                                                @else

                                                                <li class="text-muted" style="list-style-type: circle;"> Offline </li>

                                                                @endif

                                                                </td>
                                                            </tr>
                                                        </tbody>
                                                    </table>

                                            @endif
                                        @endif
                                    @endforeach
                                @endforeach
                            @endif
                        @endforeach
                    @endforeach

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
        </div>  --}}

    </div>

</div>
@endsection
