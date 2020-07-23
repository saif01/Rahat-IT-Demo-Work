<?php

namespace App\Providers;

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
        // 'App\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        //Administrator
        Gate::define('administration', function($user){
            return $user->hasRole(['Administrator']);
        });


        //Add Access
        Gate::define('insert', function($user){
            return $user->hasAnyRoles(['Administrator', 'Add']);
        });

        //Edit Access
        Gate::define('edit', function($user){
            return $user->hasAnyRoles(['Administrator', 'Edit']);
        });

        //Delete
        Gate::define('delete', function($user){
            return $user->hasAnyRoles(['Administrator', 'Delete']);
        });

        Gate::define('publish', function($user){
            return $user->hasAnyRoles(['Administrator', 'Publish']);
        });

    }
}
