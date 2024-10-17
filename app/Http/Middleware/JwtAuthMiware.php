<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Foundation\Configuration\Middleware;
use Tymon\JWTAuth\Facades\JWTAuth;
use Tymon\JWTAuth\Exceptions\JWTException;
use Illuminate\Http\Request;

class JwtAuthMiware
{
    public function handle(Request $request, Closure $next)
    {
        try {
            // Tenta obter o usuário autenticado
            if (!$user = JWTAuth::parseToken()->authenticate()) {
                return response()->json(['error' => 'Usuário não encontrado'], 404);
            }
        } catch (JWTException $e) {
            return response()->json(['error' => 'Token inválido'], 401);
        }

        // Adiciona o usuário ao request para que possa ser usado posteriormente
        $request->attributes->add(['user' => $user]);

        return $next($request);
    }
}
