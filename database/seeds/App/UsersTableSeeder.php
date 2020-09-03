<?php

use App\User;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    public function run()
    {
        User::create([
            'name' => env('USER_NAME', 'Administrador Supremo'),
            'email' => env('USER_EMAIL', 'admin@a.com'),
            'password' => env('USER_PASSWORD', '123456')
        ]);
        //$user->assignRole('administrator');
    }
}
