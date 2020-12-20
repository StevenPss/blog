<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::where('email', 'pulessteven@gmail.com')->first();

        if (!$user) {
            User::create([
                'name' => 'StevenPss',
                'email' => 'pulessteven@gmail.com',
                'role' => 'admin',
                'password' => Hash::make('password'),
            ]);
        }
    }
}
