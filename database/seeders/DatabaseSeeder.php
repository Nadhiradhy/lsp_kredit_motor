<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        \App\Models\User::create([
            'name' => 'Admin',
            'email' => 'admin@example.com',
            'password' => \Illuminate\Support\Facades\Hash::make('12345'),
            'role' => 'admin',
        ]);

        \App\Models\User::create([
            'name' => 'Pelanggan Satu',
            'email' => 'pelanggan1@example.com',
            'password' => \Illuminate\Support\Facades\Hash::make('12345'),
            'role' => 'customer',
        ]);
    }
}
