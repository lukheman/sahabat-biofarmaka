<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PenyakitSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'kode' => 'P01',
                'nama' => 'Layu bakteri',
                'deskripsi' => null,
                'solusi' => null,
            ],
            [
                'kode' => 'P02',
                'nama' => 'Layu fusarium',
                'deskripsi' => null,
                'solusi' => null,
            ],
            [
                'kode' => 'P03',
                'nama' => 'Bercak daun',
                'deskripsi' => null,
                'solusi' => null,
            ],
            [
                'kode' => 'P04',
                'nama' => 'Busuk rimpang',
                'deskripsi' => null,
                'solusi' => null,
            ],
            [
                'kode' => 'P05',
                'nama' => 'Kutu perisai',
                'deskripsi' => null,
                'solusi' => null,
            ],
            [
                'kode' => 'P06',
                'nama' => 'Buncak akar',
                'deskripsi' => null,
                'solusi' => null,
            ],
        ];

        DB::table('penyakit')->insert($data);
    }
}
