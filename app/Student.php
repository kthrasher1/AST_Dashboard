<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Student extends model
{
    public function user()
    {
        return $this->belongsTo(User::class, 'student_id');
    }
    public function staff()
    {
        return $this->belongsTo(Staff::class, 'ast_id');
    }
}
