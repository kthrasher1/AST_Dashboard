<?php

namespace App\Http\Controllers;

use App\UserMessage;
use App\Events\MessageSent;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\User;
use App\Student;

class ChatController extends Controller
{
    //

    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show chat interface
     *
     * @return \Illuminate\Http\Response
     */
    public function staffChat(Request $request)
    {

        $currentUser = Auth::user()->id;
        $students = User::where('id', $request->studentid)->get();

        return view('staff-pages.staffChat', [
           'students' => $students, 'currentUser' => $currentUser
        ]);
    }

    public function studentChat (Request $request)
    {
        $currentUser = Auth::user()->id;
        $staff = User::where('id', $request->staffid)->get();

        return view('student-pages.StudentChat', [
            'staff' => $staff, 'currentUser' => $currentUser
         ]);
    }

    /**
     * Gets all the messages relational to the user
     *
     * @return UserMessage
     */

    public function GetMessages(){
        return UserMessage::with('user')->get();
    }

    /**
     * Put message into DB
     *
     * @param Request $request
     * @return Response
     */

     public function PostMessages(Request $request){
         $user = Auth::user();

         $message = $user->messages()->create([
             'message' => $request->input('message')
         ]);

         broadcast(new MessageSent($user, $message))->toOthers();

         return ['status' => 'Message Sent!'];

     }

}
