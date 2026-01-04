<?php

namespace App\Filament\Widgets;

use Filament\Widgets\ChartWidget;
use App\Models\Program;

class TrafficByDeviceWidget extends ChartWidget
{
    protected ?string $heading = 'Program by Category';
    protected static ?int $sort = 3;
    protected ?string $maxHeight = '300px';

    protected function getData(): array
    {
        $months = ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'];

        // Get actual data from database
        // Count programs by category (assuming there's a 'category' or 'level' field)
        $sdData = [];
        $smpData = [];
        $smaData = [];

        for ($i = 0; $i < 12; $i++) {
            $month = now()->subMonths(11 - $i);

            // Count programs created in this month by category
            // Assuming program titles or categories contain SD, SMP, SMA
            $sdCount = Program::where(function ($query) {
                $query->where('title', 'like', '%SD%')
                    ->orWhere('category', 'SD');
            })
                ->whereYear('created_at', $month->year)
                ->whereMonth('created_at', $month->month)
                ->count();

            $smpCount = Program::where(function ($query) {
                $query->where('title', 'like', '%SMP%')
                    ->orWhere('category', 'SMP');
            })
                ->whereYear('created_at', $month->year)
                ->whereMonth('created_at', $month->month)
                ->count();

            $smaCount = Program::where(function ($query) {
                $query->where('title', 'like', '%SMA%')
                    ->orWhere('category', 'SMA');
            })
                ->whereYear('created_at', $month->year)
                ->whereMonth('created_at', $month->month)
                ->count();

            $sdData[] = $sdCount;
            $smpData[] = $smpCount;
            $smaData[] = $smaCount;
        }

        return [
            'datasets' => [
                [
                    'label' => 'SD',
                    'data' => $sdData,
                    'backgroundColor' => 'rgb(16, 185, 129)', // Emerald
                ],
                [
                    'label' => 'SMP',
                    'data' => $smpData,
                    'backgroundColor' => 'rgb(59, 130, 246)', // Blue
                ],
                [
                    'label' => 'SMA',
                    'data' => $smaData,
                    'backgroundColor' => 'rgb(168, 85, 247)', // Purple
                ],
            ],
            'labels' => $months,
        ];
    }

    protected function getType(): string
    {
        return 'bar';
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
