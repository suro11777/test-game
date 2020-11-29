<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    /**
     *
     */
    public function run()
    {
        DB::table('users')->insert([
            [
                'first_name' => 'admin',
                'last_name' => 'adminyan',
                'email' => 'admin@mail.ru',
                'password' => Hash::make('adminadmin'),
                'role' => ConstUserRole::ADMIN,
            ],
        ]);
    }
}
