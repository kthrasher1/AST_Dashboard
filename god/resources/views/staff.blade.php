@extends('layouts.app')

@section('content')
<div class="container">
    <div class="justify-content-center">
        <div class="card">
            <div class="card-header">Dashboard</div>
            <div class="card-body">
                <h1 class="welcome-text">Welcome {{ Auth::user()->name }} </h1>

                <div class="app">
                    {{ $barchart->container() }}
                </div>
                <div class="graph">
                    {{ $piechart->container() }}
                </div>
                <div class="graph">
                    {{ $linechart->container() }}
                </div>
                <div class="graph">
                    {{ $linechart_users->container() }}
                </div>

                    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.1/Chart.min.js" charset="utf-8"></script>
                    {{ $barchart->script() }}
                    {{ $linechart -> script() }}
                    {{ $linechart_users -> script() }}
                    {{ $piechart->script() }}
                </div>
        </div>
    </div>
</div>

</div>
@endsection
