<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        User::create([
            'name' => 'Admin User',
            'email' => 'admin@example.com',
            'password' => Hash::make('password'),
            'role' => 'admin',
        ]);
        User::create([
            'name' => 'Marketing User',
            'email' => 'marketing@example.com',
            'password' => Hash::make('password'),
            'role' => 'marketing',
        ]);
        User::create([
            'name' => 'CEO User',
            'email' => 'ceo@example.com',
            'password' => Hash::make('password'),
            'role' => 'ceo',
        ]);
    }
}
