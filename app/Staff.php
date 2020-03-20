<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Staff extends Model
{
    //

    public function students(){
        return $this->belongsToMany(Student::class);
    }

    public function staff_users(){
        return $this->belongsToMany(User::class);
    }
}
