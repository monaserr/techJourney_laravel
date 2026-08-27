<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use App\Models\Event;
use App\Models\EventRegistration;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EventController extends Controller
{
    public function index()
    {
        $events = Event::latest()->get();

        $registeredEventIds = [];

        if (Auth::check()) {
            $registeredEventIds = EventRegistration::where('user_id', Auth::id())
                ->pluck('event_id')
                ->toArray();
        }

        return view('students.events.index', compact(
            'events',
            'registeredEventIds'
        ));
    }

    public function register(Request $request)
    {
        $request->validate([
            'event_id' => 'required|exists:events,id',
        ]);

        $userId = Auth::id();

        if (!$userId) {
            return redirect()
                ->route('login')
                ->with('error', 'Please login first.');
        }

        $alreadyRegistered = EventRegistration::where('user_id', $userId)
            ->where('event_id', $request->event_id)
            ->exists();

        if (!$alreadyRegistered) {
            EventRegistration::create([
                'user_id' => $userId,
                'event_id' => $request->event_id,
            ]);
        }

        return redirect()
            ->route('student.events.index')
            ->with('success', 'Event registered successfully!');
    }
}