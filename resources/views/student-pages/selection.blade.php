@extends('layouts.app')

@section('styling')

<style>
    main,
    body,
    html {
        background-color: #E1F2F        overflow: hidden;

    }

    main {
        display: flex;
        align-items: center;
        justify-content: center;
        height: calc(100vh - 6rem);

    }

    label {
        margin: 0;
    }

</style>
@endsection

@section('content')
{{-- @include('partials.shapes') --}}
@mobile

<div class="container" id="student-selection-page">
    <div class="row justify-content-center">
        <div class="col-sm-6">

            <div class="card">
                <div class="card-body">
                    <form method="POST" action="/student-selection">
                        @csrf


                            @if($rangeSlider == 1)
                            <div class="image-container">
                                <img class="icon" src="{{URL::asset('/img/very-sad.svg')}}" alt="">
                            </div>
                            <h2>Oh no - What made your week terrible</h2>
                            @elseif($rangeSlider == 2)
                            <div class="image-container">
                                <img class="icon" src="{{URL::asset('/img/kinda-sad.svg')}}" alt="">
                            </div>
                            <h2>Oh no - What made your week bad?</h2>
                            @elseif($rangeSlider == 3)
                            <div class="image-container">
                                <img class="icon" src="{{URL::asset('/img/neutral.svg')}}" alt="">
                            </div>
                            <h2>Okay - What made your week okay?</h2>
                            @elseif($rangeSlider == 4)
                            <div class="image-container">
                                <img class="icon" src="{{URL::asset('/img/kinda-happy.svg')}}" alt="">
                            </div>
                            <h2>Awesome - What made your week good?</h2>
                            @elseif($rangeSlider == 5)
                            <div class="image-container">
                                <img class="icon" src="{{URL::asset('/img/very-happy.svg')}}" alt="">
                            </div>
                            <h2>Great - What made your week amazing?</h2>
                            @endif

                        <div class="checkbox-block">
                                <div class="home">
                                    <input type="checkbox" name="checkboxSelect1" id="home" value="Homelife" class="checkbox checkbox-round">
                                    <label for="home"><i class="fas fa-home"></i></label>
                                    <p> Home Life</p>
                                </div>




                                <div class="uni">
                                    <input type="checkbox" name="checkboxSelect2" id="uni" value="University" class="checkbox checkbox-round">
                                    <label for="uni"><i class="fas fa-university"></i></label>
                                    <p> University </p>
                                </div>



                                <div class="rel">
                                    <input type="checkbox" name="checkboxSelect3" id="rel" value="Relationship" class="checkbox checkbox-round">
                                    <label for="rel"><i class="fas fa-user-friends"></i></label>
                                    <p> Relationships </p>
                                </div>



                                <div class="finance">
                                    <input type="checkbox" name="checkboxSelect4" id="finance" value="Finance" class="checkbox checkbox-round">
                                    <label for="finance"><i class="fas fa-wallet"></i></label>
                                    <p> Finance </p>
                                </div>



                                <div class="travel">
                                    <input type="checkbox" name="checkboxSelect5" id="travel" value="Travel" class="checkbox checkbox-round">
                                    <label for="travel"><i class="fas fa-route"></i></label>
                                    <p> Travel </p>
                                </div>

                                <label class="other">
                                    <input type="checkbox" name="checkboxSelect6" id="other" value="Other" class="checkbox checkbox-round">
                                    <label for="other"><i class="fas fa-plus"></i></label>
                                    <p> Other </p>
                                </label>

                        </div>

                            <input type="hidden" name="_page-num" value="2">


                    <div class="links" >
                        <a class="btn btn-secondary back-button" href="/student-back/2"> Back </a>
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
