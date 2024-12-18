<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminMiddleware
{
    public function handle(Request $request, Closure $next)
    {

        // Verifica si el tipo de usuario es '0'
        if (Auth::check() && Auth::user()->tipo_usuario == '0') {
            return $next($request); // Permite continuar si es '0'
        } 
        // Si el tipo de usuario es '1', redirige al perfil de usuario con un mensaje de error
        elseif (Auth::check() && Auth::user()->tipo_usuario == '1') {
            return redirect()->route('perfilUser')
                ->with('error', 'No tienes permisos para acceder a esta página.');
        } 
        // Si el tipo de usuario es '2', redirige al perfil de empresa (perfilCorp)
        elseif (Auth::check() && Auth::user()->tipo_usuario == '2') {
            return redirect()->route('perfilCorp')
                ->with('error', 'No tienes permisos para acceder a esta página.');
        } 

        // Si no es ninguno de los tipos esperados, redirige a una ruta general (opcional)
        return redirect()->route('login')
            ->with('error', 'Tipo de usuario no válido para acceder a esta página.');
    }
}
