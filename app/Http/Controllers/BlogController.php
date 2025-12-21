<?php

namespace App\Http\Controllers;

use App\Models\BlogPost;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function index()
    {
        $posts = BlogPost::published()
                        ->orderBy('published_at', 'desc')
                        ->paginate(9);

        return view('blog', compact('posts'));
    }

    public function show($slug)
    {
        $post = BlogPost::published()
                       ->where('slug', $slug)
                       ->firstOrFail();
        
        $relatedPosts = BlogPost::published()
                               ->where('id', '!=', $post->id)
                               ->orderBy('published_at', 'desc')
                               ->take(3)
                               ->get();

        return view('blog-detail', compact('post', 'relatedPosts'));
    }
}
