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
                        <p> Which modules are you having issues with? </p>
                        <div class="checkbox-block">
                            @foreach($studentData as $student)

                            @if($student->semester == 1)
                            <label class="selection-label">
                                <input type="checkbox" name="checkboxSelect" id="mod_1" value="{{$student->module_1_name}}"
                                    class="checkbox checkbox-round"><span> {{$student->module_1_name}}  </span>
                            </label>



                            <label class="selection-label">
                                <input type="checkbox" name="checkboxSelect1" id="mod_2" value="{{$student->module_2_name}}"
                                    class="checkbox checkbox-round"><span> {{$student->module_2_name}} </span>
                            </label>



                            <label class="selection-label">
                                <input type="checkbox" name="checkboxSelect2" id="mod_3" value="{{$student->module_3_name}}"
                                    class="checkbox checkbox-round"><span> {{$student->module_3_name}} </span>
                            </label>

                            @elseif($student->semester == 2)

                            <label class="selection-label">
                                <input type="checkbox" name="checkboxSelect3" id="mod_1" value="{{$student->module_4_name}}"
                                    class="checkbox checkbox-round"><span> {{$student->module_4_name}} </span>
                            </label>



                            <label class="selection-label">
                                <input type="checkbox" name="checkboxSelect4" id="mod_2" value="{{$student->module_5_name}}"
                                    class="checkbox checkbox-round"><span> {{$student->module_5_name}} </span>
                            </label>


                            <label class="selection-label">
                                <input type="checkbox" name="checkboxSelect" id="mod_3" value="{{$student->module_6_name}}"
                                    class="checkbox checkbox-round"><span> {{$student->module_6_name}} </span>
                            </label>

                            @endif


                            @endforeach
                        </div>

                        <input type="hidden" name="_page-num" value="4">


                        <div class="links">
                            <a class="btn btn-secondary back-button" href="{{ url()->previous() }}"> Back </a>
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
