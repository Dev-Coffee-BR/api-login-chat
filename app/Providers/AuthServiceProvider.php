<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * O mapeamento de políticas de autorização.
     *
     * @var array
     */
    protected $policies = [
        // 'App\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Registre as permissões de autenticação para o aplicativo.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        // Exemplos de definições de Gates
        Gate::define('view-post', function ($user, $post) {
            return $user->id === $post->user_id;
        });

        Gate::define('update-post', function ($user, $post) {
            return $user->id === $post->user_id;
        });

        // Você pode adicionar mais Gates aqui conforme necessário
    }
}
