<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Charts\Graphs;
use App\Charts\EngagementChart;
use App\User;
use App\Student;
use App\Staff;
use Illuminate\Support\Facades\Auth;

class StaffController extends Controller
{
    public function index(Request $request)
    {
        $staff = $request->user()->staff;

        $student = User::whereHas('student', function ($query) use ($staff) {
            $query->whereIn('ast_id', $staff->pluck('id'));
        })->get();

        return view('staff', [
            'students' => $student
        ]);
    }

    // public function Graphs() {

    //     $chart = new Graphs;
    //     $chart ->labels(['One', 'Two', 'Three']);
    //     $chart ->dataset('My dataset', 'bar', [1, 2, 3, 4]);
    //     $chart ->dataset('My dataset 2', 'bar', [4, 3, 2, 1])
    //         ->color("rgb(255, 99, 132)")
    //         ->backgroundcolor("rgb(255, 99, 132)")
    //         ->fill(false);


    //     $fillColors = [
    //         "rgba(255, 99, 132, 1)",
    //         "rgba(22,160,133, 1)",
    //         "rgba(255, 205, 86, 1)",
    //         "rgba(51,105,232, 1)",
    //     ];

    //     $pie = new Graphs;
    //     $pie ->labels(['Four', 'Two', 'Three', 'One']);
    //     $pie ->dataset('My dataset', 'pie', [1, 2, 3, 4])
    //         ->color($fillColors)
    //         ->backgroundcolor($fillColors)
    //         ->fill(false);

    //     $line = new Graphs;
    //     $line ->labels(['Four', 'Two', 'Three', 'One']);
    //     $line ->dataset('My dataset', 'line', [1, 2, 3, 4])
    //         ->color("rgb(255, 99, 132)")
    //         ->backgroundcolor("rgb(255, 99, 132)")
    //         ->fill(false);


    //     $usersChart = new Graphs;
    //     $usersChart->labels(['Jan', 'Feb', 'Mar']);
    //     $usersChart->dataset('Users by trimester', 'line', [10, 25, 13])
    //         ->color("rgb(255, 99, 132)")
    //         ->backgroundcolor("rgb(255, 99, 132)")
    //         ->fill(false);

    //     return view('staff', ['barchart' => $chart, 'piechart' => $pie, 'linechart' => $line, 'linechart_users' => $usersChart]);

    // }
}
