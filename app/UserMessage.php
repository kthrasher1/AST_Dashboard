<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserMessage extends Model
{
    protected $guarded=[];
    /**
     * Fields that are mass assignable
     *
     * @var array
     */
    protected $fillable = ['message'];


    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
