<?php

use Illuminate\Database\Seeder;

use App\Role;
use App\Permission;

class RolePermissionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role = Role::create([
            'name' => 'root',
            'label' => 'Can do Anything?',
        ]);

        $role->assign([
            Permission::create([
                'name' => 'view-user',
                'label' => 'Can create user',
            ]),
            Permission::create([
                'name' => 'create-user',
                'label' => 'Can create user',
            ]),
            Permission::create([
                'name' => 'update-user',
                'label' => 'Can update user',
            ]),
            Permission::create([
                'name' => 'delete-user',
                'label' => 'Can delete user',
            ]),
            Permission::create([
                'name' => 'view-dashboard',
                'label' => 'Can view dashboard',
            ]),
        ]);
    }
}
