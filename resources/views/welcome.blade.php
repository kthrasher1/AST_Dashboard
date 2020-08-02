@extends('layouts.app')

<div class="bg-obj shape welcome"></div>
<div class="bg-obj left-side-shape welcome"></div>
<div class="bg-obj big-circle welcome"></div>
<div class="bg-obj small-circle welcome"></div>
<div class="bg-obj right-side-circle welcome"></div>

@section('content')
<div id="welcome-screen">

                <div class="welcome-section">

                        <div class="welcome-text-container">
                            <h1 class="welcome-header">Welcome to Check-in</h1>
                            <p class="welcome-text-desc" class="mb-4 pb-1 welcome-text">
                                Check-in is a student and staff dashboard application built to make sure students are engaging with their studies.
                                Giving academic support tutors real insight on how their student is progressing and how they are doing on a personal level, something that has been lost due to technology.
                                This software package provides the staff and students with a dashboard, a chat system and many more features to help bridge the gap.
                            </p>

                            <div class="button-reg">
                                <div class="login-links">
                                    @if (Route::has('login'))
                                    @auth

                                    @if(Auth::user()->hasRole('admin'))
                                        <a class="btn btn-primary welcome-button" href="{{ url('/admin') }}">Home</a>
                                    @elseif(Auth::user()->hasRole('staff'))
                                        <a class="btn btn-primary welcome-button" href="{{ url('/staff') }}">Home</a>
                                    @elseif(Auth::user()->hasRole('student'))
                                        <a class="btn btn-primary welcome-button" href="{{ url('/student') }}">Home</a>
                                    @endif

                                    @else

                                    @if (Route::has('register'))
                                        <a class="btn btn-bg welcome-button" href="{{ route('register') }}">Get Started</a>
                                    @endif

                                    @endauth
                                    @endif
                                </div>
                            </div>

                            <div class="welcome-image-container">
                                <img class="welcome-image" src="{{URL::asset('/img/staff-side.png')}}" alt="Image of staff dashboard">
                            </div>

                        </div>
                </div>

                <div class="feature-section">

                    <div class="feature-one">
                        <div class="icon">
                            <i class="fas fa-comments"></i>
                        </div>
                        <h2 class="feature-one-header">
                            In-built Chat
                        </h2>
                        <p class="feature-one-desc">
                            To stop students and staff having to exit the application to interact with one another,
                            the dashboard has an inbuild chat functionality, allowing the interaction to happen
                            through the dashboard.
                        </p>
                    </div>

                    <div class="feature-two">
                        <div class="icon">
                            <i class="fas fa-undo"></i>
                        </div>
                        <h2 class="feature-two-header">
                            Personal Feedback Loop
                        </h2>
                        <p class="feature-two-desc">
                            The feedback loop is one of the main features of the dashboard, it allows the staff member
                            to understand what is going on with the student and what might be affecting their engagment.
                        </p>
                    </div>

                    <div class="feature-three">
                        <div class="icon">
                            <i class="fas fa-chart-bar"></i>
                        </div>
                        <h2 class="feature-three-header">
                           Data Visualisation
                        </h2>
                        <p class="feature-three-desc">
                            Data Visualisation was used to show data in a way that is understandable, Charts.js has been
                            used to make this a relatity and has been implemented with in the staff dashboard.
                        </p>
                    </div>
                </div>

                <div class="mobile-section">
                    <div class="mobile-section-container">
                        <h1 class="mobile-section-header">What are you waiting for! </h1>
                        <div class="mobile-section-desc">
                            <p>
                                Lorem ipsum dolor sit amet consectetur adipisicing elit. Quod repellendus voluptatem, maxime ducimus perferendis,
                                iusto suscipit deserunt architecto placeat modi doloremque deleniti nihil corrupti maiores dolorem praesentium dicta doloribus? Laborum.
                                Lorem ipsum, dolor sit amet consectetur adipisicing elit.
                                Blanditiis minus quam eius dolorem adipisci tenetur voluptates sed, animi natus veritatis cum nesciunt id repellendus itaque sapiente architecto, sequi esse perspiciatis!
                            </p>

                            <div class="login-links">
                                @if (Route::has('login'))
                                @auth

                                @if(Auth::user()->hasRole('admin'))
                                    <a class="btn btn-primary welcome-button" href="{{ url('/admin') }}">Home</a>
                                @elseif(Auth::user()->hasRole('staff'))
                                    <a class="btn btn-primary welcome-button" href="{{ url('/staff') }}">Home</a>
                                @elseif(Auth::user()->hasRole('student'))
                                    <a class="btn btn-primary welcome-button" href="{{ url('/student') }}">Home</a>
                                @endif

                                @else

                                    <a class="btn btn-bg welcome-button" href="{{ route('login') }}">Login</a>
                                @if (Route::has('register'))
                                    <a class="btn btn-bg welcome-button" href="{{ route('register') }}">Register</a>
                                @endif

                                @endauth
                                @endif
                            </div>

                        </div>
                    </div>

                    <div class="mobile-section-image-container">
                        <img src="{{URL::asset('/img/mobile-image.png')}}" alt="" class="mobile-section-image">
                        <div class="bg-obj big-circle-mobile"></div>
                        <div class="bg-obj circle-mobile "></div>
                        <div class="bg-obj circle-small-mobile "></div>
                    </div>


                </div>


                @include('partials.footer')

</div>




 @endsection
