<?php

namespace App\Listeners;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Notification;
use App\Events\FinishedCheckup;
use App\Notifications\SendFinishedNofity;
use App\StudentData;
use App\Student;
use App\User;

class SendFinishedCheckup
{

    /**
     * Handle the event.
     *
     * @param  FinishedCheckup  $event
     * @return void
     */
    public function handle(FinishedCheckup $event)
    {
        $studentUser = Student::where('student_id', $event->studentid)->get();

        $staff = User::whereHas('staff', function ($query) use ($studentUser) {
            $query->whereIn('id', $studentUser->pluck('ast_id'));
        })->get();

        Notification::send($staff, new SendFinishedNofity($event->studentData));
    }
}
