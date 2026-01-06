<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\EventRegistration;
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

    public function show($slug)
    {
        $event = Event::where('slug', $slug)->where('is_active', true)->firstOrFail();

        // Get related events (upcoming events excluding current one)
        $relatedEvents = Event::where('is_active', true)
            ->where('event_date', '>=', now())
            ->where('id', '!=', $event->id)
            ->orderBy('event_date')
            ->take(3)
            ->get();

        return view('event-detail', compact('event', 'relatedEvents'));
    }

    public function register(Request $request, $slug)
    {
        $event = Event::where('slug', $slug)->where('is_active', true)->firstOrFail();

        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'required|string|max:20',
            'message' => 'nullable|string|max:1000',
        ]);

        $validated['event_id'] = $event->id;
        $validated['status'] = 'pending';

        EventRegistration::create($validated);

        return redirect()->back()->with('success', 'Pendaftaran event berhasil! Kami akan menghubungi Anda segera.');
    }
}
