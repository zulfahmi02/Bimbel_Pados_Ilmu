<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;

class EventController extends Controller
{
    public function index()
    {
        $upcomingEvents = Event::where('is_active', true)
                              ->where('event_date', '>=', now())
                              ->orderBy('event_date')
                              ->get();
        
        $pastEvents = Event::where('is_active', true)
                          ->where('event_date', '<', now())
                          ->orderBy('event_date', 'desc')
                          ->take(6)
                          ->get();

        return view('event', compact('upcomingEvents', 'pastEvents'));
    }
}
