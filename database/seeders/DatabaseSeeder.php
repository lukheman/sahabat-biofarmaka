<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Penyakit;
use App\Models\Gejala;
use App\Models\Tanaman;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {

        $this->call([
            GejalaSeeder::class,
            PenyakitSeeder::class,
        ]);

        Tanaman::factory(3)->create();

        User::factory()->create([
            'name' => 'Admin',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('password123'),
        ]);
    }
}
