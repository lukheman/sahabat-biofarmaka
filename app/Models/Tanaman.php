<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tanaman extends Model
{
    use HasFactory;

    protected $table = 'tanaman';
    protected $guarded = [];

    public function penyakit() {
        return $this->belongsToMany(Penyakit::class, 'penyakit_tanaman', 'id_tanaman', 'id_penyakit');
    }


}
