<?php

use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\User\UserController;
use Illuminate\Support\Facades\Route;
use App\Http\Middleware\JwtAuthMiware; // Atualizado para o nome correto do middleware

// Aplicando o middleware JWT nas rotas protegidas
Route::middleware([JwtAuthMiware::class])->group(function () {
    // Rota para obter informações do usuário autenticado
    Route::get('/user/{id}', [UserController::class, 'show'])
        ->name('user.find.id'); // Chama o método show do UserController

    // Rota para criar um novo usuário
    Route::post('/users', [UserController::class, 'store'])
        ->name('user.find.all');
    // Rota para logout
    Route::post('/logout', [AuthController::class, 'logout'])
        ->name('user.logout');
});

// Rota pública para login
Route::post('/login', [AuthController::class, 'login'])
    ->name('user.login');
