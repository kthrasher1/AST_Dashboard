<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;
use App\Message;
use App\Events\NewMessage;
use Illuminate\Support\Facades\Crypt;

class ChatController extends Controller
{
    public $id;

    public function StaffChat(Request $request){
        return view('staff-pages.staffChat');
    }

    public function StudentChat(){

        return view('student-pages.studentChat');
    }

    public function GetContacts(){
        $contacts = User::all();
        $userRoles = Auth::user()->roles->pluck('name');

        if($userRoles->contains('staff')){

            $staff = Auth::user()->staff;
            $studentUser = User::whereHas('student', function ($query) use ($staff) {
                $query->whereIn('ast_id', $staff->pluck('id'));
            })->get();

            $unreadID = Message::select(\DB::raw('`from` as sender_id, count(`from`) as messages_count'))
            ->where('to', auth()->id())
            ->where('read', false)
            ->groupBy('from')
            ->get();

            $studentUser = $studentUser->map(function($query) use ($unreadID){
                $UnreadMessage = $unreadID->where('sender_id', $query->id)->first();
                $query->unread = $UnreadMessage ? $UnreadMessage->messages_count : 0;
                return $query;
            });

            return response()->json($studentUser);
        }

        if($userRoles->contains('student')){

            $studentUser = Auth::user()->student;

            $staff = User::whereHas('staff', function ($query) use ($studentUser) {
                $query->whereIn('id', $studentUser->pluck('ast_id'));
            })->get();

            $unreadID = Message::select(\DB::raw('`from` as sender_id, count(`from`) as messages_count'))
            ->where('to', auth()->id())
            ->where('read', false)
            ->groupBy('from')
            ->get();

            $staff = $staff->map(function($query) use ($unreadID){
                $UnreadMessage = $unreadID->where('sender_id', $query->id)->first();
                $query->unread = $UnreadMessage ? $UnreadMessage->messages_count : 0;
                return $query;
            });

            return response()->json($staff);
        }

        $unreadID = Message::select(\DB::raw('`from` as sender_id, count(`from`) as messages_count'))
            ->where('to', auth()->id())
            ->where('read', false)
            ->groupBy('from')
            ->get();



        $contacts = $contacts->map(function($query) use ($unreadID){
            $UnreadMessage = $unreadID->where('sender_id', $query->id)->first();
            $query->unread = $UnreadMessage ? $UnreadMessage->message_count : 0;

            return $query;
        });


        return response()->json($contacts);
    }

    public function GetMessages($id){

        Message::where('from', $id)->where('to', Auth::user()->id)->update(['read' => true]);

        $messages = Message::where(function($query) use ($id) {
            $query->where('from', Auth::user()->id);
            $query->where('to', $id);
        })-> orWhere(function($query) use ($id){
                $query->where('from', $id);
                $query->where('to', Auth::user()->id);
        })->get();

        return response()->json($messages);
    }

    public function SendMessages(Request $request){

        $message = Message::create([
            'from' => auth()->id(),
            'to' => $request->contact_id,
            'content' => $request->text
        ]);

        broadcast(new NewMessage($message));

        return response()->json($message);
    }
}
