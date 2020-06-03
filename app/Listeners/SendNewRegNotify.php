<?php

namespace App\Listeners;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Notification;
use App\User;
use App\Notifications\SendRegNotify;


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
            $query->where('id', 1);
        })->get();

        Notification::send($admin, new SendRegNotify($event->user));
    }
}
