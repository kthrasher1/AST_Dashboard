<?php

namespace App\Events;

use Illuminate\Queue\SerializesModels;
use App\User;
use App\Student;
use App\StudentData;


class FinishedCheckup
{
    use SerializesModels;

    public $studentData;

    /**
     * Create a new event instance.
     *
     * @param  \App\StudentData  $studentData
     * @return void
     */

    public function __construct(StudentData $studentData)
    {
        $this->studentData = $studentData;
    }


}
