@extends('layouts.app')

@section('styling')

<style>
    body,
    html {
        overflow: visible;
    }

    main {
        margin-top: 10px;
        height: auto;
        align-items: center;
        justify-content: center;

    }

</style>
@endsection

@section('content')
    <div class="row justify-content-center" id="waiting">
            <div class="card">
                <div class="card-body">
                    <div class="col-sm-2">
                        <div class="loader loader-circle"></div>
                      </div>
                   <div class="wait here"> <h4> Our admins are very busy! Please wait here until you are assigned a role. </h4> </div>

                </div>
            </div>
        </div>
    </div>

@endsection
