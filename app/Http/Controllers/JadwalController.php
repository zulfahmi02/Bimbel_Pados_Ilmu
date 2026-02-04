<?php

namespace App\Http\Controllers;

use App\Models\Schedule;
use Illuminate\Http\Request;

class JadwalController extends Controller
{
    public function index()
    {
        $schedules = Schedule::with('teacher')
            ->active()
            ->ordered()
            ->get()
            ->groupBy('day_of_week');

        $days = ['Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu', 'Minggu'];

        // Determine today's day name in Indonesian
        $dayMap = [
            'Monday' => 'Senin',
            'Tuesday' => 'Selasa',
            'Wednesday' => 'Rabu',
            'Thursday' => 'Kamis',
            'Friday' => 'Jumat',
            'Saturday' => 'Sabtu',
            'Sunday' => 'Minggu',
        ];
        $today = $dayMap[now()->format('l')] ?? $days[0];
        $defaultDay = in_array($today, $days) ? $today : $days[0];

        return view('jadwal', compact('schedules', 'days', 'defaultDay'));
    }
}
