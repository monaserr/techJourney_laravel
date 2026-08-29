<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;
use Illuminate\View\View;

class ProfileController extends Controller
{
    public function index(): View
    {
        $user = Auth::user();

        if ($user->isInstructor()) {
            $events = $user->events()->orderBy('event_date')->get();
            $bookings = collect();

            if ($events->isNotEmpty()) {
                $bookings = DB::table('event_registrations')
                    ->join('users', 'users.id', '=', 'event_registrations.user_id')
                    ->whereIn('event_registrations.event_id', $events->pluck('id'))
                    ->select(
                        'event_registrations.event_id',
                        'users.first_name',
                        'users.last_name',
                        'users.email',
                        'event_registrations.registered_at'
                    )
                    ->get()
                    ->groupBy('event_id');
            }

            return view('profile.instructor', [
                'user' => $user,
                'events' => $events,
                'bookings' => $bookings,
            ]);
        }

        $tracks = $user->enrolledTracks()->get();
        $events = $user->bookedEvents()->orderBy('event_date')->get();

        return view('profile.student', [
            'user' => $user,
            'tracks' => $tracks,
            'events' => $events,
        ]);
    }

    public function edit(): View
    {
        return view('profile.edit', ['user' => Auth::user()]);
    }

    public function update(Request $request): RedirectResponse
    {
        $user = Auth::user();

        $validated = $request->validate([
            'first_name' => ['required', 'string', 'max:50'],
            'last_name' => ['required', 'string', 'max:50'],
            'email' => ['required', 'email', 'max:255', Rule::unique('users', 'email')->ignore($user->id)],
            'password' => ['nullable', 'string', 'min:8', 'confirmed'],
            'image' => ['nullable', 'image', 'mimes:jpg,jpeg,png,webp', 'max:2048'],
        ]);

        if ($request->boolean('delete_photo') && $user->image) {
            Storage::disk('public')->delete($user->image);
            $user->image = null;
        }

        if ($request->hasFile('image')) {
            if ($user->image) {
                Storage::disk('public')->delete($user->image);
            }
            $user->image = $request->file('image')->store('profile', 'public');
        }

        $user->first_name = $validated['first_name'];
        $user->last_name = $validated['last_name'];
        $user->email = $validated['email'];

        if (!empty($validated['password'])) {
            $user->password = Hash::make($validated['password']);
        }

        $user->save();

        return redirect()->route('profile')->with('updated', true);
    }

    public function unenrollTrack(Request $request)
    {
        $request->validate(['track_id' => ['required', 'exists:courses,id']]);
        Auth::user()->enrolledTracks()->detach($request->track_id);
        return response()->json(['success' => true]);
    }

    public function cancelEvent(Request $request)
    {
        $request->validate(['event_id' => ['required', 'exists:events,id']]);
        Auth::user()->bookedEvents()->detach($request->event_id);
        return response()->json(['success' => true]);
    }
}