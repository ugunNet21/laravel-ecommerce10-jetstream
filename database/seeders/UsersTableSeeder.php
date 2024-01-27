<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            "name" => "Super Admin",
            "email" => "superadmin@gmail.com",
            "password" => bcrypt("superadmin123456"),
            'role' => 'super_admin',
        ]);
        // Admin
        User::create([
            'name' => 'Admin',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('admin123456'),
            'role' => 'admin',
        ]);

        // Pegawai
        User::create([
            'name' => 'Pegawai',
            'email' => 'pegawai@gmail.com',
            'password' => Hash::make('pegawai123456'),
            'role' => 'pegawai',
        ]);

        // User Biasa
        User::create([
            'name' => 'User Biasa',
            'email' => 'user@gmail.com',
            'password' => Hash::make('user123456'),
            'role' => 'user',
        ]);
    }

}
