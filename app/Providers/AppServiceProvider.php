<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

use App\Role;
use App\User;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Role::created(function ($role) {
            $role->updatePermissions();
        });
        Role::saved(function ($role) {
            $role->updatePermissions();
        });
        User::created(function ($user) {
            $user->updateRoles();
        });
        User::saved(function ($user) {
            $user->updateRoles();
        });
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
