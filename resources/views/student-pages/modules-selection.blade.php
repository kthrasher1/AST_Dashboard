@extends('layouts.app')

@section('styling')

<style>
    main,
    body,
    html {
        overflow: hidden;

    }

    main {
        display: flex;
        align-items: center;
        justify-content: center;
        height: calc(100vh - 6rem);

    }

</style>
@endsection

@section('content')

@mobile

<div class="container" id='student-module-selector'>
    <div class="row justify-content-center">
        <div class="col-sm-6">
            <div class="card">
                <div class="card-body">
                    <form method="POST" action="/module-selection">
                        @csrf
                        <h1> Which modules are you having issues with? </h1>
                        <div class="checkbox-block">

                            @if($studentData->semester == 1)
                            <div class="selection-label">
                                <input type="checkbox" name="modSelect1" id="mod"
                                    value="{{$studentData->module_1_name}}" class="checkbox checkbox-round">
                                <label class="mod-p"> {{$studentData->module_1_name}} </label>
                            </div>



                            <div class="selection-label">
                                <input type="checkbox" name="modSelect2" id="mod"
                                    value="{{$studentData->module_2_name}}" class="checkbox checkbox-round">
                                <label class="mod-p"> {{$studentData->module_2_name}} </label>
                            </div>



                            <div class="selection-label">

                                <input type="checkbox" name="modSelect3" id="mod"
                                    value="{{$studentData->module_3_name}}" class="checkbox checkbox-round">

                                <label class="mod-p"> {{$studentData->module_3_name}} </label >
                            </div>

                            @elseif($studentData->semester == 2)

                            <div class="selection-label">
                                <input type="checkbox" name="modSelect4" id="mod"
                                    value="{{$studentData->module_4_name}}" class="checkbox checkbox-round">
                                    <label class="mod-p">{{$studentData->module_4_name}} </label>
                            </div>



                            <div class="selection-label">
                                <input type="checkbox" name="modSelect5" id="mod"
                                    value="{{$studentData->module_5_name}}" class="checkbox checkbox-round">
                                    <label class="mod-p">{{$studentData->module_5_name}} </label>
                            </div>


                            <div class="selection-label">
                                <input type="checkbox" name="modSelect6" id="mod"
                                    value="{{$studentData->module_6_name}}" class="checkbox checkbox-round">
                                <label class="mod-p"> {{$studentData->module_6_name}} </label>
                            </div>

                            @endif

                        </div>

                        <input type="hidden" name="_page-num" value="4">


                        <div class="links">
                            <a class="btn btn-secondary back-button" href="/student-back/4"> Back </a>
                            <button class="btn btn-primary next-button" type="submit">Next</button>
                        </div>

                    </form>


                </div>
            </div>

        </div>
    </div>
</div>

@elsemobile

<h1> You need a mobile phone </h1>

@endmobile
@endsection
