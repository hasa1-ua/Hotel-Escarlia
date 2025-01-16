<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class UsuarioRegistrado
{
    public function handle($request, Closure $next)
    {
        if (Auth::check() && Auth::user()->isCliente()) {
            return $next($request);
        }
        return redirect('/permiso-denegado');
    }
}