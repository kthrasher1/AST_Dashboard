<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Cache;
use App\Events\UserCreated;
use Webpatser\Uuid\Uuid;


class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    protected $dispatchesEvents = [
        'saved' => UserCreated::class,

    ];

    public function roles() {
        return $this -> belongsToMany('App\Role');

    }

    public function student() {
        return $this -> belongsToMany('App\Student');

    }

    public function staff() {
        return $this -> belongsToMany('App\Staff');

    }

    public function messages()
    {
    return $this->hasMany(UserMessage::class);
    }

    public function hasRole($role){
        $role = $this->roles()->where('name', $role)->count();

        if($role == 1) {
            return true;
        }

        return false;
    }

    public function isOnline(){

        return Cache::has('is-user-online-' . $this->id);

    }

    public static function boot()
    {
        parent::boot();
        self::creating(function ($model) {
            $model->user_id = (string) Uuid::generate(4);
        });
    }





}
