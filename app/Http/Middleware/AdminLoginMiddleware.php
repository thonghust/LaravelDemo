<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class AdminLoginMiddleware
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
        if(Auth::check() && Auth::user()->quyen == 1)
        {
            return $next($request);
        }
        else if(Auth::check() && Auth::user()->quyen == 0)
        {
            return redirect()->route('Trangchu');
        }
        else
        {
            return redirect()->route('Trangchu');
        }
    }
}
