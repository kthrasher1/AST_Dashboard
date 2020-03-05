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
        /*font-size: 24px;*/
        font-weight: 600;
    }
    h2{
        font-family: 'Open sans', sans-serif;
        font-size: 18px;
    }

    .bg-obj {
        position: fixed;
        background-image: linear-gradient(100deg, #7642FF, #3B60E4);
    }

    .navbar{
        z-index: 1 !important;
    }

    .big-circle {
        transform: translate(-50%, -115%);
        top: 50%;
        left: 50%;
        opacity: 0.6;
        border-radius: 100%;
        width: 900px;
        height: 900px;
        z-index: 0;
    }

    .btn{
        width: 100px;
    }

    

</style>
@endsection

@section('content')

@mobile

<div class="bg-obj big-circle"></div>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-sm-6">
            <div class="card">
                <div class="card-body">
                    <img src="{{URL::asset('/img/very-happy-blink.svg')}}" height="150" width="150">
                    <h1> Hi there! </h1>
                    <h2> Tell me about your day. </h2> 
                    <a class="btn btn-primary" href="student-page">Start</a> <!-- This is going to have to be a route --> 
                </div>
            </div>
           
        </div>
    </div>
</div>

@elsemobile

    <h1> You need a mobile phone </h1> 

@endmobile
@endsection