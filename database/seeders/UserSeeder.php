<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name' => 'Admin',
            'email' => 'H4xNp@example.com',
            'username' => 'admin',
            'password' => bcrypt('12345678'),
            'role' => 'admin',
        ]);

        User::create([
            'name' => 'Siswa',
            'email' => 'siswa@example.com',
            'username' => 'siswa',
            'password' => bcrypt('12345678'),
            'role' => 'siswa',
        ]);

        User::create([
            'name' => 'Guru',
            'email' => 'guru@example.com',
            'username' => 'guru',
            'password' => bcrypt('12345678'),
            'role' => 'guru',
        ]);

        User::create([
            'name' => 'Fasilitator',
            'email' => 'fasilitator@example.com',
            'username' => 'fasilitator',
            'password' => bcrypt('12345678'),
            'role' => 'fasilitator',
        ]);
    }
}
