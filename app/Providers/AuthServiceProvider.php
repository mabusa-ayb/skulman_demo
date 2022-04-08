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

        /* define a admin user role */
        Gate::define('isAdmin', function($user) {
            return $user->user_type == '0';
        });

        /* define a student user role */
        Gate::define('isStudent', function($user) {
            return $user->user_type == '1';
        });

        /* define a teacher role */
        Gate::define('isTeacher', function($user) {
            return $user->user_type == '2';
        });

        /* define a clerk role */
        Gate::define('isClerk', function($user) {
            return $user->user_type == '3';
        });

        /* define a bursar role */
        Gate::define('isBursar', function($user) {
            return $user->user_type == '4';
        });

        /* define a headmaster role */
        Gate::define('isHeadmaster', function($user) {
            return $user->user_type == '5';
        });
    }
}
