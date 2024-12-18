<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;
use App\Models\TransferViajero;

class AuthMiddleware
{
    public function handle($request, Closure $next)
    {
        if (!Auth::check()) {
            
            return redirect()->route('login.view')
                ->with('error', 'Debes iniciar sesión para acceder a esta página.');
        }

        // // Verifica los datos del usuario
        // $user = Auth::user();
        // dd($user); // Esto debería mostrar los datos del usuario autenticado
        
        return $next($request);
    }
}
