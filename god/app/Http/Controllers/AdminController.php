<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \app\User;

class AdminController extends Controller
{
    public function index() {
        $users = User::with('roles')->get();

        return view('admin', ['users' => $users]);
    }

    public function giveAdmin($userId){
        
        $user = User::where('id', $userId)->firstOrFail();
    }

    public function removeAdmin(){

    }

    public function makeStudent(){

    }

    public function removeStudent() {

    }

    public function makeStaff(){

    }

    public function removeStaff(){
        
    }
}
