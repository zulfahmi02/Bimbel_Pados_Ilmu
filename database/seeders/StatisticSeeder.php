<?php

namespace Database\Seeders;

use App\Models\Statistic;
use Illuminate\Database\Seeder;

class StatisticSeeder extends Seeder
{
    public function run(): void
    {
        $statistics = [
            [
                'label' => 'Siswa Aktif',
                'value' => '200+',
                'icon' => 'users',
                'order' => 1,
            ],
            [
                'label' => 'Guru Berpengalaman',
                'value' => '15+',
                'icon' => 'teachers',
                'order' => 2,
            ],
            [
                'label' => 'Tingkat Kepuasan',
                'value' => '95%',
                'icon' => 'satisfaction',
                'order' => 3,
            ],
            [
                'label' => 'Tahun Berpengalaman',
                'value' => '5+',
                'icon' => 'experience',
                'order' => 4,
            ],
        ];

        foreach ($statistics as $statistic) {
            Statistic::create($statistic);
        }
    }
}
