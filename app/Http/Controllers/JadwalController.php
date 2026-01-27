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

        return view('jadwal', compact('schedules', 'days'));
    }
}
