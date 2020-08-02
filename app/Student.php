<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Student extends model
{
    protected $guarded = [];

    public function user()
    {
        return $this->belongsTo(User::class, 'student_id');
    }
    public function staff()
    {
        return $this->belongsTo(Staff::class, 'ast_id');
    }

    public function student_data()
    {
        return $this->hasMany(StudentData::class);
    }

    public function module()
    {
        return $this->hasMany(ModuleData::class, 'student_id');
    }
}
