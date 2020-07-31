<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Message extends Model
{

    protected $guarded = [];

    public function Contact(){
        return $this->hasOne(User::class, 'id', 'from' );
    }
}
