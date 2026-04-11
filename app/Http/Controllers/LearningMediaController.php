<?php

namespace App\Http\Controllers;

use App\Models\LearningMedia;

class LearningMediaController extends Controller
{
    public function index()
    {
        $mediaItems = LearningMedia::query()
            ->where('is_active', true)
            ->orderBy('order')
            ->orderBy('title')
            ->get();

        return view('media-pembelajaran', compact('mediaItems'));
    }

    public function show(string $slug)
    {
        $media = LearningMedia::query()
            ->where('is_active', true)
            ->where('slug', $slug)
            ->firstOrFail();

        $relatedItems = LearningMedia::query()
            ->where('is_active', true)
            ->where('id', '!=', $media->id)
            ->when(
                $media->category,
                fn ($query) => $query->where('category', $media->category),
                fn ($query) => $query->orderBy('order')->orderBy('title')
            )
            ->orderBy('order')
            ->orderBy('title')
            ->take(3)
            ->get();

        return view('media-pembelajaran-detail', compact('media', 'relatedItems'));
    }
}
