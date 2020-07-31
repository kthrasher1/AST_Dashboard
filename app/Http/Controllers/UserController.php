<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use Hash;
use Image;
use File;


class UserController extends Controller
{

    public function profile() {
        return view('profile', array('user' => Auth::user()) );
    }

    public function ImageUpdate(Request $request){


        if($request->hasFile('avatar')){
            $avatar = $request->file('avatar');
            $filename = time() . '.' . $avatar->getClientOriginalExtension();
            $user = Auth::user();

            if($user->avatar !== 'user.jpg'){
                $file = public_path('/uploads/avatars/' . $user->avatar);

                if(File::exists($file)){
                    unlink($file);
                }
            }

            Image::make($avatar)->resize(100, 100)->save(public_path('/uploads/avatars/' . $filename));


            $user->avatar = $filename;
            $user->save();

        }
        return view('profile', array('user' => Auth::user()));
    }

    public function UpdatePassword(Request $request){

        if (!(Hash::check($request->get('current-password'), Auth::user()->password))) {
            return redirect()->back()->with("error","Your current password does not matches with the password you provided. Please try again.");
        }

        if(strcmp($request->get('current-password'), $request->get('new-password')) == 0){
            return redirect()->back()->with("error","New Password cannot be same as your current password. Please choose a different password.");
        }

        $validatedData = $request->validate([
            'current-password' => 'required',
            'new-password' => 'required|string|min:6|confirmed',
        ]);

        $user = Auth::user();
        $user->password = bcrypt($request->get('new-password'));
        $user->save();

        return redirect()->back()->with("success","Password changed successfully !");

    }

}
