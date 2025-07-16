<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'Lab Politeknik Mardira',
            'email' => 'datadatakampus@mail.com',
            'password' => Hash::make('Politeknik2023'), // Ganti dengan password yang aman
            'role' => 'admin',
        ]);
    }
}
