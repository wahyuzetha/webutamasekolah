<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Extracurricular extends Model
{
    protected $guarded = [];

    public function galleries()
    {
        return $this->hasMany(ExtracurricularGallery::class);
    }
}
