<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin = User::create([
            'name' => 'Admin Role',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('12345678'),
        ]);

        $admin->assignRole('admin');

        $headOf = User::create([
            'name' => 'Head Role',
            'email' => 'head@gmail.com',
            'password' => bcrypt('12345678'),
        ]);

        $headOf->assignRole('headOf');

        $user = User::create([
            'name' => 'User Role',
            'email' => 'user@gmail.com',
            'password' => bcrypt('12345678'),
        ]);

        $user->assignRole('user');
    }
}
