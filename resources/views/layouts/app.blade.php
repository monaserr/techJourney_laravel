<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ isset($pageTitle) ? $pageTitle . ' | Tech Journey' : 'Tech Journey' }}</title>
    <link rel="icon" type="image/png" href="{{ asset('images/Screenshot 2026-08-29 174721.png') }}">

    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    {{-- Main CSS --}}
    <link rel="stylesheet" href="{{ asset('css/style.css') }}?v={{ filemtime(public_path('css/style.css')) }}">

    {{-- Tracks CSS --}}
    @if (request()->routeIs('tracks'))
        <link rel="stylesheet" href="{{ asset('css/trackCss.css') }}?v={{ filemtime(public_path('css/trackCss.css')) }}">
    @endif

    {{-- Events CSS --}}
    @if (
            request()->routeIs('student.events.*') ||
            request()->routeIs('instructor.events.*')
        )
        <link rel="stylesheet"
            href="{{ asset('css/event_istructor_style.css') }}?v={{ filemtime(public_path('css/event_istructor_style.css')) }}">
    @endif

    {{-- Resources CSS --}}
    @if (request()->routeIs('resources'))
        <link rel="stylesheet"
            href="{{ asset('css/resourseCss.css') }}?v={{ filemtime(public_path('css/resourseCss.css')) }}">
    @endif

    {{-- Profile CSS --}}
    @if (
            request()->routeIs('profile') ||
            request()->routeIs('edit_profile')
        )
        <link rel="stylesheet" href="{{ asset('css/profile.css') }}?v={{ filemtime(public_path('css/profile.css')) }}">
    @endif

    {{-- Edit Profile CSS --}}
    @if (request()->routeIs('edit_profile'))
        <link rel="stylesheet"
            href="{{ asset('css/editProfile.css') }}?v={{ filemtime(public_path('css/editProfile.css')) }}">
    @endif


    @stack('styles')

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700;800&display=swap"
        rel="stylesheet">

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">

    @stack('head')
</head>

<body class="{{ request()->routeIs('index') || request()->routeIs('tracks') ? 'animated-page' : '' }}">

    @include('includes.navbar')

    @yield('content')

    @include('includes.footer')

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI"
        crossorigin="anonymous"></script>
    <script src="{{ asset('js/script.js') }}"></script>
    <script src="{{ asset('js/tracks.js') }}"></script>
    <script src="{{ asset('js/scriptResourse.js') }}"></script>

    @stack('scripts')
</body>

</html>