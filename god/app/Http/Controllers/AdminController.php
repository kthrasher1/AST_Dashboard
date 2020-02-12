<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \app\User;
use \app\Role;
use Auth;

class AdminController extends Controller
{
    public function index() {
        $users = User::with('roles')->get();

        return view('admin', ['users' => $users]);
    }

    public function giveAdmin($userId){

        if(Auth::user()->id == $userId){

            return redirect('/admin') -> with('warning', 'you are already admin, silly' );
        }
        else{

            $user = User::where('id', $userId)->firstOrFail();
            $adminRole = Role::where('name', 'admin')->firstOrFail();
    
            $user->roles()->sync($adminRole->id);
        }
    
        return redirect('/admin')->with('success', 'User\'s role has been updated');
  
    }

    public function removeRole($userId){

        if(Auth::user()->id == $userId){
            return redirect('/admin') -> with('warning', 'you can\'t remove your own permissions, silly');
        }
        else{ 

            $user = User::where('id', $userId)->firstOrFail();
            $removeRole = Role::where('name','unassigned')->firstOrFail();
    
            $user->roles()->sync($removeRole->id);
        }
      
        return redirect('/admin')->with('success', 'User\'s role has been removed');
    }

    public function makeStudent($userId){

        if(Auth::user()->id == $userId){

            return redirect('/admin') -> with('warning', 'you can\'t update your own permissions, silly');
        }
        else{
            $user = User::where('id', $userId)->firstOrFail();
            $studentRole = Role::where('name', 'student')->firstOrFail();
            $user->roles()->sync($studentRole->id);
        }

        return redirect('/admin')->with('success', 'User\'s role has been updated');
    }

    public function makeStaff($userId){

        if(Auth::user()->id == $userId){

            return redirect('/admin') -> with('warning', 'you can\'t update your own permissions, silly');
        }
        else{
        $user = User::where('id', $userId)->firstOrFail();
        $staffRole = Role::where('name', 'staff')->firstOrFail();

        $user->roles()->sync($staffRole->id);
        }

        return redirect('/admin')->with('success', 'User\'s role has been updated');
    }

    public function update($userId) {
        $user = User::where('id', $userId)->firstOrFail();

        if($user){

        }

    }

    public function deleteUser($userId){

        $user = User::findOrFail($userId);
        $role = $users->roles()->detach();

        $user -> delete();

        return redirect('/admin')->with('deleted', 'User has been deleted');
    }

}
