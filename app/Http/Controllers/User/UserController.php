<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserAuthRequest;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

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
public function show($id)
{
    // Busca o usuário pelo ID
    $user = User::find($id);

    // Verifica se o usuário foi encontrado
    if (!$user) {
        return response()->json(['error' => 'Usuário não encontrado'], 404);
    }

    // Retorna o usuário como JSON
    return response()->json($user);
}
}
