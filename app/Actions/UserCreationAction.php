<?php

namespace App\Actions\User;

use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserCreationAction
{
    public function execute($data)
    {
        // Criando o usuário
        $user = User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']), // Hasheando a senha
        ]);

        return $user;
    }
}
