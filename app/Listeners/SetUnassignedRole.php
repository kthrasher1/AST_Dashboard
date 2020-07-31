<?php

namespace App\Listeners;

use App\Events\UserCreated;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use App\Role;
use App\User;

class SetUnassignedRole
{
    /**
     * Handle the event.
     *
     * @param  UserCreated  $event
     * @return void
     */
    public function handle(UserCreated $event)
    {
        $userRoles= $event->user->roles()->get();

        if($userRoles->isEmpty()){
            $role = Role::where('name', 'unassigned')->firstOrFail();
            $event -> user ->roles()->sync($role->id);
        }
    }
}
