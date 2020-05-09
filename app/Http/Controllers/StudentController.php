<?php

namespace App\Http\Controllers;

use App\AST;
use Illuminate\Http\Request;
use App\User;
use App\Student;
use App\Staff;
use App\StudentData;
use Auth;

class StudentController extends Controller
{
    public function index(Request $request){

        $studentUser = $request->user()->student;

        $staff = User::whereHas('staff', function ($query) use ($studentUser) {
            $query->whereIn('id', $studentUser->pluck('ast_id'));
        })->get();

        return view('student', [
            'staff' => $staff
        ]);

    }

    public function StudentPage(){

        return view('student-pages.starting-page');

    }

    public function StudentPageRange(){
        return view('student-pages.range');
    }

    public function StudentPageHome(Request $request){
        $studentUser = $request->user()->student;

        $staff = User::whereHas('staff', function ($query) use ($studentUser) {
            $query->whereIn('id', $studentUser->pluck('ast_id'));
        })->get();

        return view('student', [
            'staff' => $staff
        ]);
    }

    public function RangeSliderSubmit(Request $request){


        $rangeSlider = $request->rangeSlider;

        return view('student-pages.selection')->with('rangeSlider', $rangeSlider);
    }

    public function SelectionSubmit(Request $request){

        $selectionInput = $request->all();

        return view('student-pages.modules');
    }

    public function ModulesSubmit(Request $request){
        $userRadioSelection = $request->radioSelect;

        if($userRadioSelection == "2" ){
            $studentUser = Auth::user()->student;
            $studentData = StudentData::where('student_id', $studentUser->pluck('student_id'))->get();

            return view('student-pages.modules-selection', ['studentData' => $studentData]);
        }
        else{
            return view('student-pages.other-issues');
        }

    }

    public function ModulesSelectionSubmit(Request $request){

        return view("student-pages.modules-issues");
    }

    public function ModulesIssueSubmit(Request $request){
        return view("student-pages.other-issues");
    }

    public function OtherIssuesSubmit(Request $request){
        $studentUser = $request->user()->student;

        $staff = User::whereHas('staff', function ($query) use ($studentUser) {
            $query->whereIn('id', $studentUser->pluck('ast_id'));
        })->get();

        return view("student-pages.feedback-complete", [
            'staff' => $staff
        ]);
    }
}
