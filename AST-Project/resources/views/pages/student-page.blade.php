@extends('layouts.app')

@section('styling')
<style>
    main, body, html {
        background-color: #99ffcc;
        overflow: hidden;
        
    }

    main{
        display: flex;
        align-items: center;
        justify-content: center;
        height: calc(100vh - 6rem);
    
    }


    .card{
        background: rgba(0, 0, 0, 0);
        border: none;
        text-align: center;
    }

    img{
        margin: 20px;
        margin-bottom: 30px;
    }


    h1{
        font-size: 26px;
        font-weight: 600;
    }
    h2{
        font-family: 'Open sans', sans-serif;
        font-size: 18px;
    }

    .slider {
        margin: 30px 0 30px 0;
        -webkit-appearance: none;  
        width: 100%; 
        height: 15px;
        border-radius: 5px;  
        background: #d3d3d3; 
        outline: none;
        opacity: 0.7; 
        -webkit-transition: .2s; 
        transition: opacity .2s;
    }

    .slider::-webkit-slider-thumb {
        -webkit-appearance: none;
        appearance: none;
        width: 25px;
        height: 25px;
        border-radius: 50%; 
        background: #333;
        cursor: pointer;
    }

    .slider::-moz-range-thumb {
        width: 25px;
        height: 25px;
        border-radius: 50%;
        background: #333;
        cursor: pointer;
    }

    .btn{
        margin: 25px;
        width: 100px;
    }

   
</style>
@endsection

@section('script')


@endsection

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-body">
                    @mobile
                    <img id="emotion-icons"src="{{URL::asset('/img/neutral.svg')}}" height="150" width="150">
                    <form method="POST" >
                        
                        <label class="feeling-range"> 
                            <h1>How was you day?</h1>
                            <input id="slider" type="range" min="1" max="10" value="5" class="slider">
                        </label>
                        
                        
                    </form>
                    <button class="btn btn-success" href="">Next</button>
                    </div>

                    
                    
                    @elsemobile 
                    <p> This is a mobile app </p>
                    @endmobile

                </div>
            </div>
            
        </div>
    </div>
</div>
<script src="{{ asset('js/slider.js') }}" defer></script>
@endsection

