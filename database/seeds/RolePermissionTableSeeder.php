<?php

use Illuminate\Database\Seeder;

use App\Role;
use App\Permission;
use App\User;

class RolePermissionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $permissions = [
            'manage-users' => Permission::create([
                'name' => 'manage-users',
                'label' => 'Permission to view, create, update, delete Users',
            ]),
            'manage-roles' => Permission::create([
                'name' => 'manage-roles',
                'label' => 'Permission to view, create, update, delete Roles',
            ]),
            'manage-permissions' => Permission::create([
                'name' => 'manage-permissions',
                'label' => 'Permission to view, create, update, delete Permissions',
            ]),
        ];

        $roles = [
            'root' => Role::create([
                'name' => 'root',
                'label' => 'Have all permissions',
                'priority' => 1,
            ]),
            'admin-user' => Role::create([
                'name' => 'admin-user',
                'label' => 'Have full access to manage users',
                'priority' => 2,
            ]),
        ];

        $roles['root']->assign([
            $permissions['manage-users'],
            $permissions['manage-roles'],
            $permissions['manage-permissions'],
        ]);
        $roles['admin-user']->assign([
            $permissions['manage-users'],
        ]);

        User::where(['email' => 'dwijpr@gmail.com'])->first()->assign('root');
        User::where(['email' => 'owljpr@gmail.com'])->first()->assign('admin-user');
    }
}
