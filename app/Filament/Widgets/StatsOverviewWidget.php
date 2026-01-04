<?php

namespace App\Filament\Widgets;

use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;
use App\Models\User;
use App\Models\Program;
use App\Models\BlogPost;
use App\Models\Event;
use App\Models\Testimonial;

class StatsOverviewWidget extends BaseWidget
{
    protected static ?int $sort = 1;

    protected function getStats(): array
    {
        // Calculate statistics
        $totalPrograms = Program::count();
        $activePrograms = Program::where('is_active', true)->count();

        $totalBlogPosts = BlogPost::count();
        $publishedPosts = BlogPost::where('is_published', true)->count();

        $totalEvents = Event::count();
        $upcomingEvents = Event::where('event_date', '>=', now())->count();

        $totalTestimonials = Testimonial::count();

        return [
            Stat::make('Total Program', number_format($totalPrograms))
                ->description($activePrograms . ' program aktif')
                ->descriptionIcon('heroicon-m-academic-cap')
                ->color('success')
                ->chart([3, 5, 4, 6, 5, 7, 6, 8]),

            Stat::make('Blog Posts', number_format($totalBlogPosts))
                ->description($publishedPosts . ' published')
                ->descriptionIcon('heroicon-m-document-text')
                ->color('info')
                ->chart([4, 6, 5, 7, 6, 8, 7, 9]),

            Stat::make('Events', number_format($totalEvents))
                ->description($upcomingEvents . ' upcoming')
                ->descriptionIcon('heroicon-m-calendar')
                ->color('warning')
                ->chart([2, 3, 4, 3, 5, 4, 6, 5]),

            Stat::make('Testimonials', number_format($totalTestimonials))
                ->description('Total testimoni')
                ->descriptionIcon('heroicon-m-star')
                ->color('success')
                ->chart([5, 6, 7, 8, 7, 9, 8, 10]),
        ];
    }
}
