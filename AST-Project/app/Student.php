<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    //

    public function staff(){
        return $this->belongsToMany(Staff::class);
    }

    public function student_users(){
        return $this->belongsToMany(User::class);
    }
}
