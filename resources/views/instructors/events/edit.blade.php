@extends('layouts.app')

@section('content')

    <div class="evt-page-wrapper container my-5">

        <div class="row justify-content-center">

            <div class="col-lg-8">

                <div class="card evt-edit-form-card p-4 mb-5">

                    <h2 class="text-center mb-4 fw-bold text-purple">
                        Edit Event
                    </h2>

                    <form action="{{ route('instructor.events.update', $event->id) }}" method="POST"
                        enctype="multipart/form-data">

                        @csrf
                        @method('PUT')

                        <div class="row">

                            <div class="col-md-6 mb-3">
                                <label class="form-label">Event Name</label>

                                <input type="text" name="title" class="form-control"
                                    value="{{ old('title', $event->title) }}" required>
                            </div>

                            <div class="col-md-6 mb-3">
                                <label class="form-label">Category</label>

                                <input type="text" name="category" class="form-control"
                                    value="{{ old('category', $event->category) }}" required>
                            </div>

                        </div>

                        <div class="mb-4">

                            <label class="form-label">
                                Description
                            </label>

                            <textarea name="description" class="form-control" rows="3"
                                required>{{ old('description', $event->description) }}</textarea>

                        </div>

                        <div class="row">

                            <div class="col-md-6 mb-3">

                                <label class="form-label">
                                    Event Date
                                </label>

                                <input type="date" name="event_date" class="form-control"
                                    value="{{ old('event_date', \Carbon\Carbon::parse($event->event_date)->format('Y-m-d')) }}"
                                    required>

                            </div>

                            <div class="col-md-6 mb-3">

                                <label class="form-label">
                                    Price
                                </label>

                                <input type="number" name="price" class="form-control"
                                    value="{{ old('price', $event->price) }}" min="0" required>

                            </div>

                        </div>

                        <div class="mb-3">

                            <label class="form-label">
                                Location
                            </label>

                            <input type="text" name="location" class="form-control"
                                value="{{ old('location', $event->location) }}" required>

                        </div>

                        @if($event->image)

                            <div class="mb-4">

                                <label class="form-label d-block">
                                    Current Image
                                </label>

                                <img src="{{ asset('upload/' . $event->image) }}" alt="{{ $event->title }}"
                                    style="height: 150px; width: 100%; object-fit: cover; border-radius: 10px;">

                            </div>

                        @endif

                        <div class="mb-4">

                            <label for="event_image" class="form-label">
                                Replace Banner Image
                            </label>

                            <div class="custom-file">

                                <input type="file" name="image" id="event_image" accept="image/jpeg,image/png,image/webp">

                                <label for="event_image" class="choose-file-btn">
                                    <span class="upload-icon">↑</span>
                                    Choose File
                                </label>

                                <span class="file-name" id="eventFileName">
                                    No file chosen
                                </span>

                            </div>

                            <small class="file-note">
                                Optional - JPG, PNG or WEBP, maximum 2MB
                            </small>

                        </div>

                        <div class="d-flex gap-2">

                            <button type="submit" class="btn-save">
                                Save Changes
                            </button>

                            <a href="{{ route('instructor.events.create') }}"
                                class="btn btn-outline-secondary w-100 py-2 fw-bold text-center">
                                Cancel
                            </a>

                        </div>

                    </form>

                </div>

            </div>

        </div>

    </div>

@endsection