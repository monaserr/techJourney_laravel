@extends('layouts.app')

@section('title', 'Tracks')

@section('content')

<main class="tracks-page">

    {{-- ================= HERO ================= --}}

    <section class="hero">

        <div class="container">

            <h1>
                Choose the path that will build your future.
            </h1>

            <p>
                Explore different technology career paths and start your journey
                from the basics to becoming job-ready.
            </p>

           

    <form method="GET" action="{{ route('tracks') }}" class="search-area d-flex gap-2">

    <div class="search-box d-flex align-items-center flex-grow-1">

        <span class="search-icon">
            <i class="bi bi-search"></i>
        </span>

        <input
            type="text"
            name="q"
            placeholder="Search for a track..."
            value="{{ $searchTerm }}"
        >

    </div>

    <button type="submit" class="filter-btn">
        <i class="bi bi-funnel"></i>
        <span>Filter</span>
    </button>

</form>

        </div>

    </section>


    {{-- ================= TRACKS ================= --}}

    <section class="tracks-section">

        <div class="container">

           <div class="eyebrow">

    <span class="dot"></span>

    {{ $totalTracksCount }} Career Tracks

</div>


            <div class="row g-4">

                @if ($visibleTracks->isEmpty())

                    <div class="col-12">

                        <div class="empty-message">
                            No tracks match your search.
                        </div>

                    </div>

                @else

                    @foreach ($visibleTracks as $track)

                        @php

                            $steps = $roadmaps[$track->title] ?? [];

                            $roadmapId = 'roadmap-' . $track->id;

                            $trackSlug = $trackSlugs[$track->title]
                                ?? strtolower(str_replace(' ', '-', $track->title));

                            $isEnrolled = in_array(
                                (int) $track->id,
                                $enrolledCourseIds,
                                true
                            );

                        @endphp


                        <div class="col-md-6 col-lg-4">

                            <div class="track-card">

                                {{-- Image --}}

                                <div class="track-image">

                                    <img
                                        src="{{ asset('images/' . $track->image) }}"
                                        alt="{{ $track->title }}"
                                    >

                                </div>


                                {{-- Content --}}

                                <div class="track-content">

                                    <h3>
                                        {{ $track->title }}
                                    </h3>

                                    <p class="desc">
                                        {{ $track->description }}
                                    </p>


                                    <div class="trackcard-buttons">

                                        {{-- Enroll --}}

                                        <button
                                            type="button"
                                            class="enroll-track {{ $isEnrolled ? 'enrolled' : '' }}"
                                            data-track-id="{{ $track->id }}"
                                            {{ $isEnrolled ? 'disabled' : '' }}
                                        >

                                            {{ $isEnrolled ? 'Enrolled' : 'Enroll' }}

                                        </button>


                                        {{-- Explore --}}

                                        <a
                                            href="{{ route('resources', ['track' => $trackSlug]) }}#top"
                                            class="track-explore-link"
                                        >

                                            Explore

                                            <span>→</span>

                                        </a>

                                    </div>


                                    {{-- Roadmap Button --}}

                                    <button
                                        class="roadmap"
                                        type="button"
                                        data-bs-toggle="collapse"
                                        data-bs-target="#{{ $roadmapId }}"
                                        aria-expanded="false"
                                        aria-controls="{{ $roadmapId }}"
                                    >

                                        <span>
                                            🗺️ View Roadmap
                                        </span>

                                        <span class="roadmap-arrow">
                                            ↓
                                        </span>

                                    </button>

                                </div>


                                {{-- ================= ROADMAP ================= --}}

                                <div
                                    class="collapse"
                                    id="{{ $roadmapId }}"
                                >

                                    <div class="roadmap-wrapper">

                                        <div class="roadmap-heading">

                                            <h4>
                                                {{ $track->title }} Roadmap
                                            </h4>

                                            <span>
                                                {{ count($steps) }} Steps
                                            </span>

                                        </div>


                                        <div class="roadmap-list">

                                            @if (empty($steps))

                                                <div class="p-3">
                                                    No roadmap available for this track yet.
                                                </div>

                                            @else

                                                @foreach ($steps as $index => $step)

                                                    <a
                                                        href="{{ route('resources', [
                                                            'track' => $trackSlug,
                                                            'step' => $step['name']
                                                        ]) }}"
                                                        class="roadmap-step"
                                                    >

                                                        <div class="step-number">
                                                            {{ $index + 1 }}
                                                        </div>

                                                        <div class="step-icon">
                                                            {{ $step['icon'] }}
                                                        </div>

                                                        <div class="step-info">

                                                            <span class="step-title">
                                                                {{ $step['name'] }}
                                                            </span>

                                                            <span class="step-description">
                                                                {{ $step['description'] }}
                                                            </span>

                                                        </div>

                                                        <div class="step-arrow">
                                                            →
                                                        </div>

                                                    </a>

                                                @endforeach

                                            @endif

                                        </div>


                                        <div class="roadmap-hint">

                                            💡 Click any roadmap step to explore its
                                            courses, playlists, articles and practice resources.

                                        </div>

                                    </div>

                                </div>

                            </div>

                        </div>

                    @endforeach

                @endif

            </div>

        </div>

    </section>


    {{-- ================= COMPARE ================= --}}

    <section class="compare-section">

        <div class="container">

            <div class="compare-title">

                <h2>
                    Compare Tracks
                </h2>

                <span>
                    Last updated: August 2026
                </span>

            </div>


            <div class="table-responsive">

                <table class="table compare-table">

                    <thead>

                        <tr>

                            <th>Track</th>
                            <th>Duration</th>
                            <th>Difficulty</th>
                            <th>Average Salary</th>
                            <th>Open Jobs</th>

                        </tr>

                    </thead>


                    <tbody>

                        <tr>

                            <td>
                                Frontend Development
                            </td>

                            <td>
                                4 Months
                            </td>

                            <td>
                                Beginner
                            </td>

                            <td>
                                <span class="badge badge-avg">
                                    15K EGP
                                </span>
                            </td>

                            <td>
                                1,240 Jobs
                            </td>

                        </tr>


                        <tr>

                            <td>
                                Backend Development
                            </td>

                            <td>
                                5 Months
                            </td>

                            <td>
                                Intermediate
                            </td>

                            <td>
                                <span class="badge badge-avg">
                                    17K EGP
                                </span>
                            </td>

                            <td>
                                980 Jobs
                            </td>

                        </tr>


                        <tr>

                            <td>
                                Cybersecurity
                            </td>

                            <td>
                                6 Months
                            </td>

                            <td>
                                Intermediate
                            </td>

                            <td>
                                <span class="badge badge-avg">
                                    19K EGP
                                </span>
                            </td>

                            <td>
                                640 Jobs
                            </td>

                        </tr>


                        <tr>

                            <td>
                                AI & Machine Learning
                            </td>

                            <td>
                                6 Months
                            </td>

                            <td>
                                Advanced
                            </td>

                            <td>
                                <span class="badge badge-avg">
                                    22K EGP
                                </span>
                            </td>

                            <td>
                                510 Jobs
                            </td>

                        </tr>


                        <tr>

                            <td>
                                Data Science
                            </td>

                            <td>
                                5 Months
                            </td>

                            <td>
                                Intermediate
                            </td>

                            <td>
                                <span class="badge badge-avg">
                                    18K EGP
                                </span>
                            </td>

                            <td>
                                720 Jobs
                            </td>

                        </tr>

                    </tbody>

                </table>

            </div>

        </div>

    </section>

</main>


{{-- ================= ENROLL MODAL ================= --}}

<div
    class="modal fade"
    id="enrollSuccessModal"
    tabindex="-1"
>

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

            <button
                class="modal-action learn-more-btn"
                data-bs-dismiss="modal"
            >
                Continue
            </button>

        </div>

    </div>

</div>


@endsection


@push('scripts')

<script>

document.addEventListener('DOMContentLoaded', () => {

    document
        .querySelectorAll('.enroll-track')
        .forEach(button => {

            button.addEventListener('click', async () => {

                if (button.disabled) {
                    return;
                }

                const trackId = button.dataset.trackId;

                const oldText = button.textContent;

                button.disabled = true;
                button.textContent = 'Enrolling...';


                try {

                    const response = await fetch(
                        "{{ route('tracks.enroll') }}",
                        {
                            method: 'POST',

                            headers: {
                                'Content-Type': 'application/json',
                                'Accept': 'application/json',
                                'X-CSRF-TOKEN': "{{ csrf_token() }}"
                            },

                            body: JSON.stringify({
                                track_id: trackId
                            })
                        }
                    );


                    const data = await response.json();


                    if (!response.ok || !data.success) {

                        throw new Error(
                            data.message || 'Enrollment failed.'
                        );

                    }


                    button.textContent = 'Enrolled';

                    button.classList.add('enrolled');


                    const modalElement =
                        document.getElementById('enrollSuccessModal');


                    if (
                        modalElement &&
                        typeof bootstrap !== 'undefined'
                    ) {

                        bootstrap.Modal
                            .getOrCreateInstance(modalElement)
                            .show();

                    }

                }

                catch (error) {

                    button.disabled = false;

                    button.textContent = oldText;

                    alert(error.message);

                }

            });

        });

});

</script>

@endpush