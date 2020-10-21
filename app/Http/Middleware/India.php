<?php

namespace App\Http\Middleware;

use Closure;
use Auth;

class India
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
        if(Auth::guard('india')){
            return $next($request);
           }
    }
}
