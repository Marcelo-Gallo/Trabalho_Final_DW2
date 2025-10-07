<?php

namespace App\Providers;

// Adicione esta linha para importar a classe Gate
use Illuminate\Support\Facades\Gate; 
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        //
    ];

    /**
     * Register any authentication / authorization services.
     */
    public function boot(): void
    {
        // Adicione a definição do seu Gate aqui
        Gate::define('is_admin', function ($user) {
            return $user->is_admin;
        });
    }
}