@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-body">
                    @mobile
                    
                    <form method="POST" >
                    
                        <label class="feeling-range"> 
                            <p>How was you day?</p>
                            <input type="range" min="1" max="10" value="0" class="slider">
                        </label>
                    </form>
                    </div>
                    @elsemobile 
                    <p> This is a mobile app </p>
                    @endmobile

                </div>
            </div>
           
        </div>
    </div>
</div>
@endsection