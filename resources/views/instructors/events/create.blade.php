@extends('layouts.app')

@section('content')

    <div class="evt-page-wrapper container my-5">

        @if(session('success'))
            <div class="alert alert-success mb-4">
                {{ session('success') }}
            </div>
        @endif

        <div class="row justify-content-center">
            <div class="col-lg-8">

                <div class="card evt-add-form-card p-4 mb-5">

                    <h2 class="text-center mb-4 fw-bold text-purple">
                        Add New Event
                    </h2>

                    <form action="{{ route('instructor.events.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <div class="row">

                            <div class="col-md-6 mb-3">
                                <label class="form-label">Event Name</label>
                                <input type="text" name="title" class="form-control" required>
                            </div>

                            <div class="col-md-6 mb-3">
                                <label class="form-label">Category</label>
                                <input type="text" name="category" class="form-control" required>
                            </div>

                        </div>

                        <div class="mb-4">
                            <label class="form-label">Description</label>
                            <textarea name="description" class="form-control" rows="3" required></textarea>
                        </div>

                        <div class="row">

                            <div class="col-md-6 mb-3">
                                <label class="form-label">Event Date</label>
                                <input type="date" name="event_date" class="form-control" required>
                            </div>

                            <div class="col-md-6 mb-3">
                                <label class="form-label">Price</label>
                                <input type="number" name="price" class="form-control" min="0" required>
                            </div>

                        </div>

                        <div class="row">

                            <div class="col-md-6 mb-3">
                                <label class="form-label">Location</label>
                                <input type="text" name="location" class="form-control" required>
                            </div>

                            <div class="col-md-6 mb-3">
                                <label class="form-label">Event Image</label>

                                <div class="custom-file">
                                    <input type="file" name="image" id="event_image"
                                        accept="image/jpeg,image/png,image/webp">

                                    <label for="event_image" class="choose-file-btn">
                                        <span class="upload-icon">↑</span>
                                        Choose File
                                    </label>

                                    <span class="file-name" id="eventFileName">
                                        No file chosen
                                    </span>
                                </div>

                            </div>

                        </div>

                        <small class="file-note">
                            Optional - JPG, PNG or WEBP, maximum 2MB
                        </small>

                        <button type="submit" class="btn-event">
                            Create Event
                        </button>

                    </form>

                </div>

            </div>
        </div>


        <h3 class="fw-bold mb-4 text-purple">
            All Events
        </h3>

        <div class="row">

            @forelse($events as $event)

                <div class="col-md-4 mb-4 evt-card-item">

                    <div class="card form-card shadow-sm border-0 h-100">

                        @if($event->image)
                            <img src="{{ asset('upload/' . $event->image) }}" alt="{{ $event->title }}" class="card-img-top">
                        @else
                            <div class="card-img-top d-flex align-items-center justify-content-center bg-light">
                                No Image
                            </div>
                        @endif

                        <div class="card-body d-flex flex-column">

                            <div class="d-flex justify-content-between align-items-center mb-2">

                                <span class="badge bg-secondary">
                                    {{ $event->category }}
                                </span>

                                <small class="text-muted">
                                    {{ $event->event_date }}
                                </small>

                            </div>

                            <h5 class="card-title fw-bold text-dark">
                                {{ $event->title }}
                            </h5>

                            <p class="card-text text-muted small mb-2">
                                {{ $event->description }}
                            </p>

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

                            <p class="fw-bold text-purple mb-3">
                                Price: ${{ $event->price }}
                            </p>

                            <div class="mt-auto d-flex gap-2">

                                <a href="{{ route('instructor.events.edit', $event->id) }}"
                                    class="btn btn-outline-purple btn-sm flex-fill">
                                    Edit
                                </a>

                                <form action="{{ route('instructor.events.destroy', $event->id) }}" method="POST"
                                    class="flex-fill" onsubmit="return confirm('Are you sure you want to delete this event?');">

                                    @csrf
                                    @method('DELETE')

                                    <button type="submit" class="btn btn-outline-danger btn-sm w-100">
                                        Delete
                                    </button>

                                </form>

                            </div>

                        </div>

                    </div>

                </div>

            @empty

                <div class="col-12">
                    <div class="alert alert-info">
                        No events available.
                    </div>
                </div>

            @endforelse

        </div>

    </div>

@endsection