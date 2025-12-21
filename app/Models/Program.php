<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Program extends Model
{
    protected $fillable = [
        'title',
        'slug',
        'category',
        'description',
        'subjects',
        'facilities',
        'price',
        'duration',
        'max_students',
        'image',
        'is_premium',
        'is_active',
        'order',
    ];

    protected $casts = [
        'subjects' => 'array',
        'facilities' => 'array',
        'is_premium' => 'boolean',
        'is_active' => 'boolean',
    ];

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($program) {
            if (empty($program->slug)) {
                $program->slug = Str::slug($program->title);
            }
        });
    }

    public function inquiries()
    {
        return $this->hasMany(Inquiry::class);
    }
}
