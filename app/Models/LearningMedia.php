<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class LearningMedia extends Model
{
    protected $fillable = [
        'title',
        'slug',
        'category',
        'author',
        'publisher',
        'price',
        'stock',
        'description',
        'image',
        'gallery_images',
        'is_featured',
        'is_active',
        'order',
    ];

    protected $casts = [
        'price' => 'integer',
        'stock' => 'integer',
        'gallery_images' => 'array',
        'is_featured' => 'boolean',
        'is_active' => 'boolean',
    ];

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($media) {
            if (empty($media->slug)) {
                $media->slug = Str::slug($media->title);
            }
        });
    }

    public function getImageUrlAttribute(): ?string
    {
        return $this->resolveMediaUrl($this->image);
    }

    public function getGalleryUrlsAttribute(): array
    {
        $images = $this->gallery_images ?? [];
        $urls = [];

        foreach ($images as $image) {
            $resolved = $this->resolveMediaUrl($image);
            if ($resolved) {
                $urls[] = $resolved;
            }
        }

        return $urls;
    }

    protected function resolveMediaUrl(?string $value): ?string
    {
        if (! $value) {
            return null;
        }

        if (Str::startsWith($value, ['http://', 'https://', '//'])) {
            return $value;
        }

        $path = ltrim($value, '/');

        if (Str::startsWith($path, 'storage/')) {
            $path = Str::after($path, 'storage/');
        }

        if (Storage::disk('public')->exists($path)) {
            return Storage::disk('public')->url($path);
        }

        return asset('storage/' . $path);
    }

    public function getFormattedPriceAttribute(): string
    {
        return 'Rp ' . number_format($this->price, 0, ',', '.');
    }

    public function getWhatsAppUrlAttribute(): string
    {
        $phoneNumber = '6282237343764';
        $message = "Halo, saya ingin memesan media pembelajaran *{$this->title}*.";

        return 'https://wa.me/' . $phoneNumber . '?text=' . urlencode($message);
    }
}
