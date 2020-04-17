<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Charts\Graphs;
use App\Charts\EngagementChart;
use App\User;
use App\Student;
use App\Staff;
use App\StudentData;
use Illuminate\Support\Facades\Auth;

class StaffController extends Controller
{
    public function index()
    {
        $staff = Auth::user()->staff;

        $student = User::whereHas('student', function ($query) use ($staff) {
            $query->whereIn('ast_id', $staff->pluck('id'));
        })->get();


        $line = new Graphs;
             $line ->labels(['Four', 'Two', 'Three', 'One']);
             $line ->dataset('My dataset', 'line', [1, 2, 3, 4])
                 ->color("rgb(255, 99, 132)")
                 ->backgroundcolor("rgb(255, 99, 132)")
                 ->fill(false);


        return view('staff', [
            'students' => $student,
            'linechart' => $line
        ]);
    }

    public function studentProfile(Request $request) {

        $user = User::where('id', $request->studentid)->get();
        $student = Student::where('student_id', $user->first()->id)->get();
        $studentData = StudentData::where('student_id', $student->first()->id)->get();


        return view('staff-pages.studentProfile', [
            'student' => $user,
            'student_data' => $studentData

        ]);
    }
}
