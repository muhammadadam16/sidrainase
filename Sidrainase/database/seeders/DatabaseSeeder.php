<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        // Create admin user
        User::create([
            'nama' => 'Adam',
            'email' => 'admin@example.com',
            'jabatan' => 'Ketua',
            'bidang' => 'Mahasiswa',
            'status' => 'Admin',
            'password' => Hash::make('123123123'),
        ]);

        // Create staff users
        User::create([
            'nama' => 'tono',
            'email' => 'tono@example.com',
            'jabatan' => 'kordinator',
            'bidang' => 'Mahasiswa',
            'status' => 'Karyawan',
            'password' => Hash::make('123123123'),
        ]);

        User::create([
            'nama' => 'Budi',
            'email' => 'Budi@example.com',
            'jabatan' => 'kordinator lapangan',
            'bidang' => 'Mahasiswa',
            'status' => 'Karyawan',
            'password' => Hash::make('123123123'),
        ]);
    }
}
