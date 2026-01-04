<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Instructor extends Model
{
    protected $fillable = [
        'name',
        'title',
        'subject',
        'description',
        'education',
        'experience_years',
        'photo_url',
        'is_certified',
        'is_active',
        'sort_order',
    ];

    protected $casts = [
        'is_certified' => 'boolean',
        'is_active' => 'boolean',
    ];

    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }

    public function scopeOrdered($query)
    {
        return $query->orderBy('sort_order', 'asc');
    }
}
