<?php

namespace App\Http\Middleware;

use Closure;
use Auth;

class Bangladesh
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
       if(Auth::guard('bangladesh')){
        return $next($request);
       }
       
    }
}
