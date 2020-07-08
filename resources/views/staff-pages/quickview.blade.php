<div id="student-quick-view-container">

            <div class="student-content">
                @foreach ($student as $s )
                    <div class="student-quick-info">
                        <div> <img src="/uploads/avatars/{{$s->avatar }}" alt="" class="student-profile-picture" width="50px" height="50px"> </div>
                        <h1 class="student-name">{{$s->name}}</h1>
                        <h4 class="student-email">{{$s->email}}</h4>
                    </div>
                @endforeach
                <div class="student-data-container">

                    <div class="card #risk-level">
                        <div class="card-header"> Student Risk Level </div>
                        @if($studentData->risk_level >= 0 && $studentData->risk_level <= 2 )
                            <div class="risk-level bad card-body">
                                    Risk Level:
                                    <span> {{$studentData->risk_level}} </span>

                            </div>
                        @elseif($studentData->risk_level > 2 && $studentData->risk_level <= 4)
                            <div class="risk-level okay card-body">
                                Risk Level
                                <span> {{$studentData->risk_level}} </span>
                            </div>
                        @elseif($studentData->risk_level == 5 )
                            <div class="risk-level good card-body">
                                Risk Level:
                                <span> {{$studentData->risk_level}} </span>
                            </div>
                        @endif
                    </div>

                    <div class="card #issues">
                        <div class="card-header"></div>
                        <div class="issues card-body">
                            {{$studentData->issue_selector}}
                        </div>
                    </div>

                    <div class="card #other-issues">
                        <div class="card-header">Other Issues </div>
                        <div class="other-issues card-body">
                            @if($studentData->other_selector != null)
                                {{$studentData->other_selector}}
                            @else
                                No other issues submitted
                            @endif
                        </div>
                    </div>

                    <div class="card #module-issue">
                        <div class="card-header">Module Issues</div>
                        <div class="module-issues card-body">
                            @if($studentData->module_bool == true)
                                {{$studentData->module_selector}}

                                @if($studentData->module_expand != null)
                                    {{$studentData->module_detail}}
                                @else
                                    No explaination was submitted
                                @endif
                            @else
                                No issues with modules submitted
                            @endif
                        </div>
                    </div>



                    <div class="card #total-attendance">
                        <div class="card-header">Current Total Attendance</div>
                        <div class="total-attendance card-body">
                            {{$moduleData->total_attendance}}%
                        </div>
                    </div>

                </div>
            </div>


</div>
