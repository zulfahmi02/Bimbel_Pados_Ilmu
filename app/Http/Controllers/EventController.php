<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\EventRegistration;
use Illuminate\Http\Request;

class EventController extends Controller
{
    public function index()
    {
        $today = now()->startOfDay();

        // Get all active events
        $allEvents = Event::where('is_active', true)->get();

        // Categorize events based on their status
        $upcomingEvents = $allEvents->filter(function ($event) {
            return $event->isUpcoming();
        })->sortBy('event_date')->values();

        $ongoingEvents = $allEvents->filter(function ($event) {
            return $event->isOngoing();
        })->sortBy('event_date')->values();

        $pastEvents = $allEvents->filter(function ($event) {
            return $event->isPast();
        })->sortByDesc('event_date')->take(6)->values();

        return view('event', compact('upcomingEvents', 'ongoingEvents', 'pastEvents'));
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

        // Validate the form data
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'required|string|max:20',
            'message' => 'nullable|string|max:1000',
        ]);

        // Build WhatsApp message
        $whatsappNumber = $event->getWhatsAppNumber();
        $message = "Halo, saya ingin mendaftar event *{$event->title}*\n\n";
        $message .= "Nama: {$validated['name']}\n";
        $message .= "Email: {$validated['email']}\n";
        $message .= "No. Telepon: {$validated['phone']}\n";

        if (!empty($validated['message'])) {
            $message .= "Pesan: {$validated['message']}\n";
        }

        $message .= "\nTanggal Event: " . $event->event_date->format('d F Y');

        if ($event->event_time) {
            $message .= " - " . $event->event_time->format('H:i') . " WIB";
        }

        // Redirect to WhatsApp
        $whatsappUrl = "https://wa.me/{$whatsappNumber}?text=" . urlencode($message);

        return redirect($whatsappUrl);
    }
}
