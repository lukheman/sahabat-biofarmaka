<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gejala extends Model
{
    use HasFactory;

    protected $table = 'gejala';
    protected $guarded = [];

    public function penyakit() {
        return $this->belongsToMany(Penyakit::class, 'basis_pengetahuan', 'id_gejala', 'id_penyakit');
    }

}
