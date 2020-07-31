<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ModuleData;
use App\User;
use App\Student;
use App\Staff;
use App\StudentData;
use App\Message;
use App\Charts\AttendanceChart;
use App\Charts\EmotionChart;
use App\Charts\OverallAttendance;
use App\Charts\RiskChart;
use Illuminate\Support\Facades\Auth;



class StaffController extends Controller
{
    public function index()
    {
        //Getting the students
        $staff = Auth::user()->staff;
        $studentUser = User::whereHas('student', function ($query) use ($staff) {
            $query->whereIn('ast_id', $staff->pluck('id'));
        })->get();


        //unread Messages
        $unreadID = Message::select(\DB::raw('`from` as sender_id, count(`from`) as messages_count'))
        ->where('to', auth()->id())
        ->where('read', false)
        ->groupBy('from')
        ->get();

        $studentMessage = $studentUser->map(function($query) use ($unreadID){
            $UnreadMessage = $unreadID->where('sender_id', $query->id)->first();
            $query->unread = $UnreadMessage ? $UnreadMessage->messages_count : 0;
            return $query;
        });

        //notfications

        $notif = auth()->user()->unreadNotifications;

        // Data stuff

        //Attendance Graph

        // $moduleData = ModuleData::whereIn("student_id", $studentUser->pluck("id"))->latest()->first();
        // $attendance = 0;

        // if($moduleData != null) {
        //     $attendance = $moduleData->weekly_attendance_semester_1;
        // }

        // $attendanceChart = new AttendanceChart;
        // $attendanceChart->labels(['Attended', 'Absent']);
        // $attendanceChart->dataset('Weekly Attendance in percentage', 'pie', [$attendance, 100-$attendance])
        //     ->color(["red","blue"])
        //     ->backgroundcolor(["red","blue"])
        //     ->fill(true);
        // $attendanceChart->minimalist(true);
        // $attendanceChart->displayLegend(true);

        //weekly Graph

        $weeklyAttendanceData = ModuleData::where("student_id", $studentUser->pluck("id"))->pluck('weekly_attendance_semester_1','created_at');

        $weeklyAttendance = new AttendanceChart;
        $weeklyAttendance->title('Semester 1 - Weekly Attendance');
        $weeklyAttendance->labels($weeklyAttendanceData->keys());
        $weeklyAttendance->dataset($studentUser->pluck('name')->first(), 'line', $weeklyAttendanceData->values())
            ->color('#00ebc7')
            ->fill(false);
        $weeklyAttendance->dataset('Student 2', 'line', [65, 67, 64, 54, 62, 63, 54, 76, 65])
            ->color('#008974')
            ->fill(false);

        $weeklyAttendance->displayLegend(true);

        return view('staff', [
            'students' => $studentUser,
            // 'linechart' => $attendanceGraph,
            'notify' => $notif,
            // 'attendanceChart' => $attendanceChart,
            'weeklyChart' =>  $weeklyAttendance
        ]);
    }


    //Student Profile

    public function studentProfile(Request $request) {

        $user = User::where('id', $request->studentid)->get();
        $student = Student::where('student_id', $request->studentid)->get();
        $moduleData = ModuleData::where('student_id', $user->pluck('id'))->latest()->first();
        $studentData = StudentData::where('student_id', $student->pluck("student_id"))->get();

        //At risk Levels - LINE GRAPH
        $riskLevelData = $studentData->pluck('risk_level', 'created_at');

        $RiskLevel = new RiskChart;
        $RiskLevel ->labels($riskLevelData->keys());
        $RiskLevel ->dataset($user->pluck('name')->first(), 'line', $riskLevelData->values())
            ->color('red')
            ->fill(false);
        $RiskLevel->displayLegend(true);

        //Emotion - LINE GRAPH

        $emotionData = $studentData->pluck('emotion_slider', 'created_at');

        $emotionGraph = new EmotionChart;
        $emotionGraph->labels($emotionData->keys());
        $emotionGraph->dataset($user->pluck('name')->first(), 'line', $emotionData->values())
            ->color('red')
            ->fill(false);
        $emotionGraph->displayLegend(true);

        //Overall Attendance - Pie Chart
        $moduleFirstData = ModuleData::whereIn("student_id", $user->pluck("id"))->latest()->first();

        $attendance = 0;

        if($moduleFirstData != null) {
            $attendance = $moduleFirstData->weekly_attendance_semester_1;
        }

        $attendanceChart = new OverallAttendance;
        $attendanceChart->labels(['Attended', 'Absent']);
        $attendanceChart->dataset('Weekly Attendance in percentage', 'pie', [$attendance, 100-$attendance])
            ->color(["#00ebc7","#ff5470"])
            ->backgroundcolor(["#00ebc7","#ff5470"])
            ->fill(true);
        $attendanceChart->minimalist(true);
        $attendanceChart->displayLegend(true);


        return view('staff-pages.studentProfile', [
            'student' => $user,
            'student_data' => $studentData,
            'module_data' => $moduleData,
            'weekly_graph' => $attendanceChart,
            'risk_level' => $RiskLevel,
            'emotion_graph' => $emotionGraph,
            // 'attendance_graph' => $attendanceGraph

        ]);
    }


    //Quick View

    public function QuickView(Request $request){

        $id = $request->checkup_id;
        $studentData = StudentData::where('id', $id)->first();
        $student = User::where('id', $studentData->student_id)->get();
        $module = ModuleData::where('student_id', $studentData->student_id)->latest()->first();

        // $attendanceChart = new AttendanceChart;
        // $attendanceChart->labels(['Attended', 'Absent']);
        // $attendanceChart->dataset('Weekly Attendance in percentage', 'pie', [$attendance, 100-$attendance])
        //     ->color(["red","blue"])
        //     ->backgroundcolor(["red","blue"])
        //     ->fill(true);
        // $attendanceChart->minimalist(true);
        // $attendanceChart->displayLegend(true);

        return view('staff-pages.quickview', [
            'studentData' => $studentData,
            'student' => $student,
            'moduleData' => $module
        ]);
    }


}
