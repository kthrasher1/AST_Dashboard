<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \app\User;
use \app\Role;
use Illuminate\Support\Facades\Auth;


class AdminController extends Controller
{

   public function index()
    {
        $users = User::with('roles')->paginate(5);
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
        if (Auth::id() ==$user->id) {
            return redirect('/admin')->with('warning', 'you can\'t update your own permissions');
        }
            $studentRole = Role::where('name', 'student')->firstOrFail();
            $user->roles()->sync($studentRole->id);

        return redirect('/admin')->with('success', 'User\'s role has been updated');
    }

    public function makeStaff(User $user)
    {
        if (Auth::id()== $user->id) {
            return redirect('/admin')->with('warning', 'you can\'t update your own permissions');
        }

            $staffRole = Role::where('name', 'staff')->firstOrFail();
            $user->roles()->sync($staffRole->id);

        return redirect('/admin')->with('success', 'User\'s role has been updated');
    }

    public function deleteUser(User $user)
    {
        if(Auth::user()->id == $user->id){
            return redirect('/admin')->with('warning', 'You cannot delete yourself');
        }

        $id = User::find($user->id);

        if($id){
            $id->roles()->detach();
            $id->delete();

            return redirect('/admin')->with('deleted', 'User has been deleted');
        }

        return redirect('/admin')->with('warning', 'User has not been deleted');

    }
}
