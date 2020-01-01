<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PermissionController extends Controller
{
    public function admin()
    {
        return view('admin');
    }

    public function staff()
    {
        return view('staff');   

    }

    public function student()
    {
        return view('student');
    }

    public function noPermissions()
    {
        return view('no-permissions');
    }
}
