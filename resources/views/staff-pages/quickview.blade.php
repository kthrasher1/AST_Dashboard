<div id="student-quick-view-container">
            <div class="student-content">
                @foreach ($student as $s )
                    <div class="student-quick-info">
                        <div class="profile-picture-container"> <img src="/uploads/avatars/{{$s->avatar }}" alt="" class="student-profile-picture"> </div>
                        <h1 class="student-name">{{$s->name}}</h1>
                        <h4 class="student-email">{{$s->email}}</h4>


                        <div class="module-list">
                            <h4> Modules Taken </h4>
                            @if ($moduleData->semester == 1)
                            <div class="modules"> <p> {{$moduleData->module_1_name}} </p> </div>
                            <div class="modules"> <p> {{$moduleData->module_2_name}} </p> </div>
                            <div class="modules"> <p> {{$moduleData->module_3_name}} </p> </div>

                            @else
                            <div class="modules"> <p> {{$moduleData->module_4_name}} </p> </div>
                            <div class="modules"> <p> {{$moduleData->module_5_name}} </p> </div>
                            <div class="modules"> <p> {{$moduleData->module_6_name}} </p> </div>
                            @endif
                        </div>
                    </div>
                @endforeach
                <div class="student-data-container">
                    <div class="card" id="risk-level">
                        <div class="card-header title">  Student Risk Level <div class="tool-tip" title="Edit Mode">i</div></div>
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

                    <div class="card" id="issues">
                        <div class="card-header">Current Issues</div>
                        <div class="issues card-body">

                            <p> {{ $studentData->issue_selector_1 }} </p>
                            <p> {{ $studentData->issue_selector_2 }} </p>
                            <p> {{ $studentData->issue_selector_3 }} </p>
                            <p> {{ $studentData->issue_selector_4 }} </p>
                            <p> {{ $studentData->issue_selector_5 }} </p>

                            <div class="expand">
                                @if($studentData->other_selector != null)
                                <hr>
                                    <h4 class="expand-header">They added another issue(s): </h4>
                                    <p> {{$studentData->other_selector}} </p>
                                @endif
                            </div>
                        </div>
                    </div>

                    <div class="card" id="other-issues">
                        <div class="card-header">Other Issues </div>
                        <div class="other-issues card-body">
                            @if($studentData->other_issues != null)
                                {{$studentData->other_issues}}
                            @else
                                No other issues submitted
                            @endif
                        </div>
                    </div>

                    <div class="card" id="module-issues">
                        <div class="card-header">Module Issues</div>
                        <div class="module-issues card-body">

                            @if($studentData->module_issues_bool == true)
                                    @foreach ($student as $s )
                                    <p> Looks like {{$s->name}} is having issues with some of their modules: </p>
                                    @endforeach
                                    <br>
                                    <p> {{ $studentData->module_selector_1}} </p>
                                    <p> {{ $studentData->module_selector_2 }} </p>
                                    <p> {{ $studentData->module_selector_3 }} </p>

                                <hr>
                                <div class="expand">
                                    @if($studentData->module_expand_bool == true)
                                        <h4 class="expand-header">They expanded on module issues: </h4>
                                        <p> {{$studentData->module_detail}} </p>
                                    @else
                                        <p> No explaination was submitted <p>
                                    @endif
                                </div>

                            @else
                                <p>No issues with modules submitted</p>
                            @endif

                        </div>
                    </div>



                    <div class="card" id="total-attendance">
                        <div class="card-header"> This Weeks Attendance </div>
                        <div class="card-body">
                            <div class="Overall">
                            @if($moduleData->semester == 1)
                                <p>Overall Attended: {{$moduleData->weekly_attendance_semester_1 }}% Attended.</p>
                            @elseif($moduleData->semester == 2)
                                <p>Overall Attended: {{$moduleData->weekly_attendance_semester_2 }}% Attended.</p>
                            @endif
                            </div>

                            <hr>

                            <div class="module-break-down">
                                <p> Breakdown of attendance by module: </p>
                                @if($moduleData->semester == 1)
                                    <ul class="modules">
                                        <li> {{$moduleData->module_1_name }}: {{$moduleData->module_1_attendance_weekly}}% Attended.</li>
                                        <li> {{$moduleData->module_2_name }}: {{$moduleData->module_2_attendance_weekly  }}% Attended.</li>
                                        <li> {{$moduleData->module_3_name }}: {{$moduleData->module_3_attendance_weekly }}% Attended.</li>
                                    </ul>
                                @elseif($moduleData->semester == 2)
                                    <ul>
                                        <li> {{$moduleData->module_4_name }}: {{$moduleData->module_4_attendance_weekly}}% Attended.</li>
                                        <li> {{$moduleData->module_5_name }}: {{$moduleData->module_5_attendance_weekly  }}% Attended.</li>
                                        <li> {{$moduleData->module_6_name }}: {{$moduleData->module_6_attendance_weekly }}% Attended.</li>
                                    </ul>
                                @endif
                            </div>
                        </div>
                    </div>
</div>
