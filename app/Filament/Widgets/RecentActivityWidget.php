<?php

namespace App\Filament\Widgets;

use Filament\Widgets\Widget;
use App\Models\User;
use App\Models\BlogPost;
use App\Models\Event;

class RecentActivityWidget extends Widget
{
    protected string $view = 'filament.widgets.recent-activity';
    protected static ?int $sort = 4;
    protected int|string|array $columnSpan = 'full';

    public function getActivities(): array
    {
        $activities = [];

        // Get recent users
        $recentUsers = User::latest()->take(1)->get();
        foreach ($recentUsers as $user) {
            $activities[] = [
                'icon' => 'heroicon-o-user-plus',
                'color' => 'success',
                'title' => 'New user registered',
                'description' => $user->name . ' - ' . $user->email,
                'time' => $user->created_at->diffForHumans(),
            ];
        }

        // Get recent blog posts
        $recentPosts = BlogPost::latest()->take(2)->get();
        foreach ($recentPosts as $post) {
            $activities[] = [
                'icon' => 'heroicon-o-document-text',
                'color' => 'info',
                'title' => 'New blog post published',
                'description' => $post->title,
                'time' => $post->created_at->diffForHumans(),
            ];
        }

        // Get recent events
        $recentEvents = Event::latest()->take(2)->get();
        foreach ($recentEvents as $event) {
            $activities[] = [
                'icon' => 'heroicon-o-calendar',
                'color' => 'warning',
                'title' => 'New event created',
                'description' => $event->title . ' - ' . $event->event_date->format('d M Y'),
                'time' => $event->created_at->diffForHumans(),
            ];
        }

        // Add mock activities to match design
        $activities[] = [
            'icon' => 'heroicon-o-wrench-screwdriver',
            'color' => 'warning',
            'title' => 'System maintenance scheduled',
            'description' => 'Scheduled maintenance - 3 hours ago',
            'time' => '3 hours ago',
        ];

        return $activities;
    }
}
