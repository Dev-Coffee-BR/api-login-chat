<?php

namespace App\Http\Controllers\Api;

use App\Actions\LoginAction;
use App\Actions\LogoutAction;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\ApiFormRequest;

class AuthController extends Controller
{
    protected $loginAction;
    protected $logoutAction;

    public function __construct(LoginAction $loginAction, LogoutAction $logoutAction)
    {
        $this->loginAction = $loginAction;
        $this->logoutAction = $logoutAction;
    }

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
