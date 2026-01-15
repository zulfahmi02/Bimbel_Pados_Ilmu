<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Str;
use Symfony\Component\HttpFoundation\Response;

class TrackUniqueVisitors
{
    private const COOKIE_NAME = 'tbs_visitor_id';
    private const COOKIE_MINUTES = 60 * 24 * 365; // 1 year
    private static ?bool $dailyVisitorsTableExists = null;

    /**
     * Track unique visitors per-day using a long-lived cookie identifier.
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (! $this->shouldTrack($request)) {
            return $next($request);
        }

        if (! $this->canWriteToDailyVisitorsTable()) {
            return $next($request);
        }

        $visitorId = $request->cookie(self::COOKIE_NAME);

        if (! is_string($visitorId) || $visitorId === '') {
            $visitorId = (string) Str::uuid();

            Cookie::queue(cookie(
                name: self::COOKIE_NAME,
                value: $visitorId,
                minutes: self::COOKIE_MINUTES,
            ));
        }

        DB::table('daily_visitors')->insertOrIgnore([
            'visited_on' => now()->toDateString(),
            'visitor_id' => $visitorId,
            'first_seen_at' => now(),
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        return $next($request);
    }

    private function shouldTrack(Request $request): bool
    {
        if (! $request->isMethod('GET') && ! $request->isMethod('HEAD')) {
            return false;
        }

        if ($request->expectsJson() || $request->wantsJson()) {
            return false;
        }

        if ($request->ajax()) {
            return false;
        }

        if ($request->is(
            'admin',
            'admin/*',
            'livewire/*',
            'filament/*',
            'storage/*',
            'build/*',
            'css/*',
            'js/*',
            'images/*',
            'favicon.ico',
            'favicon-*.png',
            'apple-touch-icon.png',
            'robots.txt',
            'sitemap.xml',
        )) {
            return false;
        }

        return true;
    }

    private function canWriteToDailyVisitorsTable(): bool
    {
        if (self::$dailyVisitorsTableExists !== null) {
            return self::$dailyVisitorsTableExists;
        }

        try {
            self::$dailyVisitorsTableExists = Schema::hasTable('daily_visitors');
        } catch (\Throwable) {
            self::$dailyVisitorsTableExists = false;
        }

        return self::$dailyVisitorsTableExists;
    }
}
