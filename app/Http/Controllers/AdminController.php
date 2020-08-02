<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Role;
use App\Student;
use App\Staff;
use Illuminate\Support\Facades\Auth;


class AdminController extends Controller
{

   public function index()
    {
        $users = User::with('roles')->paginate(10);
        $notif = auth()->user()->unreadNotifications;

        return view('admin', [
            'users' => $users,
            'notify' => $notif,
        ]);
    }


    public function giveAdmin(User $user)
    {
        if (Auth::id() == $user->id) {
            return redirect('/admin') -> with('warning', 'you are already admin');
        }

        $adminRole = Role::where('name', 'admin')->firstOrFail();
        $user->roles()->sync($adminRole->id);

        return redirect('/admin')->with('success', 'User\'s role has been updated');
    }

    public function removeRole(User $user)
    {
        if (Auth::id() == $user->id) {
            return redirect('/admin')->with('warning', 'you can\'t remove your own permissions');
        }

        $removeRole = Role::where('name', 'unassigned')->firstOrFail();
        $user->roles()->sync($removeRole->id);

        return redirect('/admin')->with('success', 'User\'s role has been removed');
    }

    public function makeStudent(User $user)
    {
        if (Auth::id() == $user->id) {
            return redirect('/admin')->with('warning', 'you can\'t update your own permissions');
        }

        $studentRole = Role::where('name', 'student')->firstOrFail();
        $user->roles()->sync($studentRole->id);

        $student = new Student;
            $student->student_id = $user->id;
            $student->ast_id = Staff::All()->pluck('id')->first();
            $student->created_at = Now();
            $student->updated_at = Now();
        $student->save();

        return redirect('/admin')->with('success', 'User\'s role has been updated');
    }

    public function makeStaff(User $user)
    {
        if (Auth::id()== $user->id) {
            return redirect('/admin')->with('warning', 'you can\'t update your own permissions');
        }

        $staffRole = Role::where('name', 'staff')->firstOrFail();
        $user->roles()->sync($staffRole->id);

        $staff = new Staff();
            $staff->staff_id = $user->id;
            $staff->created_at = Now();
            $staff->updated_at = Now();
        $staff->save();

        return redirect('/admin')->with('success', 'User\'s role has been updated');
    }

    public function deleteUser(User $user)
    {
        if(Auth::user()->id == $user->id){
            return redirect('/admin')->with('warning', 'You cannot delete yourself');
        }

        $id = User::find($user->id);
        $role = $user->roles->pluck('name');

        if($role->contains('staff')){
            $findStaff = Staff::find($user->id);
            $findStaff->delete();
        }

        if($role->contains('student')){
            $findStudent= Student::where('student_id', $user->id);
            $findStudent->delete();
        }

        if($id){
            $id->roles()->detach();
            $id->delete();

            return redirect('/admin')->with('deleted', 'User has been deleted');
        }

        return redirect('/admin')->with('warning', 'User has not been deleted');

    }
}
