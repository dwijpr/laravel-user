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
            // $this->roleChange($role);
        });
        Role::saved(function ($role) {
            $role->updatePermissions();
            // $this->roleChange($role);
        });
    }

    // public function roleChange($role){
    //     $role->destroyPermissions();
    //     $permissions = request()->permissions;
    //     $role->permissions()->detach($role->permissions);
    //     if (count($permissions) > 0) {
    //         foreach ($permissions as $permission) {
    //             $role->assign($permission);
    //         }
    //     }
    // }

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
