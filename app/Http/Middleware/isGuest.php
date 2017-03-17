<?php

namespace App\Http\Middleware;

use Closure;
use Auth;

class isGuest
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
        if(Auth::guard('player')->check()){
            return redirect('/player');
        }
        return $next($request);
    }
}
