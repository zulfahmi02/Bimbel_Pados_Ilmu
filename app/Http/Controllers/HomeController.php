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
        $statistics = Statistic::orderBy('order')->get()->map(function ($stat) {
            if (str_contains(strtolower($stat->label), 'siswa')) {
                // Count users with student role or just count all non-admin users if roles aren't set up yet
                // For now, let's assume we can count Inquiries or just a placeholder count + real DB count
                // Since simpler is better:
                $stat->value = \App\Models\User::count() + 150; // Example: Base 150 + real users
            } elseif (str_contains(strtolower($stat->label), 'guru') || str_contains(strtolower($stat->label), 'pengajar')) {
                $stat->value = \App\Models\Teacher::active()->count() + 10; // Example: Base 10 + real teachers
            }
            return $stat;
        });

        return view('home', compact('heroSection', 'programs', 'testimonials', 'statistics'));
    }
}
