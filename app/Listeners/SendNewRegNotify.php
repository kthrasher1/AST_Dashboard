<?php

namespace App\Listeners;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Notification;
use App\User;
use App\Notifications\SendRegNotify;
use Illuminate\Support\Facades\Auth;


class SendNewRegNotify
{
    /**
     * Handle the event.
     *
     * @param  object  $event
     * @return void
     */
    public function handle($event)
    {
        $admin = User::whereHas('roles', function($query){
            $query->where('name', 'admin');
        })->get();

        Notification::send($admin, new SendRegNotify($event->user));
    }
}
