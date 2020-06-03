<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ModuleData extends Model
{

    public function studentData(){
        return $this->belongsTo(Student::class, 'student_id');
    }
}
