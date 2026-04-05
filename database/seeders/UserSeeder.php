<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
{
	public function run(): void
	{
		User::create([
			'name' => 'Admin',
			'email' => 'admin@gmail.com',
			'password' => \Illuminate\Support\Facades\Hash::make('12345'),
			'role' => 'admin',
		]);

		User::create([
			'name' => 'Pelanggan Satu',
			'email' => 'pelanggan1@gmail.com',
			'password' => \Illuminate\Support\Facades\Hash::make('12345'),
			'role' => 'customer',
		]);
	}
}
