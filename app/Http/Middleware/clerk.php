<?php

namespace App\Http\Middleware;

use Closure;

class clerk
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
        if(auth()->check())
            if(auth()->user()->designation == 2)
                return $next($request);
            else
                return redirect()->home();
        else
            return redirect()->route('login');
    }
}
