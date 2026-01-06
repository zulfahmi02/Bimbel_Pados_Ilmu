<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Event extends Model
{
    protected $fillable = [
        'title',
        'slug',
        'description',
        'event_date',
        'event_time',
        'event_duration_days',
        'location',
        'image',
        'is_active',
    ];

    protected $casts = [
        'event_date' => 'datetime',
        'event_time' => 'datetime:H:i',
        'is_active' => 'boolean',
    ];

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($event) {
            if (empty($event->slug)) {
                $event->slug = Str::slug($event->title);
            }
        });
    }

    public function registrations()
    {
        return $this->hasMany(EventRegistration::class);
    }

    /**
     * Get the end date of the event based on duration
     */
    public function getEventEndDate()
    {
        return $this->event_date->copy()->addDays($this->event_duration_days - 1);
    }

    /**
     * Get the status of the event (upcoming, ongoing, past)
     */
    public function getEventStatus()
    {
        $today = now()->startOfDay();
        $eventStart = $this->event_date->startOfDay();
        $eventEnd = $this->getEventEndDate()->endOfDay();

        if ($today->lt($eventStart)) {
            return 'upcoming';
        } elseif ($today->between($eventStart, $eventEnd)) {
            return 'ongoing';
        } else {
            return 'past';
        }
    }

    /**
     * Check if event is upcoming
     */
    public function isUpcoming()
    {
        return $this->getEventStatus() === 'upcoming';
    }

    /**
     * Check if event is ongoing
     */
    public function isOngoing()
    {
        return $this->getEventStatus() === 'ongoing';
    }

    /**
     * Check if event is past
     */
    public function isPast()
    {
        return $this->getEventStatus() === 'past';
    }
}
