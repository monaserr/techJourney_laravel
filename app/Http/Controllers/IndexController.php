<?php

namespace App\Http\Controllers;

use App\Models\Track;
use App\Models\Event;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class IndexController extends Controller
{
    public function index()
    {
        // Get first 3 events
        $limitedEvents = Event::orderBy('id', 'desc')
            ->take(3)
            ->get();

        // Get all tracks
        $tracks = Track::all();

        // Get enrolled track IDs
        $enrolledTrackIds = [];

        if (Auth::check() && Auth::user()->role === 'student') {

            $enrolledTrackIds = Auth::user()
                ->trackEnrollments()
                ->pluck('course_id')
                ->toArray();
        }

        // Tracks shown on Index page
        $indexTracks = $tracks->filter(function ($track) {

            return in_array($track->title, [
                'Frontend Development',
                'Backend Development',
                'AI & Machine Learning'
            ]);

        });

        // Skills for each track
        $trackSkills = [

            'Frontend Development' => [
                'HTML',
                'CSS',
                'JavaScript'
            ],

            'Backend Development' => [
                'PHP',
                'MySQL',
                'APIs'
            ],

            'AI & Machine Learning' => [
                'Python',
                'ML',
                'Data'
            ],

        ];

        // Track slugs
        $trackSlugs = [

            'Frontend Development' => 'frontend',

            'Backend Development' => 'backend',

            'AI & Machine Learning' => 'ai-ml',

        ];

        return view('index', compact(
            'limitedEvents',
            'indexTracks',
            'enrolledTrackIds',
            'trackSkills',
            'trackSlugs'
        ));
    }


    public function enroll(Request $request)
    {
        // Check login
        if (!Auth::check()) {

            return response()->json([
                'success' => false,
                'message' => 'Please log in first to enroll.'
            ], 401);
        }


        // Only students can enroll
        if (Auth::user()->role !== 'student') {

            return response()->json([
                'success' => false,
                'message' => 'Only students can enroll in tracks.'
            ], 403);
        }


        // Validate track
        $request->validate([
            'track_id' => 'required|exists:courses,id'
        ]);


        // Check if already enrolled
        $alreadyEnrolled = Auth::user()
            ->trackEnrollments()
            ->where('course_id', $request->track_id)
            ->exists();


        if ($alreadyEnrolled) {

            return response()->json([
                'success' => false,
                'message' => 'You are already enrolled in this track.'
            ]);
        }


        // Create enrollment
        Auth::user()
            ->trackEnrollments()
            ->create([
                'course_id' => $request->track_id
            ]);


        return response()->json([
            'success' => true,
            'message' => 'Enrollment successful!'
        ]);
    }
}