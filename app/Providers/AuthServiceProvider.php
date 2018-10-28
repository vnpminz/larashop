<?php

namespace App\Providers;

use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        'App\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        Gate::define('employee',function($user){
            return $user->permission == 2 || $user->permission == 1;
        });

        Gate::define('shipper', function($user){
            return $user->permission == 3 || $user->permission == 1;
        });

        Gate::define('admin', function($user){
            return $user->permission == 1;
        });
    }
}
