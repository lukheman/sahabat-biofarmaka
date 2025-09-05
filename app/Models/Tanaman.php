<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Tanaman extends Model
{
    use HasFactory;

    protected $table = 'tanaman';
    protected $guarded = [];

    public function penyakit(): BelongsToMany {
        return $this->belongsToMany(Penyakit::class, 'penyakit_tanaman', 'id_tanaman', 'id_penyakit')
            ->withPivot('id');
    }


}
