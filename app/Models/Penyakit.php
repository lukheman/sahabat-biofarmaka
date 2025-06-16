<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Penyakit extends Model
{
    use HasFactory;

    protected $table = 'penyakit';
    protected $guarded = [];

    public function gejala() {
        return $this->belongsToMany(Gejala::class, 'basis_pengetahuan', 'id_penyakit', 'id_gejala')
            ->withPivot(['mb', 'md']) ;
        // mb = measure belif
        // md = measure disbelief
    }
}
