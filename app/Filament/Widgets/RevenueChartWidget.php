<?php

namespace App\Filament\Widgets;

use Filament\Widgets\ChartWidget;
use App\Models\BlogPost;
use Illuminate\Support\Facades\DB;

class RevenueChartWidget extends ChartWidget
{
    protected ?string $heading = 'Blog Post Trends';
    protected static ?int $sort = 2;
    protected ?string $maxHeight = '300px';

    protected function getData(): array
    {
        $months = ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'];

        // Get actual data from database for the last 12 months
        $totalPostsData = [];
        $publishedPostsData = [];

        for ($i = 0; $i < 12; $i++) {
            $month = now()->subMonths(11 - $i);

            // Count total posts created in this month
            $totalPosts = BlogPost::whereYear('created_at', $month->year)
                ->whereMonth('created_at', $month->month)
                ->count();

            // Count published posts in this month
            $publishedPosts = BlogPost::where('is_published', true)
                ->whereYear('created_at', $month->year)
                ->whereMonth('created_at', $month->month)
                ->count();

            $totalPostsData[] = $totalPosts;
            $publishedPostsData[] = $publishedPosts;
        }

        return [
            'datasets' => [
                [
                    'label' => 'Total Posts',
                    'data' => $totalPostsData,
                    'borderColor' => 'rgb(16, 185, 129)', // Emerald
                    'backgroundColor' => 'rgba(16, 185, 129, 0.1)',
                    'fill' => true,
                    'tension' => 0.4,
                ],
                [
                    'label' => 'Published',
                    'data' => $publishedPostsData,
                    'borderColor' => 'rgb(59, 130, 246)', // Blue
                    'backgroundColor' => 'rgba(59, 130, 246, 0.1)',
                    'fill' => true,
                    'tension' => 0.4,
                ],
            ],
            'labels' => $months,
        ];
    }

    protected function getType(): string
    {
        return 'line';
    }

    protected function getOptions(): array
    {
        return [
            'plugins' => [
                'legend' => [
                    'display' => true,
                    'position' => 'bottom',
                    'labels' => [
                        'color' => 'rgb(156, 163, 175)',
                        'usePointStyle' => true,
                        'padding' => 15,
                    ],
                ],
            ],
            'scales' => [
                'y' => [
                    'beginAtZero' => true,
                    'grid' => [
                        'color' => 'rgba(75, 85, 99, 0.3)',
                    ],
                    'ticks' => [
                        'color' => 'rgb(156, 163, 175)',
                        'stepSize' => 1,
                    ],
                ],
                'x' => [
                    'grid' => [
                        'display' => false,
                    ],
                    'ticks' => [
                        'color' => 'rgb(156, 163, 175)',
                    ],
                ],
            ],
        ];
    }
}
