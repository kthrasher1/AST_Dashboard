<?php

namespace App\Http\Middleware;
use Auth;
use App\User;
use Illuminate\Http\Request;
use Closure;

class IsStudent
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $userRoles = Auth::user()->roles->pluck('name');

        if(!$userRoles->contains('student')) 
        {
            return redirect('/no-permissions');
        }

        return $next($request);
    }
}
