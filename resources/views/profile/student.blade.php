@extends('layouts.app')

@section('title', 'My Profile')

@section('content')

    <main class="student-profile-page">
        <div class="container profile-shell">

            @if (session('updated'))
                <div class="alert alert-success">Profile updated successfully.</div>
            @endif

            <div class="profile-top">
                <div class="avatar">
                    @if ($user->image)
                        <img src="{{ asset('storage/' . $user->image) }}" alt="{{ $user->fullName() }}">
                    @else
                        <span>{{ $user->initials() ?: 'U' }}</span>
                    @endif
                </div>

                <div>
                    <h1>{{ $user->fullName() }}</h1>
                    <p class="muted">{{ $user->email }}</p>
                    <p class="muted">🎓 Student</p>
                    <a href="{{ route('edit_profile') }}" class="learn-more-btn">Edit Profile</a>
                </div>
            </div>

            <div class="data-grid" style="margin-bottom: 35px;">
                <div class="data-box">
                    <small>Enrolled Tracks</small>
                    <strong>{{ $tracks->count() }}</strong>
                </div>
                <div class="data-box">
                    <small>Booked Events</small>
                    <strong>{{ $events->count() }}</strong>
                </div>
            </div>

            <section class="profile-section">
                <div class="section-head">
                    <h2>My Tracks</h2>
                </div>

                @if ($tracks->isEmpty())
                    <div class="empty-state">
                        You are not enrolled in any track yet. <a href="{{ route('tracks') }}">Browse tracks</a>
                    </div>
                @else
                    <div class="row g-4">
                        @foreach ($tracks as $track)
                            <div class="col-md-6 col-lg-4">
                                <div class="track-card student-profile-track-card" data-track-id="{{ $track->id }}">
                                    <div class="track-image">
                                        <img src="{{ asset('images/' . $track->image) }}" alt="{{ $track->title }}">
                                    </div>
                                    <div class="track-content">
                                        <h3>{{ $track->title }}</h3>
                                        <p>{{ $track->description }}</p>
                                        <div class="student-profile-card-actions">
                                            <button type="button" class="remove-btn remove-track-btn"
                                                data-track-id="{{ $track->id }}">
                                                Remove
                                            </button>
                                            <a href="{{ route('resources', ['track' => $track->categorySlug()]) }}#top"
                                                class="explore-link">
                                                Explore
                                                <span>→</span>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                @endif
            </section>

            <section class="profile-section">
                <div class="section-head">
                    <h2>My Booked Events</h2>
                </div>

                @if ($events->isEmpty())
                    <div class="empty-state">
                        You haven't booked any events yet. <a href="{{ route('student.events.index') }}">Browse events</a>
                    </div>
                @else
                    <div class="row g-4">
                        @foreach ($events as $event)
                            <div class="col-md-6 col-lg-4">
                                <div class="track-card student-profile-event-card" data-event-id="{{ $event->id }}">
                                    <div class="track-image">
                                        <img src="{{ asset('upload/' . $event->image) }}" alt="{{ $event->title }}">
                                    </div>
                                    <div class="track-content">
                                        <span class="booked-event-label">{{ $event->category }}</span>
                                        <h3>{{ $event->title }}</h3>
                                        <p class="muted">{{ optional($event->event_date)->format('Y-m-d') }}</p>
                                        <div class="student-profile-card-actions">
                                            <div class="booked-status">
                                                <span class="booked-check">✓</span>
                                                <span>Booked</span>
                                            </div>
                                            <button type="button" class="remove-btn cancel-event-btn"
                                                data-event-id="{{ $event->id }}">
                                                Cancel Booking
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                @endif
            </section>

        </div>
    </main>

    <div class="modal fade" id="confirmActionModal" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content student-modal">
                <div class="success-icon remove-icon">!</div>
                <h3 id="confirmActionTitle">Are you sure?</h3>
                <p id="confirmActionText">This action cannot be undone.</p>
                <button type="button" class="modal-action learn-more-btn" style="background:#dc2626;" id="confirmActionBtn">
                    Yes, Confirm
                </button>
                <button type="button" class="modal-action btn-outline-secondary mt-2" data-bs-dismiss="modal">
                    Cancel
                </button>
            </div>
        </div>
    </div>

    @push('scripts')
        <script>
            document.addEventListener('DOMContentLoaded', () => {
                const confirmModalEl = document.getElementById('confirmActionModal');
                const confirmModal = new bootstrap.Modal(confirmModalEl);
                const confirmTitle = document.getElementById('confirmActionTitle');
                const confirmText = document.getElementById('confirmActionText');
                const confirmBtn = document.getElementById('confirmActionBtn');
                let pendingAction = null;

                function askConfirm(title, text, action) {
                    confirmTitle.textContent = title;
                    confirmText.textContent = text;
                    pendingAction = action;
                    confirmModal.show();
                }

                confirmBtn.addEventListener('click', () => {
                    if (pendingAction) {
                        pendingAction();
                    }
                    confirmModal.hide();
                });

                document.querySelectorAll('.remove-track-btn').forEach((btn) => {
                    btn.addEventListener('click', () => {
                        askConfirm(
                            'Remove this track?',
                            'You will lose access to this track and its progress.',
                            async () => {
                                const fd = new FormData();
                                fd.append('track_id', btn.dataset.trackId);
                                fd.append('_token', document.querySelector('meta[name=csrf-token]').content);

                                try {
                                    const res = await fetch('{{ route('profile.tracks.unenroll') }}', {
                                        method: 'POST',
                                        body: fd,
                                        headers: { 'Accept': 'application/json' },
                                    });
                                    const data = await res.json();

                                    if (data.success) {
                                        btn.closest('.col-md-6').remove();
                                    } else {
                                        alert(data.message || 'Could not remove track.');
                                    }
                                } catch (e) {
                                    alert('Something went wrong.');
                                }
                            }
                        );
                    });
                });

                document.querySelectorAll('.cancel-event-btn').forEach((btn) => {
                    btn.addEventListener('click', () => {
                        askConfirm(
                            'Cancel this booking?',
                            'Your spot for this event will be released.',
                            async () => {
                                const fd = new FormData();
                                fd.append('event_id', btn.dataset.eventId);
                                fd.append('_token', document.querySelector('meta[name=csrf-token]').content);

                                try {
                                    const res = await fetch('{{ route('profile.events.cancel') }}', {
                                        method: 'POST',
                                        body: fd,
                                        headers: { 'Accept': 'application/json' },
                                    });
                                    const data = await res.json();

                                    if (data.success) {
                                        btn.closest('.col-md-6').remove();
                                    } else {
                                        alert(data.message || 'Could not cancel booking.');
                                    }
                                } catch (e) {
                                    alert('Something went wrong.');
                                }
                            }
                        );
                    });
                });
            });
        </script>
    @endpush

@endsection