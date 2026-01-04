<?php

namespace App\Filament\Widgets;

use Filament\Widgets\ChartWidget;
use App\Models\Event;

class UserDistributionWidget extends ChartWidget
{
    protected ?string $heading = 'Event Status';
    protected static ?int $sort = 5;
    protected ?string $maxHeight = '300px';

    protected function getData(): array
    {
        // Calculate event distribution by status
        $upcoming = Event::where('event_date', '>=', now())->count();
        $past = Event::where('event_date', '<', now())->count();
        $total = $upcoming + $past;

        $upcomingPercent = $total > 0 ? round(($upcoming / $total) * 100) : 50;
        $pastPercent = $total > 0 ? round(($past / $total) * 100) : 50;

        return [
            'datasets' => [
                [
                    'label' => 'Event Status',
                    'data' => [$upcomingPercent, $pastPercent],
                    'backgroundColor' => [
                        'rgb(16, 185, 129)',   // Green - Upcoming
                        'rgb(107, 114, 128)',  // Gray - Past
                    ],
                ],
            ],
            'labels' => [
                "Upcoming {$upcomingPercent}%",
                "Past {$pastPercent}%"
            ],
        ];
    }

    protected function getType(): string
    {
        return 'doughnut';
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
        ];
    }
}
