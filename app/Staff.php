<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Staff extends model
{
    public function user()
    {
        return $this->belongsTo(User::class, 'staff_id');
    }
    public function students()
    {
        return $this->hasMany(Student::class, 'ast_id');
    }
}
