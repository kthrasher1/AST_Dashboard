<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Charts\AttendanceGraph;
use App\Charts\EngagementChart;
use \app\User;

class StaffController extends Controller
{
    public function attendanceGraph() {

        $chart = new AttendanceGraph();
        $chart ->labels(['One', 'Two', 'Three']);
        $chart ->dataset('My dataset', 'bar', [1, 2, 3, 4]);
        $chart ->dataset('My dataset 2', 'bar', [4, 3, 2, 1]);

        //return view('staff', ['attendanceGraph' => $chart]);

        $chart = new EngagementChart();
        $chart->labels(['Four', 'Two', 'Three']);
        $chart->dataset('My dataset', 'pie', [1, 2, 3, 4]);

        return view('staff', ['attendanceGraph' => $chart]);
        
    }

   


}
