@extends('layouts.app')

@section('content')
<div class="justify-content-center">
    <div class="card">
        <div class="card-header">Dashboard</div>
        <div class="card-body">
            <div class="container">



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
                            @foreach ($student as $students )
                            <tr>

                                <td class="cap-first"> {{ $students->name}} </td>
                                <td> {{ $students->email }} </td>

                                <td>

                                </td>

                                <td>

                                </td>

                                <td>
                                    @if($students->isOnline())

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
