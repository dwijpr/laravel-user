<?php

use Illuminate\Database\Seeder;

use App\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'dwijpr',
            'email' => 'dwijpr@gmail.com',
            'password' => bcrypt('asdfasdf'),
        ]);
        User::create([
            'name' => 'Owl Prestige',
            'email' => 'owljpr@gmail.com',
            'password' => bcrypt('asdfasdf'),
        ]);
        User::create([
            'name' => 'Dummy',
            'email' => 'dummy@gmail.com',
            'password' => bcrypt('asdfasdf'),
        ]);
    }
}
