<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class StudentController extends Controller
{
    //

    public function RangeSliderSubmit(Request $request){


        $rangeSlider = $request->rangeSlider;

        return view('pages.student-page-selection')->with('rangeSlider', $rangeSlider);
    }

    public function SelectionSubmit(Request $request){

        $selectionInput = $request;

        return view('pages.student-page-unknown');
    }
}
