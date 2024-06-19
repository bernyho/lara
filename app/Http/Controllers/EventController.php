<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Cache;

class EventController extends Controller
{
    public function index(): View
    {
        $events = Cache::remember('lastDelayedEvents', 60, function () {
            return Event::whereNotNull('finished_at')
                ->orderBy('started_at', 'desc')
                ->get()
                ->groupBy('project_id')
                ->map(function ($groupedEvents) {
                    $groupedEvents = $groupedEvents->take(2);
                    $delay = $groupedEvents->first()->started_at->diffInSeconds($groupedEvents->last()->started_at);
                    return $groupedEvents->count() === 2 ? [
                        'project_id' => $groupedEvents->first()->project_id,
                        'delay' => abs($delay),
                    ] : null;
                })
                ->filter()
                ->sortByDesc('delay')
                ->take(10)
                ->values()
                ->all();
        });

        return view('event.index', compact('events'));
    }
}
