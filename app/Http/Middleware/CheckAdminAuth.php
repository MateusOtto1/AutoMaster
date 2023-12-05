<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class CheckAdminAuth
{
    public function handle($request, Closure $next)
    {
        // Verifica se o usuário está autenticado como admin
        if (request()->cookie('userType') == 'admin' && Auth::guard('admin')->check()) {
            return $next($request);
        }

        // Se não estiver autenticado, redireciona para a tela de login
        return redirect('/')->withErrors(['error' => 'Acesso não autorizado']);
    }
}
