<nav class="navbar">
        <div class="navbar-container">

            <!-- Logo -->
            <div class="navbar-left-group">
                <a href="{{ route('index') }}" class="logo">
                    <img src="{{ asset('images/logo without background.png') }}" alt="Tech Journey">
                </a>
            </div>

            <!-- Mobile Toggle -->
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navLinks"
                aria-controls="navLinks" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <!-- Navigation -->
            <ul class="nav-links collapse" id="navLinks">

                <li>
                    <a href="{{ route('index') }}" class="{{ request()->routeIs('index') ? 'active' : '' }}">
                        Home
                    </a>
                </li>

                <li>
                    <a href="{{ route('tracks') }}" class="{{ request()->routeIs('tracks') ? 'active' : '' }}">
                        Tracks
                    </a>
                </li>

                <li>
                    <a href="{{ route('resources') }}" class="{{ request()->routeIs('resources') ? 'active' : '' }}">
                        Resources
                    </a>
                </li>

                @php
                                    $eventsLink = auth()->check() && auth()->user()->isInstructor()
                                        ? route('instructors.events.index')
                    : route('student.events.index');
                @endphp

                <li>
                    <a href="{{ $eventsLink }}"
                        class="{{ request()->routeIs('students.events') || request()->routeIs('instructors.events.*') ? 'active' : '' }}">
                        Events
                    </a>
                </li>

                <li>
                    <a href="{{ route('index') }}#about">
                        About
                    </a>
                </li>

                @unless (auth()->check() && in_array(auth()->user()->role, ['student', 'instructor'], true))
                    <li id="navLoginItem"><a href="{{ route('login') }}" class="login-btn">Login</a></li>
                @endunless

            </ul>

            @if (auth()->check() && in_array(auth()->user()->role, ['student', 'instructor'], true))
                <div class="student-nav-account student-nav-account-right">
                    <a href="{{ route('profile') }}" class="student-nav-avatar" aria-label="My Profile">
                        @if (auth()->user()->image)
                            <img src="{{ asset(auth()->user()->image) }}" alt="Profile">
                        @else
                            <span>{{ auth()->user()->initials() ?: 'U' }}</span>
                        @endif
                    </a>
                    <form action="{{ route('logout') }}" method="post" class="d-inline">
                        @csrf
                        <button type="submit" class="student-logout" style="background:none;border:none;">Logout</button>
                    </form>
                </div>
            @endif

        </div>
    </nav>