<?php

use App\Http\Controllers\Api\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Laravel\Sanctum\HasApiTokens;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');



Route::middleware('auth:sanctum')->group(function () {
});

Route::post('/users', [UserController::class, 'store']);

Route::post('login', function (Request $request){
    $credentials = $request->only(['email', 'password']);
    if (Auth::attempt($credentials) === false){
        return response()->json('Unauthorized', 401);
    }

    $user = Auth::user();
    $token = $user->createToken('token');
    return response()->json($token->plainTextToken);
});
