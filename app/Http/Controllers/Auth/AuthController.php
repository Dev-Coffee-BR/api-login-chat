<?php

namespace App\Http\Controllers\Auth;

use App\Actions\Auth\LoginAction;
use App\Actions\Auth\LogoutAction;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AuthController extends Controller
{

    public function __construct(
        private LoginAction $loginAction,
        private LogoutAction $logoutAction){}

    // Login
    public function login(Request $request)
    {
        return $this->loginAction->execute($request->only('email', 'password'));
    }

    // Logout
    public function logout()
    {
        return $this->logoutAction->execute();
    }

    public function user(Request $request) {
        return response()->json($request->user());
    }
}
