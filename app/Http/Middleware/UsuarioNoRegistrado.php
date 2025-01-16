<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class UsuarioNoRegistrado
{
    public function handle($request, Closure $next)
    {
        if (!Auth::check()) {
            return redirect('/permiso-denegado');
        }
        return $next($request);
    }
}