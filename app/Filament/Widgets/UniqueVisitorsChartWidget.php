<?php

namespace App\Filament\Widgets;

use App\Models\DailyVisitor;
use Carbon\Carbon;
use Carbon\CarbonPeriod;
use Filament\Widgets\ChartWidget;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class UniqueVisitorsChartWidget extends ChartWidget
{
    protected ?string $heading = 'Pengunjung (30 Hari Terakhir)';
    protected static ?int $sort = 6;
    protected ?string $maxHeight = '300px';

    protected function getData(): array
    {
        $days = 30;
        $start = now()->startOfDay()->subDays($days - 1);
        $end = now()->startOfDay();

        if (! Schema::hasTable('daily_visitors')) {
            return [
                'datasets' => [
                    [
                        'label' => 'Pengunjung',
                        'data' => array_fill(0, $days, 0),
                        'borderColor' => 'rgb(16, 185, 129)',
                        'backgroundColor' => 'rgba(16, 185, 129, 0.1)',
                        'fill' => true,
                        'tension' => 0.4,
                    ],
                ],
                'labels' => collect(CarbonPeriod::create($start, $end))
                    ->map(fn (Carbon $date) => $date->format('d M'))
                    ->all(),
            ];
        }

        $counts = DailyVisitor::query()
            ->select(['visited_on', DB::raw('COUNT(*) as visitors')])
            ->whereBetween('visited_on', [$start->toDateString(), $end->toDateString()])
            ->groupBy('visited_on')
            ->orderBy('visited_on')
            ->pluck('visitors', 'visited_on')
            ->all();

        $labels = [];
        $data = [];

        foreach (CarbonPeriod::create($start, $end) as $date) {
            /** @var Carbon $date */
            $key = $date->toDateString();
            $labels[] = $date->format('d M');
            $data[] = (int) ($counts[$key] ?? 0);
        }

        return [
            'datasets' => [
                [
                    'label' => 'Pengunjung',
                    'data' => $data,
                    'borderColor' => 'rgb(16, 185, 129)',
                    'backgroundColor' => 'rgba(16, 185, 129, 0.1)',
                    'fill' => true,
                    'tension' => 0.4,
                ],
            ],
            'labels' => $labels,
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
                        'maxRotation' => 0,
                        'autoSkip' => true,
                        'maxTicksLimit' => 10,
                    ],
                ],
            ],
        ];
    }
}
