<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class GejalaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            ['kode' => 'G01', 'nama' => 'Daun menguning secara menyeluruh'],
            ['kode' => 'G02', 'nama' => 'Ujung daun mengering dan mengeriting'],
            ['kode' => 'G03', 'nama' => 'Batang mudah melunak dan membusuk'],
            ['kode' => 'G04', 'nama' => 'Rimpang berbau busuk'],
            ['kode' => 'G05', 'nama' => 'Daun berbintik cokelat'],
            ['kode' => 'G06', 'nama' => 'Batang hitam membusuk'],
            ['kode' => 'G07', 'nama' => 'Tunas membusuk dan mati rebah'],
            ['kode' => 'G08', 'nama' => 'Pertumbuhan anakan sangat kurang'],
            ['kode' => 'G09', 'nama' => 'Daun mengering'],
            ['kode' => 'G10', 'nama' => 'Akar dan batang kering'],
            ['kode' => 'G11', 'nama' => 'Akar membusuk dan berwarna hitam'],
            ['kode' => 'G12', 'nama' => 'Rimpang busuk berwarna coklat'],
            ['kode' => 'G13', 'nama' => 'Akar kering'],
            ['kode' => 'G14', 'nama' => 'Daun layu dan tanaman mati'],
            ['kode' => 'G15', 'nama' => 'Akar dan batang kering'],
            ['kode' => 'G16', 'nama' => 'Jahe keropos'],
            ['kode' => 'G17', 'nama' => 'Timbul luka basah pada rimpang'],
            ['kode' => 'G18', 'nama' => 'Akar dan batang busuk keropos'],
            ['kode' => 'G19', 'nama' => 'Daun busuk dan menghitam'],
            ['kode' => 'G20', 'nama' => 'Munculnya bintil-bintil pada rimpang'],
            ['kode' => 'G21', 'nama' => 'Muncul jamur seperti kapas'],
            ['kode' => 'G22', 'nama' => 'Terdapat cairan putih pada batang'],
            ['kode' => 'G23', 'nama' => 'Pangkal akar tunas daun menjadi layu'],
            ['kode' => 'G24', 'nama' => 'Daun menggulung jauh sebelum masa panen'],
        ];

        DB::table('gejala')->insert($data);
    }
}
