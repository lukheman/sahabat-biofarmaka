<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gejala extends Model
{
    use HasFactory;

    protected $table = 'gejala';
    protected $guarded = [];

    public function penyakitTanaman() {
        return $this->belongsToMany(Penyakit::class, 'gejala_penyakit_tanaman', 'id_gejala', 'id_penyakit_tanaman');
    }

}
