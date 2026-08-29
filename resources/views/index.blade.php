<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Tech Journey</title>
    <link rel="icon" type="image/png" href="{{ asset('images/Screenshot 2026-08-29 174721.png') }}">

    {{-- Bootstrap --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    {{-- Bootstrap Icons --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    {{-- Your CSS --}}
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>

<body class="animated-page">

    {{-- Navbar --}}
    @include('includes.navbar')


    {{-- ================= HERO ================= --}}

    <section class="hero-section">

        <div class="container">

            <div class="row align-items-center min-vh-100">

                <div class="col-lg-6">

                    <h1 class="hero-title">
                        Build Your Career Path With
                        <span>Tech Jounery</span>
                    </h1>

                    <p class="hero-text">
                        Discover the right career path, learn the skills you need,
                        and follow a clear roadmap to become a professional in tech.
                    </p>

                    <div class="hero-button">

                        <a href="{{ route('tracks') }}" class="hero-btn">
                            Explore Tracks
                        </a>

                        <a href="#about" class="learn-more-btn">
                            Learn More
                        </a>

                    </div>

                </div>


                <div class="col-lg-6">

                    <div class="hero-image">

                        <img src="{{ asset('images/hero1.png') }}" alt="Tech Journey">

                    </div>

                </div>

            </div>

        </div>

    </section>



    {{-- ================= ABOUT ================= --}}

    <section class="about-section py-5" id="about">

        <div class="container">

            <div class="text-center mb-5">

                <h3 class="about-badge">
                    About Us
                </h3>

                <div class="about-line"></div>

                <h2 class="about-title">
                    Your Career.
                    <span>Your Route.</span>
                    Your Future.
                </h2>

                <p class="about-subtitle">
                    TechJounery helps you discover the right tech career path
                    and provides a clear roadmap to reach their goals.
                </p>

            </div>


            <div class="row g-4">

                <div class="col-md-4">

                    <div class="about-card">

                        <div class="about-icon">
                            <i class="bi bi-compass"></i>
                        </div>

                        <h4>
                            Find Your Path
                        </h4>

                        <p>
                            Explore different tech careers and discover which
                            path matches your interests and goals.
                        </p>

                    </div>

                </div>


                <div class="col-md-4">

                    <div class="about-card">

                        <div class="about-icon">
                            <i class="bi bi-map"></i>
                        </div>

                        <h4>
                            Learn Step by Step
                        </h4>

                        <p>
                            Follow organized roadmaps that show you exactly
                            what skills you need to learn.
                        </p>

                    </div>

                </div>


                <div class="col-md-4">

                    <div class="about-card">

                        <div class="about-icon">
                            <i class="bi bi-rocket-takeoff"></i>
                        </div>

                        <h4>
                            Build Your Future
                        </h4>

                        <p>
                            Practice your skills through challenges,
                            projects, and useful resources.
                        </p>

                    </div>

                </div>

            </div>

        </div>

    </section>



    {{-- ================= TRACKS ================= --}}

    <section class="tracks-section py-5">

        <div class="container">

            <div class="text-center mb-5">

                <h3 class="tracks-badge">
                    Career Paths
                </h3>

                <div class="track-line"></div>

                <h2 class="tracks-title">
                    Choose Your
                    <span>Career Path</span>
                </h2>

                <p class="tracks-subtitle">
                    Explore our carefully designed career paths
                    and start your journey in tech.
                </p>

            </div>


            <div class="row g-4">

                @foreach ($indexTracks as $track)

                    @php

                        $title = $track->title;

                        $slug = $trackSlugs[$title]
                            ?? strtolower(str_replace(' ', '-', $title));

                        $skills = $trackSkills[$title] ?? [];

                        $isEnrolled = in_array(
                            (int) $track->id,
                            $enrolledTrackIds,
                            true
                        );

                    @endphp


                    <div class="col-md-4">

                        <div class="track-card">

                            {{-- Track Image --}}

                            <div class="track-image">

                                <img src="{{ asset('images/' . $track->image) }}" alt="{{ $track->title }}">

                            </div>


                            {{-- Track Content --}}

                            <div class="track-content">

                                <h3>
                                    {{ $track->title }}
                                </h3>


                                <p class="desc">
                                    {{ $track->description }}
                                </p>


                                <div class="track-skills">

                                    @foreach ($skills as $skill)

                                        <span>
                                            {{ $skill }}
                                        </span>

                                    @endforeach

                                </div>


                                <div class="trackcard-buttons d-flex align-items-center gap-3 mt-3">


                                    {{-- Enroll Button --}}

                                    <button type="button" class="enroll-track {{ $isEnrolled ? 'enrolled' : '' }}"
                                        data-track-id="{{ $track->id }}" {{ $isEnrolled ? 'disabled' : '' }}>

                                        {{ $isEnrolled ? 'Enrolled' : 'Enroll' }}

                                    </button>


                                    {{-- Explore --}}

                                    <a href="{{ route('resources', ['track' => $slug]) }}#top" class="explore-link">

                                        Explore
                                        <span>→</span>

                                    </a>

                                </div>

                            </div>

                        </div>

                    </div>

                @endforeach

            </div>


            {{-- Explore All --}}

            <div class="text-center mt-5">

                <a href="{{ route('tracks') }}" class="explore-btn">
                    Explore All Tracks
                    <i class="bi bi-arrow-right"></i>
                </a>

                </a>

            </div>

        </div>

    </section>



    {{-- ================= EVENTS ================= --}}

    <section class="events-section py-5">

        <div class="container">

            <div class="text-center mb-5">

                <h3 class="events-badge">
                    Our Events
                </h3>

                <div class="track-line"></div>

                <h2 class="tracks-title">
                    Choose Your
                    <span>Tech Experience</span>
                </h2>

                <p class="events-subtitle">
                    Join Career events to help you learn,
                    connect and grow
                </p>

            </div>


            @if ($limitedEvents->count())

                <div class="row g-4 home-events">

                    @foreach ($limitedEvents as $event)

                        <div class="col-12 col-md-6 col-lg-4 event-card" data-category="{{ $event->category }}">

                            <div class="home-event-card">


                                {{-- Event Image --}}

                                <div class="home-event-image">

                                    <img src="{{ asset('upload/' . $event->image) }}" alt="{{ $event->title }}">

                                </div>


                                {{-- Event Content --}}

                                <div class="home-event-content">

                                    <span class="home-event-category">
                                        {{ $event->category }}
                                    </span>


                                    <h3>
                                        {{ $event->title }}
                                    </h3>


                                    <p class="home-event-date">
                                        {{ $event->event_date->format('Y-m-d') }}
                                    </p>


                                    <p class="home-event-price">

                                        @if ($event->price == 0)

                                            Free

                                        @else

                                            EGP {{ $event->price }}

                                        @endif

                                    </p>


                                    <a class="event-explore-link" data-bs-toggle="modal"
                                        data-bs-target="#eventModal{{ $event->id }}">

                                        Explore

                                        <span>→</span>

                                    </a>

                                </div>

                            </div>

                        </div>

                    @endforeach

                </div>

            @endif



            {{-- ================= EVENT MODALS ================= --}}

            @foreach ($limitedEvents as $event)

                <div class="modal fade" id="eventModal{{ $event->id }}" tabindex="-1" aria-hidden="true">

                    <div class="modal-dialog modal-dialog-centered">

                        <div class="modal-content">


                            <div class="modal-header">

                                <h5 class="modal-title">
                                    {{ $event->title }}
                                </h5>

                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                                </button>

                            </div>


                            <div class="modal-body">

                                <p>
                                    {{ $event->description }}
                                </p>


                                <p>

                                    <strong>
                                        Location:
                                    </strong>

                                    {{ $event->location }}

                                </p>


                                <p>

                                    <strong>
                                        Date:
                                    </strong>

                                    {{ $event->event_date->format('Y-m-d') }}

                                </p>


                                <p>

                                    <strong>
                                        Price:
                                    </strong>

                                    @if ($event->price == 0)

                                        Free

                                    @else

                                        EGP {{ $event->price }}

                                    @endif

                                </p>

                            </div>


                            <div class="modal-footer">

                                <a class="event-book-btn" href="{{ route('student.events.index') }}">

                                    Book Now

                                </a>

                            </div>

                        </div>

                    </div>

                </div>

            @endforeach



            {{-- Explore All Events --}}

            <div class="text-center mt-5">

                <a href="{{ route('student.events.index') }}" class="explore-btn">

                    Explore All Events

                    <i class="bi bi-arrow-right"></i>

                </a>

            </div>

        </div>

    </section>



    {{-- ================= ASSESSMENT ================= --}}

    <section class="assess-all py-5">

        <div class="container">

            <section class="assess-banner d-flex align-items-center justify-content-between flex-wrap gap-3">

                <div>

                    <h3>
                        Ready to take the first step in your career?
                    </h3>

                    <p>
                        Sign up today and start your journey toward a brighter future.
                    </p>

                </div>


                <a href="{{ route('login') }}" class="btn btn-light assessment-btn">

                    Start Journey →

                </a>

            </section>

        </div>

    </section>



    {{-- ================= ENROLL SUCCESS MODAL ================= --}}

    <div class="modal fade" id="enrollSuccessModal" tabindex="-1">

        <div class="modal-dialog modal-dialog-centered">

            <div class="modal-content student-modal">

                <div class="success-icon">
                    ✓
                </div>

                <h3>
                    Enrollment Successful!
                </h3>

                <p>
                    You are now enrolled in this track.
                </p>

                <button class="modal-action learn-more-btn" data-bs-dismiss="modal">

                    Continue

                </button>

            </div>

        </div>

    </div>



    {{-- Bootstrap JS --}}

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

    <script src="{{ asset('js/script.js') }}"></script>

    {{-- ================= ENROLL ================= --}}

    <script>

        document.addEventListener('DOMContentLoaded', () => {

            document
                .querySelectorAll('.enroll-track')
                .forEach(btn => {

                    btn.addEventListener('click', async () => {

                        if (btn.disabled) {
                            return;
                        }


                        const fd = new FormData();

                        fd.append(
                            'track_id',
                            btn.dataset.trackId
                        );


                        const old = btn.textContent;

                        btn.disabled = true;


                        try {

                            const response = await fetch(
                                "{{ route('tracks.enroll') }}",
                                {
                                    method: 'POST',

                                    body: fd,

                                    headers: {
                                        'X-CSRF-TOKEN':
                                            document
                                                .querySelector(
                                                    'meta[name="csrf-token"]'
                                                )
                                                .getAttribute('content')
                                    }
                                }
                            );


                            const data = await response.json();


                            if (!data.success) {

                                throw new Error(
                                    data.message
                                );

                            }


                            btn.textContent = 'Enrolled';

                            btn.classList.add('enrolled');


                            bootstrap.Modal
                                .getOrCreateInstance(
                                    document.getElementById(
                                        'enrollSuccessModal'
                                    )
                                )
                                .show();


                        } catch (error) {

                            btn.disabled = false;

                            btn.textContent = old;

                            alert(error.message);

                        }

                    });

                });

        });

    </script>
    @include('includes.footer')
</body>

</html>