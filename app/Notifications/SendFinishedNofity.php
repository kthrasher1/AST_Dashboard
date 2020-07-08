<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use App\StudentData;
use App\User;

class SendFinishedNofity extends Notification
{
    use Queueable;

    protected $studentData;
    protected $user;
    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct(StudentData $studentData, User $user)
    {
        $this->studentData = $studentData;
        $this->user = $user;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['database'];
    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        return [

            'checkup_id' => $this->studentData->id,
            'student_id' => $this->studentData->student_id,
            'risk_level' => $this->studentData->risk_level,
            'name' => $this->user->name,

        ];
    }
}
