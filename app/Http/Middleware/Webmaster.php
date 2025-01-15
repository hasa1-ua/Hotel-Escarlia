<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class Webmaster
{
    public function handle($request, Closure $next)
    {
        if (Auth::check() && Auth::user()->isWebmaster()) {
            return $next($request);
        }
        return redirect('/permiso-denegado');
    }
}