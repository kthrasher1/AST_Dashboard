<?php

namespace App\Http\Controllers;

use App\AST;
use Illuminate\Http\Request;
use App\User;
use App\Student;
use App\Staff;
use Auth;

class StudentController extends Controller
{
    // public function index(){
    //     $users = User::with('staff')->get();

    //     return view('student', [ 'users' => $users ]);
    // }

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

        return view('student-pages.student-page');

    }

    public function RangeSliderSubmit(Request $request){


        $rangeSlider = $request->rangeSlider;

        return view('student-pages.student-page-selection')->with('rangeSlider', $rangeSlider);
    }

    public function SelectionSubmit(Request $request){

        $selectionInput = $request->all();

        return view('student-pages.student-page-unknown');
    }
}
