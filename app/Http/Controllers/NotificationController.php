<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class NotificationController extends Controller
{
    public function MarkedRead(Request $request)
    {
        $notificationId = $request->notifID;

        $userUnreadNotification = auth()->user()
                                    ->unreadNotifications
                                    ->where('id', $notificationId)
                                    ->first();

        if($userUnreadNotification) {
            $userUnreadNotification->markAsRead();
        }

        return redirect()->back();
    }
}
