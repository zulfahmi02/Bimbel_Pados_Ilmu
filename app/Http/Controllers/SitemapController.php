<?php

namespace App\Http\Controllers;

use App\Models\BlogPost;
use App\Models\Event;
use App\Models\Program;
use Illuminate\Http\Response;

class SitemapController extends Controller
{
    public function index()
    {
        $programs = Program::where('is_active', true)->get();
        $events = Event::where('is_active', true)->get();
        $posts = BlogPost::published()->get();

        $content = view('sitemap', compact('programs', 'events', 'posts'));

        return response($content, 200)
            ->header('Content-Type', 'application/xml');
    }
}
