<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Charts\Graphs;
use App\Charts\EngagementChart;
use App\ModuleData;
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
        $studentUser = User::whereHas('student', function ($query) use ($staff) {
            $query->whereIn('ast_id', $staff->pluck('id'));
        })->get();

        $moduleData = ModuleData::whereIn("student_id", $studentUser->pluck("id"))->get();
        $attendance = $moduleData->pluck("total_attendance")->all();

        // dd($attendance);

        $attendanceGraph = new Graphs;
        $attendanceGraph ->labels(['Total Attendance', 'Total Absence']);
        $attendanceGraph ->dataset('Attendance', 'pie', [$attendance, $attendance[0]-100])
            ->color(["red","blue"])
            ->backgroundcolor(["#445","blue"]);
        $attendanceGraph->minimalist(true);
        $attendanceGraph->displayLegend(true);


        return view('staff', [
            'students' => $studentUser,
            'linechart' => $attendanceGraph
        ]);
    }

    public function studentProfile(Request $request) {

        $user = User::where('id', $request->studentid)->get();
        $student = Student::where('student_id', $request->studentid)->get();
        $moduleData = ModuleData::where('student_id', $student->pluck("student_id"))->get();
        $studentData = StudentData::where('student_id', $student->pluck("student_id"))->get();

        $attendance = $moduleData->first()->total_attendance;

        $attendanceGraph = new Graphs;
        $attendanceGraph ->labels(['Total Attendance', 'Total Absence']);
        $attendanceGraph ->dataset('Attendance', 'pie', [$attendance,100-$attendance])
            ->color(["red","blue"])
            ->backgroundcolor(["red","blue"])
            ->fill(true);
        $attendanceGraph->minimalist(true);
        $attendanceGraph->displayLegend(true);


        return view('staff-pages.studentProfile', [
            'student' => $user,
            'student_data' => $studentData,
            'module_data' => $moduleData,
            'graph' => $attendanceGraph

        ]);
    }
}
