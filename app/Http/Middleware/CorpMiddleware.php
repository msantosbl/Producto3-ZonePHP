<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CorpMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        // Verifica si el usuario está autenticado y tiene tipo_usuario '2' o '0'
        if (Auth::check() && (Auth::user()->tipo_usuario == '2' || Auth::user()->tipo_usuario == '0')) {
            return $next($request); // Permite continuar si es '2' (corp) o '0' (admin)
        }

        // Si no tiene permisos, redirige al login con un mensaje de error
        return redirect()->route('login')
            ->with('error', 'No tienes permisos para acceder a esta página.');
    }
}
