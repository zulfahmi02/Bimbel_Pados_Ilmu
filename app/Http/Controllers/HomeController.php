<?php

namespace App\Http\Controllers;

use App\Models\Program;
use App\Models\Testimonial;
use App\Models\Statistic;
use App\Models\HeroSection;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $heroSection = HeroSection::where('is_active', true)->first();
        $programs = Program::where('is_active', true)
                          ->orderBy('order')
                          ->take(3)
                          ->get();
        $testimonials = Testimonial::where('is_active', true)
                                  ->orderBy('order')
                                  ->take(3)
                                  ->get();
        $statistics = Statistic::orderBy('order')->get();

        return view('home', compact('heroSection', 'programs', 'testimonials', 'statistics'));
    }
}
