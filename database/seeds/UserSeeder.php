<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;


class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'admin',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('123'),
            'sex' => 1,
            'address' => 'Bách Khoa',
            'phone' => '0339 xxx xxx',
            'role' => 2
        ]);

        DB::table('users')->insert([
            'name' => 'editor',
            'email' => 'editor@gmail.com',
            'password' => Hash::make('123'),
            'sex' => 1,
            'address' => 'Bách Khoa',
            'phone' => '0339 xxx xxx',
            'role' => 1
        ]);

        DB::table('users')->insert([
            'name' => 'user',
            'email' => 'user@gmail.com',
            'password' => Hash::make('123'),
            'sex' => 1,
            'address' => 'Bách Khoa',
            'phone' => '0339 xxx xxx',
            'role' => 0
        ]);

        factory(App\User::class, 10)->create();
    }
}
