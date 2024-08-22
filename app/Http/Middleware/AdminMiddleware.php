<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class CheckRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string  $role
     * @return mixed
     */
    public function handle(Request $request, Closure $next, $role)
    {
        // Verifica si el usuario está autenticado y tiene el rol requerido
        if (auth()->check() && auth()->user()->role === $role) {
            return $next($request);
        }

        // Redirige si el usuario no tiene el rol requerido
        return redirect('/')->with('error', 'Acceso denegado.');
    }
}
