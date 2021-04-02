<?php

namespace App\Http\Middleware;

use Closure;

class registrar
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
            if(auth()->user()->designation == 3)
                return $next($request);
            else
                return redirect()->home();
        else
            return redirect()->route('login');
    }
}
