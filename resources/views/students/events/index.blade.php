@extends('layouts.app')

@section('content')

<div class="evt-page-wrapper container my-5">

    <h2 class="evt-title mb-4">
        Available Events
    </h2>

    @if(session('success'))
        <div class="alert alert-info">
            {{ session('success') }}
        </div>
    @endif

    {{-- Categories Filter --}}
    <div class="d-flex flex-wrap gap-2 mb-4">

        <button class="evt-filter-btn active" data-filter="all">
            All
        </button>

        @foreach($events->pluck('category')->unique()->filter() as $category)

            <button
                class="evt-filter-btn"
                data-filter="{{ strtolower(trim($category)) }}"
            >
                {{ $category }}
            </button>

        @endforeach

    </div>

    <h3 class="fw-bold mb-4 text-purple">
        All Events
    </h3>

    {{-- Events --}}
    <div class="row">

        @forelse($events as $event)

            @php
                $isBooked = in_array(
                    (int) $event->id,
                    $registeredEventIds,
                    true
                );
            @endphp

            <div
                class="col-md-4 mb-4 evt-card-item"
                data-category="{{ strtolower($event->category) }}"
            >

                <div class="card form-card shadow-sm border-0 h-100">

                    {{-- Image --}}
                    @if($event->image)

                        <img
                            src="{{ asset('upload/' . $event->image) }}"
                            alt="{{ $event->title }}"
                            class="card-img-top"
                            style="height: 180px; object-fit: cover; border-top-left-radius: 12px; border-top-right-radius: 12px;"
                        >

                    @else

                        <div
                            class="bg-secondary text-white d-flex align-items-center justify-content-center"
                            style="height: 180px;"
                        >
                            No Image Available
                        </div>

                    @endif


                    <div class="card-body d-flex flex-column">

                        {{-- Category + Date --}}
                        <div class="d-flex justify-content-between align-items-center mb-2">

                            <span class="badge bg-secondary">
                                {{ $event->category }}
                            </span>

                            <small class="text-muted">
                                {{ $event->created_at }}
                            </small>

                        </div>


                        {{-- Title --}}
                        <h5 class="card-title fw-bold text-dark">
                            {{ $event->title }}
                        </h5>


                        {{-- Description --}}
                        <p class="card-text text-muted small mb-2">
                            {{ $event->description }}
                        </p>


                        {{-- Location + Date --}}
                        <div class="mb-2">

                            <small class="d-block text-muted">
                                <strong>Location:</strong>
                                {{ $event->location }}
                            </small>

                            <small class="d-block text-muted">
                                <strong>Date:</strong>
                                {{ $event->event_date }}
                            </small>

                        </div>


                        {{-- Price --}}
                        <p class="fw-bold text-purple mb-3">

                            Price:

                            @if($event->price == 0)
                                Free
                            @else
                                EGP {{ $event->price }}
                            @endif

                        </p>


                        {{-- Booking Button --}}
                        <div class="mt-auto">

                            <button
                                type="button"

                                class="btn btn-purple w-100 fw-bold
                                    {{ $isBooked ? 'booked-event-button' : '' }}"

                                @if($isBooked)
                                    style="background:#22c55e !important;
                                           border-color:#22c55e !important;
                                           color:#fff !important;"
                                    disabled
                                @endif

                                data-bs-toggle="modal"
                                data-bs-target="#bookingModal"

                                onclick='openBooking(
                                    @json($event->title),
                                    {{ (float) $event->price }},
                                    {{ (int) $event->id }},
                                    @json($event->event_date),
                                    @json($event->location),
                                    @json(asset("upload/" . $event->image))
                                )'
                            >

                                @if($isBooked)

                                    <span
                                        class="booked-text"
                                        style="color:#fff !important;"
                                    >
                                        Booked
                                    </span>

                                @else

                                    Book Now

                                @endif

                            </button>

                        </div>

                    </div>

                </div>

            </div>

        @empty

            <div class="col-12 text-center text-muted py-5">

                <h4>
                    No events available right now.
                </h4>

            </div>

        @endforelse

    </div>

</div>


{{-- Booking Modal --}}
<div class="modal fade" id="bookingModal">

    <div class="modal-dialog modal-dialog-centered">

        <div class="modal-content border-0 shadow rounded-3">

            <div class="modal-header border-0 pb-0">

                <h5
                    class="modal-title fw-bold text-white"
                    id="bookingModalLabel"
                >
                    Confirm Event Booking
                </h5>

                <button
                    type="button"
                    class="btn-close"
                    data-bs-dismiss="modal"
                    aria-label="Close"
                ></button>

            </div>


            <div class="modal-body p-4">

                <img
                    id="modalImage"
                    src=""
                    alt=""
                    class="rounded mb-3"
                    style="height: 180px; object-fit: cover; width: 100%;"
                >


                <div class="bg-light p-3 rounded-3 mb-4 border">

                    <h5
                        id="modalEventName"
                        class="fw-bold text-dark mb-2"
                    ></h5>


                    <p class="mb-1 text-muted small">

                        <strong>Date:</strong>

                        <span id="modalDate"></span>

                    </p>


                    <p class="mb-1 text-muted small">

                        <strong>Location:</strong>

                        <span id="modalLocation"></span>

                    </p>


                    <p class="mb-1 text-purple fw-bold fs-5 mt-2">

                        Price:

                        <span id="modalPrice"></span>

                    </p>

                </div>


                {{-- Laravel Booking Form --}}
                <form
                    action="{{ route('student.events.register') }}"
                    method="POST"
                >

                    @csrf

                    {{-- JS will put event id here --}}
                    <input
                        type="hidden"
                        name="event_id"
                        id="modalEventId"
                        value=""
                    >


                    <button
                        type="submit"
                        class="btn btn-purple w-100 py-2 fw-bold"
                        {{ !Auth::check() ? 'disabled' : '' }}
                    >

                        {{ Auth::check() ? 'Confirm Booking' : 'Log in to Book' }}

                    </button>

                </form>

            </div>

        </div>

    </div>

</div>


{{-- Booking Success Modal --}}
@if(session('success'))

    <div
        class="modal fade"
        id="bookingSuccessModal"
        tabindex="-1"
        aria-hidden="true"
    >

        <div class="modal-dialog modal-dialog-centered">

            <div class="modal-content student-modal">

                <div class="success-icon">
                    ✓
                </div>

                <h3>
                    Booking Successful
                </h3>

                <p>
                    Your event booking has been confirmed successfully.
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


    <script>
        document.addEventListener('DOMContentLoaded', function () {

            var m = document.getElementById('bookingSuccessModal');

            if (m && window.bootstrap) {

                bootstrap.Modal
                    .getOrCreateInstance(m)
                    .show();

            }

        });
    </script>

@endif

@endsection