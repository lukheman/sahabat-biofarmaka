<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class PenyakitTanaman extends Model
{
    protected $table = 'penyakit_tanaman';
    protected $guarded = [];

    public function gejala() {

        return $this->belongsToMany(Gejala::class, 'gejala_penyakit_tanaman', 'id_penyakit_tanaman', 'id_gejala')
            ->withPivot(['mb', 'md', 'id']);

    }
}
