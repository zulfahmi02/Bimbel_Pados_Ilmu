<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class HeroSection extends Model
{
    protected $fillable = [
        'title',
        'subtitle',
        'image',
        'cta_text',
        'cta_link',
        'is_active',
    ];

    protected $casts = [
        'is_active' => 'boolean',
    ];

    public function getImageUrlAttribute(): ?string
    {
        if (! $this->image) {
            return null;
        }

        if (Str::startsWith($this->image, ['http://', 'https://', '//'])) {
            return $this->image;
        }

        $path = ltrim($this->image, '/');

        if (Str::startsWith($path, 'storage/')) {
            $path = Str::after($path, 'storage/');
        }

        if (Storage::disk('public')->exists($path)) {
            return Storage::disk('public')->url($path);
        }

        if (Storage::disk('local')->exists($path)) {
            try {
                return Storage::disk('local')->temporaryUrl($path, now()->addMinutes(30));
            } catch (\Throwable) {
                return Storage::disk('local')->url($path);
            }
        }

        return asset('storage/' . $path);
    }
}
