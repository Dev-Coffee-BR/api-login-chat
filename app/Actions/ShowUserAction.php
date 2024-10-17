<?php
namespace App\Actions\User;

use App\Models\User;

class ShowUserAction
{
    public function execute($id)
    {
        // Buscando o usuário pelo ID
        $user = User::find($id);

        // Verificando se o usuário foi encontrado
        if (!$user) {
            throw new \Exception('User not found');
        }

        return $user;
    }
}
