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
        $users = User::with('roles')->get();
        $notif = auth()->user()->unreadNotifications;

        return view('admin', [
            'users' => $users,
            'notify' => $notif,
        ]);
    }

    public function markedAsRead(Request $request)
    {
        auth()->user()
            ->unreadNotifications
            ->when($request->input('id'), function ($query) use ($request) {
                return $query->where('id', $request->input('id'));
            }) ->markAsRead();

        return redirect('/admin');
    }



    public function giveAdmin(User $user)
    {
        if (Auth::id() == $user->id) {
            return redirect('/admin') -> with('warning', 'you are already admin, silly');
        }

        $adminRole = Role::where('name', 'admin')->firstOrFail();
        $user->roles()->sync($adminRole->id);

        return redirect('/admin')->with('success', 'User\'s role has been updated');
    }

    public function removeRole(User $user)
    {
        if (Auth::id() == $user->id) {
            return redirect('/admin')->with('warning', 'you can\'t remove your own permissions, silly');
        }

        $removeRole = Role::where('name', 'unassigned')->firstOrFail();
        $user->roles()->sync($removeRole->id);

        return redirect('/admin')->with('success', 'User\'s role has been removed');
    }

    public function makeStudent(User $user)
    {
        if (Auth::id() ==$user->id) {
            return redirect('/admin')->with('warning', 'you can\'t update your own permissions, silly');
        }
            $studentRole = Role::where('name', 'student')->firstOrFail();
            $user->roles()->sync($studentRole->id);

        return redirect('/admin')->with('success', 'User\'s role has been updated');
    }

    public function makeStaff(User $user)
    {
        if (Auth::id()== $user->id) {
            return redirect('/admin')->with('warning', 'you can\'t update your own permissions, silly');
        }

            $staffRole = Role::where('name', 'staff')->firstOrFail();
            $user->roles()->sync($staffRole->id);

        return redirect('/admin')->with('success', 'User\'s role has been updated');
    }

    public function deleteUser(User $user)
    {
        $user = User::findOrFail($user);
        $user->delete();

        return redirect('/admin')->with('deleted', 'User has been deleted');
    }
}
