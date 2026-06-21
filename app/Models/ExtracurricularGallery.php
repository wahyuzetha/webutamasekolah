<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ExtracurricularGallery extends Model
{
    protected $guarded = [];

    public function extracurricular()
    {
        return $this->belongsTo(Extracurricular::class);
    }
}
