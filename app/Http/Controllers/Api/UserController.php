<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\ApiFormRequest;
use App\Http\Requests\UserAuthRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    public function store(UserAuthRequest $request)
{
    // A validação já será feita automaticamente pelo FormRequest
    // Criação do usuário
    $user = User::create([
        'name' => $request->name,
        'email' => $request->email,
        'password' => Hash::make($request->password), // Hasheia a senha
    ]);

    return response()->json(['user' => $user], 201);
}

}
