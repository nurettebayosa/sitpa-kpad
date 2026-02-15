<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        // 1. Akun Admin (Super User)
        DB::table('users')->insert([
            'name' => 'Administrator KPAD',
            'email' => 'admin@kpad.com',
            'password' => Hash::make('password'), // Passwordnya: password
            'role' => 'admin',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        // 2. Akun Staf (Petugas Lapangan)
        DB::table('users')->insert([
            'name' => 'Budi Santoso (Staf)',
            'email' => 'staf@kpad.com',
            'password' => Hash::make('password'), // Passwordnya: password
            'role' => 'staf',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}