<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

use App\Role;

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
