<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Teacher extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected static function boot()
    {
        parent::boot();

        static::saving(function ($teacher) {
            if (empty($teacher->slug) || $teacher->isDirty('name')) {
                $teacher->slug = Str::slug($teacher->name);
                
                // Ensure unique slug
                $originalSlug = $teacher->slug;
                $count = 1;
                while (static::where('slug', $teacher->slug)->where('id', '!=', $teacher->id)->exists()) {
                    $teacher->slug = "{$originalSlug}-{$count}";
                    $count++;
                }
            }
        });
    }
}
