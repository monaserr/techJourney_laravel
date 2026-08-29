<?php

namespace App\Http\Controllers;

use App\Models\Track;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TrackController extends Controller
{
    public function index(Request $request)
    {
        $searchTerm = trim($request->input('q', ''));

        $query = Track::query();

        if ($searchTerm !== '') {
            $query->where(function ($q) use ($searchTerm) {
                $q->where('title', 'like', '%' . $searchTerm . '%')
                    ->orWhere('description', 'like', '%' . $searchTerm . '%');
            });
        }

        $visibleTracks = $query->get();

        $totalTracksCount = Track::count();

        $enrolledCourseIds = [];

        if (Auth::check() && Auth::user()->role === 'student') {
            $enrolledCourseIds = Auth::user()
                ->trackEnrollments()
                ->pluck('course_id')
                ->map(fn($id) => (int) $id)
                ->toArray();
        }

        $trackSlugs = [
            'Frontend Development' => 'frontend',
            'Backend Development' => 'backend',
            'Cybersecurity' => 'cybersecurity',
            'AI & Machine Learning' => 'ai-ml',
            'Data Science' => 'data-science',
        ];

        $roadmaps = [
            'Frontend Development' => [
                [
                    'name' => 'HTML',
                    'description' => 'Learn the structure and foundation of modern websites.',
                    'icon' => '🌐'
                ],
                [
                    'name' => 'CSS',
                    'description' => 'Style websites and create responsive layouts.',
                    'icon' => '🎨'
                ],
                [
                    'name' => 'JavaScript',
                    'description' => 'Add logic and interactivity to websites.',
                    'icon' => '⚡'
                ],
                [
                    'name' => 'Git & GitHub',
                    'description' => 'Learn version control and collaboration.',
                    'icon' => '🔀'
                ],
                [
                    'name' => 'Bootstrap / Tailwind',
                    'description' => 'Build modern interfaces faster.',
                    'icon' => '🧩'
                ],
                [
                    'name' => 'React / Vue',
                    'description' => 'Learn modern frontend frameworks.',
                    'icon' => '⚛️'
                ],
                [
                    'name' => 'APIs',
                    'description' => 'Connect frontend applications with backend services.',
                    'icon' => '🔗'
                ],
            ],

            'Backend Development' => [
                [
                    'name' => 'Programming Fundamentals',
                    'description' => 'Understand programming concepts and problem solving.',
                    'icon' => '💡'
                ],
                [
                    'name' => 'Node.js',
                    'description' => 'Build server-side applications using JavaScript.',
                    'icon' => '🟢'
                ],
                [
                    'name' => 'Express.js',
                    'description' => 'Build APIs and backend applications.',
                    'icon' => '⚙️'
                ],
                [
                    'name' => 'Databases',
                    'description' => 'Learn SQL and database fundamentals.',
                    'icon' => '🗄️'
                ],
                [
                    'name' => 'REST APIs',
                    'description' => 'Design and consume RESTful APIs.',
                    'icon' => '🔗'
                ],
                [
                    'name' => 'Authentication',
                    'description' => 'Learn login, sessions, tokens and authorization.',
                    'icon' => '🔐'
                ],
                [
                    'name' => 'Testing',
                    'description' => 'Test backend applications and APIs.',
                    'icon' => '🧪'
                ],
                [
                    'name' => 'Deployment',
                    'description' => 'Deploy backend applications online.',
                    'icon' => '☁️'
                ],
            ],

            'Cybersecurity' => [
                [
                    'name' => 'Computer Fundamentals',
                    'description' => 'Understand how computers and operating systems work.',
                    'icon' => '💻'
                ],
                [
                    'name' => 'Networking',
                    'description' => 'Learn networks, protocols and communication.',
                    'icon' => '🌐'
                ],
                [
                    'name' => 'Linux',
                    'description' => 'Learn Linux commands and system administration.',
                    'icon' => '🐧'
                ],
                [
                    'name' => 'Security Fundamentals',
                    'description' => 'Understand basic cybersecurity concepts.',
                    'icon' => '🛡️'
                ],
                [
                    'name' => 'Cryptography',
                    'description' => 'Learn encryption and secure communication.',
                    'icon' => '🔑'
                ],
                [
                    'name' => 'Web Security',
                    'description' => 'Learn common web vulnerabilities.',
                    'icon' => '🌍'
                ],
                [
                    'name' => 'Ethical Hacking',
                    'description' => 'Learn penetration testing fundamentals.',
                    'icon' => '🎯'
                ],
                [
                    'name' => 'Security Projects',
                    'description' => 'Practice cybersecurity through real projects.',
                    'icon' => '🚀'
                ],
            ],

            'AI & Machine Learning' => [
                [
                    'name' => 'Python',
                    'description' => 'Learn Python programming for AI and data.',
                    'icon' => '🐍'
                ],
                [
                    'name' => 'Mathematics',
                    'description' => 'Learn the mathematical foundations of AI.',
                    'icon' => '📐'
                ],
                [
                    'name' => 'NumPy & Pandas',
                    'description' => 'Work with data using Python libraries.',
                    'icon' => '📊'
                ],
                [
                    'name' => 'Statistics',
                    'description' => 'Understand statistics for machine learning.',
                    'icon' => '📈'
                ],
                [
                    'name' => 'Machine Learning',
                    'description' => 'Build predictive machine learning models.',
                    'icon' => '🤖'
                ],
                [
                    'name' => 'Deep Learning',
                    'description' => 'Learn neural networks and deep learning.',
                    'icon' => '🧠'
                ],
                [
                    'name' => 'Generative AI',
                    'description' => 'Explore modern generative AI technologies.',
                    'icon' => '✨'
                ],
                [
                    'name' => 'AI Projects',
                    'description' => 'Build practical AI projects.',
                    'icon' => '🚀'
                ],
            ],

            'Data Science' => [
                [
                    'name' => 'Python',
                    'description' => 'Learn Python for data science.',
                    'icon' => '🐍'
                ],
                [
                    'name' => 'Statistics',
                    'description' => 'Understand statistics and probability.',
                    'icon' => '📈'
                ],
                [
                    'name' => 'NumPy',
                    'description' => 'Perform numerical computations with Python.',
                    'icon' => '🔢'
                ],
                [
                    'name' => 'Pandas',
                    'description' => 'Analyze and manipulate datasets.',
                    'icon' => '🐼'
                ],
                [
                    'name' => 'Data Cleaning',
                    'description' => 'Prepare and clean real-world datasets.',
                    'icon' => '🧹'
                ],
                [
                    'name' => 'Data Visualization',
                    'description' => 'Create charts and communicate insights.',
                    'icon' => '📊'
                ],
                [
                    'name' => 'SQL',
                    'description' => 'Query and manage relational databases.',
                    'icon' => '🗄️'
                ],
                [
                    'name' => 'Machine Learning',
                    'description' => 'Apply machine learning to data.',
                    'icon' => '🤖'
                ],
            ],
        ];
        return view('tracks.index', compact(
            'visibleTracks',
            'totalTracksCount',
            'searchTerm',
            'enrolledCourseIds',
            'trackSlugs',
            'roadmaps'
        ))->with('pageTitle', 'Tracks');
    }
}