<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Panggil UserSeeder jika Anda punya dan ingin menjalankannya dulu
        // $this->call(UserSeeder::class); 

        $this->call([
            EventSeeder::class,
            // Tambahkan seeder lain di sini jika ada
        ]);
    }
}