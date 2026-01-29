<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $this->call([
            RoleSeeder::class,      // ✅ Buat roles & permissions dulu
            UserSeeder::class,      // ✅ Buat user dengan role
        ]);
    }
}