<?php

namespace App\Http\Controllers;

use App\Events\FinishedCheckup;
use Illuminate\Http\Request;
use App\User;
use App\ModuleData;
use App\Student;
use App\Staff;
use App\StudentData;
use App\Message;
use App\Notifications\SendFinishedNofity;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Collection;

class StudentController extends Controller
{
    public function index(Request $request){

        $studentUser = $request->user()->student;

        $staff = User::whereHas('staff', function ($query) use ($studentUser) {
            $query->whereIn('id', $studentUser->pluck('ast_id'));
        })->get();

        $unreadID = Message::select(\DB::raw('`from` as sender_id, count(`from`) as messages_count'))
        ->where('to', auth()->id())
        ->where('read', false)
        ->groupBy('from')
        ->get();

        $staff = $staff->map(function($query) use ($unreadID){
            $UnreadMessage = $unreadID->where('sender_id', $query->id)->first();
            $query->unread = $UnreadMessage ? $UnreadMessage->messages_count : 0;
            return $query;
        });

        return view('student', [
            'staff' => $staff
        ]);

    }

    public function StudentPage(){

        $studentUserData = StudentData::where('student_id', Auth::user()->id)->latest()->first();
        $date = \Carbon\Carbon::today()->subDays(7);

        if($studentUserData != null){
            $WeeklyCheck = $studentUserData->where('created_at' , '>=', $date)->first();

            if($WeeklyCheck == null){
                return view('student-pages.starting-page');
            }

        }
        else{
            return view('student-pages.starting-page');
        }

        return redirect('/student')->with('warning', 'Looks like you\'ve already done this weeks checkup.');
    }

    public function PreviousPage(Request $request){

        $pageid = $request->pageid;

        if($pageid == 1){
            return view('student-pages.starting-page');
        }
        else if($pageid == 2){
            return view('student-pages.range');
        }
        else if($pageid == 3 || 8){
            return view('student-pages.selection');
        }
        else if($pageid == 4){
            return view('student-pages.modules');
        }
        else if($pageid == 5){
            return view('student-pages.modules-selection');
        }
        else if($pageid == 6){
            return view('student-pages.modules-issues');
        }
        else if($pageid == 7){

            return redirect()->back();
        }
    }

    public function StudentPageRange(Request $request){
        session()->put('studentData', []);
        return view('student-pages.range');
    }

    public function RangeSliderSubmit(Request $request){
        $rangeSlider = $request->rangeSlider;

        $sessions = $request->session()->push('studentData.rangeSliderSelection', $rangeSlider);
        //print_r($request->session()->get('studentData'));
        return view('student-pages.selection')->with('rangeSlider', $rangeSlider);
    }

    public function SelectionSubmit(Request $request){
        $home = $request->checkboxSelect1;
        $uni = $request->checkboxSelect2;
        $rel = $request->checkboxSelect3;
        $fri = $request->checkboxSelect4;
        $tra = $request->checkboxSelect5;
        $other = $request->checkboxSelect6;

        // dd($home);

        $request->session()->push('studentData.emotionSelector_1', $home);
        $request->session()->push('studentData.emotionSelector_2', $uni);
        $request->session()->push('studentData.emotionSelector_3', $rel);
        $request->session()->push('studentData.emotionSelector_4', $fri);
        $request->session()->push('studentData.emotionSelector_5', $tra);
        $request->session()->push('studentData.emotionSelector_6', $other);



        if($other != null){
            return view('student-pages.other-selected');
        }
        else{
            return view('student-pages.modules');
        }
    }

    public function SelectionOtherSubmit(Request $request){
        $otherIssues = $request->otherIssues;
        $request->session()->put('studentData.otherIssuesSelection',  $otherIssues);


        return view('student-pages.modules');
    }

    public function ModulesSubmit(Request $request){
        $userRadioSelection = $request->radioSelect;
        $request->session()->put('studentData.moduleIssueSelection',  $userRadioSelection);


        if($userRadioSelection == "1" ){
            $studentUser = Student::where('student_id', Auth::user()->id)->first();
            $studentData = ModuleData::where('student_id', $studentUser->student_id)->first();

            return view('student-pages.modules-selection', [
                'studentData' => $studentData
            ]);
        }
        else{
            return view('student-pages.other-issues');
        }

    }

    public function ModulesSelectionSubmit(Request $request){
        $modOne = $request->modSelect1;
        $modTwo = $request->modSelect2;
        $modThree = $request->modSelect3;

        $request->session()->put('studentData.moduleSelection_1',$modOne);
        $request->session()->put('studentData.moduleSelection_2',$modTwo);
        $request->session()->put('studentData.moduleSelection_3',$modThree);

        return view("student-pages.modules-issues");
    }

    public function ModulesIssueSubmit(Request $request){

        $userRadioSelection = $request->radioSelect;
        $request->session()->put('studentData.moduleExpandBool',$userRadioSelection);

        if($userRadioSelection == "1" ){
            return view('student-pages.module-issues-detail');
        }
        else{
            return view('student-pages.other-issues');
        }
    }

    public function ModulesIssueDetailSubmit(Request $request){
        $moduleDetail = $request->moduleIssues;
        $request->session()->put('studentData.moduleExpandSubmit',$moduleDetail);


        return view("student-pages.other-issues");
    }

    public function OtherIssuesSubmit(Request $request){

        $studentUser = $request->user()->student;

        $otherIssuesSubmit = $request->issues;
        $request->session()->put('studentData.otherIssuesExpand',$otherIssuesSubmit);

        $staff = User::whereHas('staff', function ($query) use ($studentUser) {
            $query->whereIn('id', $studentUser->pluck('ast_id'));
        })->get();

        //variables to be saved to database
        $emotion_slider = $request->session()->get('studentData.rangeSliderSelection.0');

        $issue_selector = array(
            'home' => $request->session()->get('studentData.emotionSelector_1.0'),
            'uni' => $request->session()->get('studentData.emotionSelector_2.0'),
            'rel' => $request->session()->get('studentData.emotionSelector_3.0'),
            'fri' => $request->session()->get('studentData.emotionSelector_4.0'),
            'travel' => $request->session()->get('studentData.emotionSelector_5.0'),
            'other' => $request->session()->get('studentData.emotionSelector_6.0')
        );

        $other_selector = $request->session()->get('studentData.otherIssuesSelection');
        $module_issue_bool = $request->session()->get('studentData.moduleIssueSelection');

        $module_selector = collect([
            $request->session()->get('studentData.moduleSelection_1'),
            $request->session()->get('studentData.moduleSelection_2'),
            $request->session()->get('studentData.moduleSelection_3')
        ]);

        $module_expand_bool = $request->session()->get('studentData.moduleExpandBool');

        $module_detail = $request->session()->get('studentData.moduleExpandSubmit');

        $other_submit = $request->session()->get('studentData.otherIssuesExpand');

        //Risk Algorithm

        $risk_level = 100;
        //Check previous data entries if there are any.
        $previousEntries = StudentData::where('student_id', Auth::user()->id)->latest()->first();

        if($previousEntries != null){
            $risk_factor = $previousEntries->risk_level;

            if($previousEntries->risk_level >= 0 && $previousEntries->risk_level <= 3){

                $risk_level -= 20;
            }
            else if($previousEntries->risk_level > 3 && $previousEntries->risk_level <= 4){

                $risk_level -= 10;

            }
        }

        if($emotion_slider != null ){

            if($emotion_slider >= 1 && $emotion_slider <= 2){
                $risk_level -= 20;
            }
            else if($emotion_slider >= 3 && $emotion_slider <= 4){
                $risk_level -= 10;
            }
        }


        $issue_counter = 0;

        if($issue_selector != null ){

            for ($i=0; $i < count($issue_selector); $i++) {
                    $issue_counter++;
            }

            if($emotion_slider >= 1 && $emotion_slider <= 2){
                if($issue_counter  == 1){
                    $risk_level -= 5;
                }
                else if($issue_counter == 2){
                    $risk_level -= 10;
                }
                else if($issue_counter == 3){
                    $risk_level -= 15;
                }
                else if($issue_selector >= 4){
                    $risk_level -= 20;
                }
            }
            else if($emotion_slider == 3){
                if($issue_counter  == 1){
                    $risk_level -= 2.5;
                }
                else if($issue_counter == 2){
                    $risk_level -= 5;
                }
                else if($issue_counter == 3){
                    $risk_level -= 7.5;
                }
                else if($issue_selector >= 4){
                    $risk_level -= 10;
                }
            }
        }

        $moduleData = ModuleData::where('student_id', Auth::user()->id)->latest()->first();

        if($moduleData != null){
            if( $moduleData->semester == 1){
                if( $moduleData->weekly_attendance_semester_1 >= 0 &&  $moduleData->weekly_attendance_semester_1 <= 35 ){
                    $risk_level -= 15;
                }
                else if( $moduleData->weekly_attendance_semester_1 >= 36 &&  $moduleData->weekly_attendance_semester_1 <= 65 ){
                    $risk_level -= 10;
                }

                if($moduleData->total_grade_semester_1 >= 0 && $moduleData->total_grade_semester_1 <= 40){
                    $risk_level -= 10;
                }
                else if($moduleData->total_grade_semester_1 >= 41 && $moduleData->total_grade_semester_1 <= 59 ){
                    $risk_level -= 5;
                }

            }
            else if($moduleData->semester == 2){
                if( $moduleData->weekly_attendance_semester_2 >= 1 &&  $moduleData->weekly_attendance_semester_2 <= 35 ){
                    $risk_level -= 15;
                }
                else if( $moduleData->weekly_attendance_semester_2 >= 36 &&  $moduleData->weekly_attendance_semester_2 <= 65 ){
                    $risk_level -= 10;
                }

                if($moduleData->total_grade_semester_2 >= 0 && $moduleData->total_grade_semester_2 <= 40){
                    $risk_level -= 10;
                }
                else if($moduleData->total_grade_semester_2 >= 41 && $moduleData->total_grade_semester_2 <= 59 ){
                    $risk_level -= 5;
                }
            }
        }

        $module_counter = 0;

        if($module_issue_bool == true ){
            for ($i=0; $i < count($module_selector); $i++) {
                if($module_selector[$i] != null){
                    $module_counter++;
                }
            }

            if($module_counter == 1){
                $risk_level -= 5;
            }
            else if($module_counter == 2){
                $risk_level -= 10;
            }
            else if($module_counter == 3){
                $risk_level -= 15;
            }

            if($module_expand_bool == false){
                $risk_level -= 15;
            }
            else{
                $risk_level -= 10;
            }
        }


        $total_risk_level = $risk_level / 20;

        $studentDataSubmit = new StudentData();
        $studentDataSubmit->student_id = Auth::user()->id;
        $studentDataSubmit->emotion_slider = $emotion_slider;

        $studentDataSubmit->issue_selector_1 = $request->session()->get('studentData.emotionSelector_1.0');
        $studentDataSubmit->issue_selector_2 = $request->session()->get('studentData.emotionSelector_2.0');
        $studentDataSubmit->issue_selector_3 = $request->session()->get('studentData.emotionSelector_3.0');
        $studentDataSubmit->issue_selector_4 = $request->session()->get('studentData.emotionSelector_4.0');
        $studentDataSubmit->issue_selector_5 = $request->session()->get('studentData.emotionSelector_5.0');
        $studentDataSubmit->issue_selector_6 = $request->session()->get('studentData.emotionSelector_6.0');

        $studentDataSubmit->other_selector = $request->session()->get('studentData.otherIssuesSelection');

        $studentDataSubmit->module_issues_bool = $request->session()->get('studentData.moduleIssueSelection');
        $studentDataSubmit->module_selector_1 = $request->session()->get('studentData.moduleSelection_1');
        $studentDataSubmit->module_selector_2 = $request->session()->get('studentData.moduleSelection_2');
        $studentDataSubmit->module_selector_3 = $request->session()->get('studentData.moduleSelection_3');
        $studentDataSubmit->module_expand_bool = $request->session()->get('studentData.moduleExpandBool');
        $studentDataSubmit->module_detail= $request->session()->get('studentData.moduleExpandSubmit');
        $studentDataSubmit->other_issues = $request->session()->get('studentData.otherIssuesExpand');

        $studentDataSubmit->completed = true;

        $studentDataSubmit->risk_level = $total_risk_level;
        $studentDataSubmit->created_at = NOW();
        $studentDataSubmit->updated_at = NOW();

        $studentDataSubmit->save();


        $user = $request->user();
        $studentDataObj = StudentData::where('student_id', $user->id)->latest()->first();
        $student = Student::where('student_id', $user->id)->first();

        $notifyStaff = Staff::where('id', $student->ast_id)->first();
        User::find($notifyStaff->staff_id)->notify(new SendFinishedNofity($studentDataObj, $user));

        return view("student-pages.feedback-complete", [
            'staff' => $staff
        ]);
    }


    public function CompletedSubmit(Request $request){
        return view("student");
    }
}
