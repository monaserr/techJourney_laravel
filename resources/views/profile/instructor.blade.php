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
                    <img src="{{ asset('storage/'.$user->image) }}" alt="{{ $user->fullName() }}">
                @else
                    <span>{{ $user->initials() ?: 'U' }}</span>
                @endif
            </div>

            <div>
                <h1>{{ $user->fullName() }}</h1>
                <p class="muted">{{ $user->email }}</p>
                <p class="muted">👨‍🏫 Instructor</p>
                <a href="{{ route('edit_profile') }}" class="learn-more-btn">Edit Profile</a>
            </div>
        </div>

        <div class="data-grid" style="margin-bottom: 35px;">
            <div class="data-box">
                <small>My Events</small>
                <strong>{{ $events->count() }}</strong>
            </div>
            <div class="data-box">
                <small>Total Bookings</small>
                <strong>{{ collect($bookings)->sum(fn ($b) => $b->count()) }}</strong>
            </div>
        </div>

        <section class="profile-section">
            <div class="section-head">
                <h2>My Events</h2>
                <a href="{{ route('instructor.events.create') }}" class="learn-more-btn">Manage Events</a>
            </div>

            @if ($events->isEmpty())
                <div class="empty-state">
                    You haven't created any events yet.
                    <a href="{{ route('instructor.events.create') }}">Add your first event</a>
                </div>
            @else
                <div class="instructor-events-list">
                    @foreach ($events as $event)
                        @php
                            $attendees = $bookings[$event->id] ?? collect();
                        @endphp

                        <div class="instructor-event-card mb-4">
                            <div class="instructor-event-main">
                                <div class="instructor-event-image">
                                    <img src="{{ asset('storage/'.$event->image) }}" alt="{{ $event->title }}">
                                </div>

                                <div class="instructor-event-info">
                                    <span class="badge bg-secondary">{{ $event->category }}</span>
                                    <h3>{{ $event->title }}</h3>
                                    <p class="desc">{{ $event->description }}</p>
                                    <div class="instructor-event-meta">
                                        <span><i class="bi bi-calendar-event"></i> <strong>{{ optional($event->event_date)->format('Y-m-d') }}</strong></span>
                                        <span><i class="bi bi-geo-alt"></i> {{ $event->location }}</span>
                                        <span class="text-purple"><strong>{{ $event->price == 0 ? 'Free' : 'EGP '.$event->price }}</strong></span>
                                    </div>
                                </div>

                                <div class="instructor-event-actions">
                                    <div class="event-edit-delete">
                                        <a href="{{ route('instructor.events.edit', $event) }}" class="learn-more-btn">Edit</a>

                                        <form method="POST" action="{{ route('instructor.events.destroy', $event) }}" id="delete-form-{{ $event->id }}">
                                            @csrf
                                            @method('DELETE')
                                            <button type="button" class="btn-outline-danger" data-confirm-delete="delete-form-{{ $event->id }}">
                                                Delete
                                            </button>
                                        </form>
                                    </div>

                                    <button type="button" class="students-toggle" data-bs-toggle="collapse"
                                        data-bs-target="#students-{{ $event->id }}" aria-expanded="false">
                                        {{ $attendees->count() }} student(s) booked
                                        <span class="students-chevron">▾</span>
                                    </button>
                                </div>
                            </div>

                            <div class="collapse instructor-students-collapse" id="students-{{ $event->id }}">
                                <div class="instructor-students-box">
                                    <p class="instructor-students-title">Students booked for this event</p>

                                    @if ($attendees->isEmpty())
                                        <p class="instructor-no-students">No bookings yet.</p>
                                    @else
                                        <table class="table instructor-students-table">
                                            <thead>
                                                <tr>
                                                    <th>Name</th>
                                                    <th>Email</th>
                                                    <th>Booked At</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($attendees as $attendee)
                                                    <tr>
                                                        <td><strong>{{ trim($attendee->first_name.' '.$attendee->last_name) }}</strong></td>
                                                        <td>{{ $attendee->email }}</td>
                                                        <td>{{ $attendee->registered_at ? \Carbon\Carbon::parse($attendee->registered_at)->format('Y-m-d') : '—' }}</td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    @endif
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            @endif
        </section>

    </div>
</main>

<div class="modal fade" id="confirmDeleteModal" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content student-modal">
            <div class="success-icon remove-icon">!</div>
            <h3>Delete this event?</h3>
            <p>This action cannot be undone. All bookings for this event will be removed too.</p>
            <button type="button" class="modal-action learn-more-btn" style="background:#dc2626;" id="confirmDeleteBtn">
                Yes, Delete
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
        const confirmModalEl = document.getElementById('confirmDeleteModal');
        const confirmModal = new bootstrap.Modal(confirmModalEl);
        const confirmBtn = document.getElementById('confirmDeleteBtn');
        let formToSubmit = null;

        document.querySelectorAll('[data-confirm-delete]').forEach((btn) => {
            btn.addEventListener('click', () => {
                formToSubmit = document.getElementById(btn.dataset.confirmDelete);
                confirmModal.show();
            });
        });

        confirmBtn.addEventListener('click', () => {
            if (formToSubmit) {
                formToSubmit.submit();
            }
        });
    });
</script>
@endpush

@endsection