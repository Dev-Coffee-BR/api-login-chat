<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserAuthRequest;
use App\Actions\UserCreationAction;
use App\Actions\ShowUserAction;

class UserController extends Controller
{
    protected $userCreationAction;
    protected $showUserAction;

    public function __construct(UserCreationAction $userCreationAction, ShowUserAction $showUserAction)
    {
        $this->userCreationAction = $userCreationAction;
        $this->showUserAction = $showUserAction;
    }

    public function store(UserAuthRequest $request)
    {
        // Executando a ação de criação do usuário
        $user = $this->userCreationAction->execute($request->validated());

        return response()->json(['user' => $user], 201);
    }

    public function show($id)
    {
        try {
            // Executando a ação de mostrar o usuário
            $user = $this->showUserAction->execute($id);

            return response()->json($user);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 404);
        }
    }
}
