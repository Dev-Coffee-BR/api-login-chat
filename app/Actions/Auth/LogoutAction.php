<?php

namespace App\Actions\Auth;

use Tymon\JWTAuth\Facades\JWTAuth;

class LogoutAction {
    public function execute() {
        try {
            JWTAuth::invalidate(JWTAuth::getToken());
            return response()->json(['message' => 'Logout realizado com sucesso']);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Erro ao fazer logout'], 500);
        }
    }
}


