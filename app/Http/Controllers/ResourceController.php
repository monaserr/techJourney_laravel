<?php

namespace App\Http\Controllers;

use App\Models\Resource;
use App\Models\Course;
use Illuminate\Http\Request;

class ResourceController extends Controller
{
    public function index(Request $request)
    {
        $categories = [
            'all' => 'All',
            'frontend' => 'Frontend',
            'backend' => 'Backend',
            'ai-ml' => 'AI',
            'cybersecurity' => 'Cybersecurity',
            'data-science' => 'Data Science',
        ];

        // Track selected from URL
        $initialTrack = $request->get('track', 'all');

        // Make sure the selected track exists
        if (!array_key_exists($initialTrack, $categories)) {
            $initialTrack = 'all';
        }

        // Course filter
        $selectedCourseId = (int) $request->get('course_id', 0);

        // Roadmap step
        $initialStep = $request->get('step', '');

        // Courses
        $courses = Course::orderBy('id')->get();

        // Resources
        $resources = Resource::with('course:id,title')
            ->orderBy('id')
            ->get();

        return view('resources.index', compact(
            'categories',
            'initialTrack',
            'selectedCourseId',
            'initialStep',
            'courses',
            'resources'
        ))->with('pageTitle', 'Resources');
    }
}