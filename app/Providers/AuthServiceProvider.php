<?php

namespace App\Providers;

use App\Models\User;
use App\Models\Tank;
use App\Models\Plane;
use App\Models\Team;
use App\Policies\TeamPolicy;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        Team::class => TeamPolicy::class,
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        //Gate para que solo el admin pueda editar vehiculos
        Gate::define('edita-vehiculo', function(User $user){
            return $user->rol == "admin";
        });

        //Gate para que solo el admin pueda editar naciones y conflictos
        Gate::define('edita-nacionconflicto', function(User $user){
            return $user->rol == "admin";
        });
    }
}
