<?php

namespace App\Http\Middleware;

use Closure;
use Auth;

class CheckGM
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
        if(Auth::check() && Auth::user()->isGM()){
            return $next($request);
        }else{
            return abort(401, 'Unauthorized action.');
        }
    }
}
