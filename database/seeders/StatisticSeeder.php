<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Statistic;

class StatisticSeeder extends Seeder
{
    public function run(): void
    {
        // Clear existing statistics to prevent duplicates during seeding
        Statistic::truncate();

        $stats = [
            [
                'label' => 'Siswa Aktif',
                'value' => '0', // Will be auto-replaced by controller
                'icon' => 'heroicon-o-users',
                'order' => 1,
            ],
            [
                'label' => 'Guru Berpengalaman',
                'value' => '0', // Will be auto-replaced by controller
                'icon' => 'heroicon-o-academic-cap',
                'order' => 2,
            ],
            [
                'label' => 'Tingkat Kepuasan',
                'value' => '95%',
                'icon' => 'heroicon-o-face-smile',
                'order' => 3,
            ],
            [
                'label' => 'Tahun Berpengalaman',
                'value' => '5+',
                'icon' => 'heroicon-o-clock',
                'order' => 4,
            ],
        ];

        foreach ($stats as $stat) {
            Statistic::create($stat);
        }
    }
}
