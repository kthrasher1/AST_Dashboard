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

        return view('student-pages.starting-page');

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

        $vals = implode(" " , array_filter([$home, $uni, $rel, $fri, $tra ,$other]));

        $request->session()->push('studentData.emotionSelection', $vals);

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
            $studentUser = Auth::user()->student;
            $studentData = ModuleData::where('student_id', $studentUser->pluck('student_id'))->get();

            return view('student-pages.modules-selection', ['studentData' => $studentData]);
        }
        else{
            return view('student-pages.other-issues');
        }

    }

    public function ModulesSelectionSubmit(Request $request){
        $modOne = $request->modSelect1;
        $modTwo = $request->modSelect2;
        $modThree = $request->modSelect3;

        $vals = implode(" " , array_filter([$modOne, $modTwo, $modThree]));
        $request->session()->put('studentData.moduleSelection',$vals);

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


        $studentDataSubmit = new StudentData();
        $studentDataSubmit->student_id = Auth::user()->id;
        $studentDataSubmit->emotion_slider = $request->session()->get('studentData.rangeSliderSelection.0');
        $studentDataSubmit->issue_selector = $request->session()->get('studentData.emotionSelection.0');
        $studentDataSubmit->other_selector = $request->session()->get('studentData.otherIssuesSelection');
        $studentDataSubmit->module_issues_bool = $request->session()->get('studentData.moduleIssueSelection');
        $studentDataSubmit->module_selector = $request->session()->get('studentData.moduleSelection');
        $studentDataSubmit->module_expand = $request->session()->get('studentData.moduleExpandBool');
        $studentDataSubmit->module_detail= $request->session()->get('studentData.moduleExpandSubmit');
        $studentDataSubmit->other_issues = $request->session()->get('studentData.otherIssuesExpand.0');
        $studentDataSubmit->completed = true;
        $studentDataSubmit->risk_level = 1;
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
