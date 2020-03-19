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

    public function index(){

        $students = Student::with('student_users')->get();
        $users = User::with('staff')->get();
        $staff = Staff::with('students')->get();



        return view('student', [ 'students' => $students, 'users' => $users, 'staff' => $staff ]);

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
