@extends('layouts.app')

@section('title', 'Edit Profile')

@section('content')

<main class="evt-page-wrapper">
    <div class="container" style="max-width: 700px;">
        <div class="evt-edit-form-card">
            <h2>Edit Profile</h2>

            @if ($errors->any())
                <div class="alert alert-danger mb-4">
                    <ul class="mb-0" style="padding-left: 18px;">
                        @foreach ($errors->all() as $err)
                            <li>{{ $err }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form method="POST" action="{{ route('profile.update') }}" enctype="multipart/form-data">
                @csrf

                <div class="mb-4">
                    <label class="form-label">Current Photo</label>
                    <div style="display:flex; align-items:center; gap:16px; margin-bottom: 12px;">
                        <div id="avatarPreviewWrap">
                            @if ($user->image)
                                <img src="{{ asset('storage/'.$user->image) }}" alt="{{ $user->fullName() }}" class="current-photo-preview" id="avatarPreview">
                            @else
                                <span class="current-photo-preview" id="avatarPreview" style="display:flex;align-items:center;justify-content:center;background:var(--gradient-primary);color:#fff;font-weight:700;font-size:22px;">
                                    {{ $user->initials() ?: 'U' }}
                                </span>
                            @endif
                        </div>

                        @if ($user->image)
                            <label class="text-muted" style="font-size: 13px; display:flex; align-items:center; gap:6px; cursor:pointer;">
                                <input type="checkbox" name="delete_photo" value="1">
                                Remove current photo
                            </label>
                        @endif
                    </div>

                    <div class="custom-file">
                        <label for="imageInput" class="choose-file-btn">
                            <span class="upload-icon">📤</span> Choose File
                        </label>
                        <span class="file-name" id="fileNameLabel">No file chosen</span>
                        <input type="file" name="image" id="imageInput" accept="image/jpeg,image/png,image/webp" hidden>
                    </div>
                    <small class="file-note">JPEG, PNG or WEBP. Max 2MB.</small>
                </div>

                <div class="row mb-3">
                    <div class="col-md-6">
                        <label class="form-label">First Name</label>
                        <input type="text" name="first_name" class="form-control" value="{{ old('first_name', $user->first_name) }}" required>
                    </div>

                    <div class="col-md-6">
                        <label class="form-label">Last Name</label>
                        <input type="text" name="last_name" class="form-control" value="{{ old('last_name', $user->last_name) }}" required>
                    </div>
                </div>

                <div class="mb-3">
                    <label class="form-label">Email</label>
                    <input type="email" name="email" class="form-control" value="{{ old('email', $user->email) }}" required>
                </div>

                <div class="row mb-4">
                    <div class="col-md-6">
                        <label class="form-label">New Password</label>
                        <input type="password" name="password" class="form-control" placeholder="Leave blank to keep current password">
                    </div>

                    <div class="col-md-6">
                        <label class="form-label">Confirm New Password</label>
                        <input type="password" name="password_confirmation" class="form-control" placeholder="Confirm new password">
                    </div>
                </div>

                <div class="d-flex gap-2">
                    <a href="{{ route('profile') }}" class="btn-outline-secondary" style="flex:1; padding: 12px;">Cancel</a>
                    <button type="submit" class="btn-save" style="flex:1;">Save Changes</button>
                </div>
            </form>
        </div>
    </div>
</main>

@push('scripts')
<script>
    const imageInput = document.getElementById('imageInput');
    const fileNameLabel = document.getElementById('fileNameLabel');
    const avatarPreviewWrap = document.getElementById('avatarPreviewWrap');

    imageInput.addEventListener('change', function () {
        if (!this.files || !this.files[0]) return;

        fileNameLabel.textContent = this.files[0].name;
        fileNameLabel.classList.add('selected');

        const reader = new FileReader();
        reader.onload = function (e) {
            avatarPreviewWrap.innerHTML = '<img src="' + e.target.result + '" alt="Preview" id="avatarPreview" class="current-photo-preview">';
        };
        reader.readAsDataURL(this.files[0]);
    });
</script>
@endpush

@endsection