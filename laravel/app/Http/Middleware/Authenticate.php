<?php

namespace App\Http\Middleware;
use Closure;
use Illuminate\Auth\Middleware\Authenticate as Middleware;
use Illuminate\Support\Facades\Auth;

class Authenticate extends Middleware
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return string|null
     */
    protected function redirectTo($request)
    {
        if (! $request->expectsJson()) {
            return route('login');
        }
        
    }
    // public function handle($request, closure $next,...$guards)
    // {
    //     $guards = empty($guards)?[null]:$guards;

    //     if(!Auth::check()){
    //         return redirect()->route('login');
    //     } 
    //     return $next($request);
    // }
}

