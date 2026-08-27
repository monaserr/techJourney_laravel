<?php

namespace App\Http\Controllers\Instructor;

use App\Http\Controllers\Controller;
use App\Models\Event;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EventController extends Controller
{
    public function create()
    {
        $events = Event::latest()->get();
        return view('instructors.events.create', compact('events'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title'         => 'required|string|max:255',
            'description'   => 'required|string',
            'location'      => 'required|string|max:255',
            'category'      => 'required|string|max:255',
            'price'         => 'required|numeric|min:0',
            'event_date'    => 'required|date',
            'image'         => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
        ]);

        if ($request->hasFile('image')) {
            $validated['image'] = $request->file('image')->store('events', 'public');
        }

        $validated['instructor_id'] = Auth::id();

        Event::create($validated);

        return redirect()->route('instructor.events.create')->with('success', 'Event created successfully!');
    }

    public function edit(Event $event)
    {
        return view('instructors.events.edit', compact('event'));
    }

    public function update(Request $request, Event $event)
    {
        $validated = $request->validate([
            'title'         => 'required|string|max:255',
            'description'   => 'required|string',
            'location'      => 'required|string|max:255',
            'category'      => 'required|string|max:255',
            'price'         => 'required|numeric|min:0',
            'event_date'    => 'required|date',
            'image'         => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
        ]);

        if ($request->hasFile('image')) {
            $validated['image'] = $request->file('image')->store('events', 'public');
        }

        $event->update($validated);

        return redirect()->route('instructor.events.create')->with('success', 'Event updated successfully!');
    }

    public function destroy(Event $event)
    {
        $event->delete();
        return redirect()->route('instructor.events.create')->with('success', 'Event deleted successfully!');
    }
}