<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Penyakit;
use App\Models\Gejala;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {

        Penyakit::factory()->count(20)->create();
        Gejala::factory()->count(7)->create();

        $penyakitAll = Penyakit::all();
        $gejalaAll = Gejala::all();

        foreach ($penyakitAll as $penyakit) {
            $randomGejala = $gejalaAll->random(rand(1, 5));

            // Siapkan data pivot dengan bobot acak
            $pivotData = [];

            foreach ($randomGejala as $gejala) {
                $pivotData[$gejala->id] = [
                    'mb' => rand(1, 100) / 100,  // hasil antara 0.01 - 1.00
                    'md' => rand(1, 100) / 100  // hasil antara 0.01 - 1.00
                ];
            }

            $penyakit->gejala()->attach($pivotData);
        }

        User::factory()->create([
            'name' => 'Admin',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('password123'),
        ]);
    }
}
