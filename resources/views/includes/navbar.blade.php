<nav class="navbar">
    <div class="navbar-container">

        <!-- Logo -->
        <div class="navbar-left-group">
            <a href="{{ route('index') }}" class="logo">
                <img src="{{ asset('images/logo without background.png') }}" alt="Tech Journey" class="logo-light">
                <img src="{{ asset('images/logo-dark-mode.png copy.png') }}" alt="Tech Journey" class="logo-dark">
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
                    ? route('instructor.events.create')
                    : route('student.events.index');
            @endphp

            <li>
                <a href="{{ $eventsLink }}"
                    class="{{ request()->routeIs('student.events.*') || request()->routeIs('instructor.events.*') ? 'active' : '' }}">
                    Events
                </a>
            </li>

            <li>
                <a href="{{ route('index') }}#about">
                    About
                </a>
            </li>



            <nav class="navbar">
                <div class="navbar-container">

                    <!-- Logo -->
                    <div class="navbar-left-group">
                        <a href="{{ route('index') }}" class="logo">
                            <img src="{{ asset('images/logo without background.png') }}" alt="Tech Journey"
                                class="logo-light">
                            <img src="{{ asset('images/logo-dark-mode.png copy.png') }}" alt="Tech Journey"
                                class="logo-dark">
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
                            <a href="{{ route('resources') }}"
                                class="{{ request()->routeIs('resources') ? 'active' : '' }}">
                                Resources
                            </a>
                        </li>



                        @php
                            $eventsLink = auth()->check() && auth()->user()->isInstructor()
                                ? route('instructor.events.create')
                                : route('student.events.index');
                        @endphp

                        <li>
                            <a href="{{ $eventsLink }}"
                                class="{{ request()->routeIs('student.events.*') || request()->routeIs('instructor.events.*') ? 'active' : '' }}">
                                Events
                            </a>
                        </li>

                        <li>
                            <a href="{{ route('index') }}#about">
                                About
                            </a>
                        </li>



                        <li id="navLoginItem" class="nav-right-group">
                            @unless (auth()->check() && in_array(auth()->user()->role, ['student', 'instructor'], true))
                                <button id="themeToggle" class="theme-toggle-pill" type="button"
                                    aria-label="Toggle dark mode">
                                    <span class="theme-toggle-thumb">
                                        <svg class="theme-icon-light" width="14" height="14" viewBox="0 0 24 24" fill="none"
                                            stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                            stroke-linejoin="round">
                                            <circle cx="12" cy="12" r="5"></circle>
                                            <line x1="12" y1="1" x2="12" y2="3"></line>
                                            <line x1="12" y1="21" x2="12" y2="23"></line>
                                            <line x1="4.22" y1="4.22" x2="5.64" y2="5.64"></line>
                                            <line x1="18.36" y1="18.36" x2="19.78" y2="19.78"></line>
                                            <line x1="1" y1="12" x2="3" y2="12"></line>
                                            <line x1="21" y1="12" x2="23" y2="12"></line>
                                            <line x1="4.22" y1="19.78" x2="5.64" y2="18.36"></line>
                                            <line x1="18.36" y1="5.64" x2="19.78" y2="4.22"></line>
                                        </svg>
                                        <svg class="theme-icon-dark" width="14" height="14" viewBox="0 0 24 24" fill="none"
                                            stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                            stroke-linejoin="round">
                                            <path d="M21 12.79A9 9 0 1111.21 3 7 7 0 0021 12.79z"></path>
                                        </svg>
                                    </span>
                                </button>
                                <a href="{{ route('login') }}" class="login-btn">Login</a>
                            @endunless
                        </li>

                        @if (auth()->check() && in_array(auth()->user()->role, ['student', 'instructor'], true))
                            <div class="student-nav-account student-nav-account-right">
                                <button id="themeToggleStudent" class="theme-toggle-pill" type="button"
                                    aria-label="Toggle dark mode">
                                    <span class="theme-toggle-thumb">
                                        <svg class="theme-icon-light" width="14" height="14" viewBox="0 0 24 24" fill="none"
                                            stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                            stroke-linejoin="round">
                                            <circle cx="12" cy="12" r="5"></circle>
                                            <line x1="12" y1="1" x2="12" y2="3"></line>
                                            <line x1="12" y1="21" x2="12" y2="23"></line>
                                            <line x1="4.22" y1="4.22" x2="5.64" y2="5.64"></line>
                                            <line x1="18.36" y1="18.36" x2="19.78" y2="19.78"></line>
                                            <line x1="1" y1="12" x2="3" y2="12"></line>
                                            <line x1="21" y1="12" x2="23" y2="12"></line>
                                            <line x1="4.22" y1="19.78" x2="5.64" y2="18.36"></line>
                                            <line x1="18.36" y1="5.64" x2="19.78" y2="4.22"></line>
                                        </svg>
                                        <svg class="theme-icon-dark" width="14" height="14" viewBox="0 0 24 24" fill="none"
                                            stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                            stroke-linejoin="round">
                                            <path d="M21 12.79A9 9 0 1111.21 3 7 7 0 0021 12.79z"></path>
                                        </svg>
                                    </span>
                                </button>

                                <a href="{{ route('profile') }}" class="student-nav-avatar" aria-label="My Profile">
                                    @if (auth()->user()->image)
                                        <img src="{{ asset('storage/' . auth()->user()->image) }}" alt="Profile">
                                    @else
                                        <span>{{ auth()->user()->initials() ?: 'U' }}</span>
                                    @endif
                                </a>
                                <form action="{{ route('logout') }}" method="post" class="d-inline">
                                    @csrf
                                    <button type="submit" class="student-logout">
                                        Logout
                                    </button>
                                </form>
                            </div>
                        @endif

                </div>
            </nav>
            <nav class="navbar">
                <div class="navbar-container">

                    <!-- Logo -->
                    <div class="navbar-left-group">
                        <a href="{{ route('index') }}" class="logo">
                            <img src="{{ asset('images/logo without background.png') }}" alt="Tech Journey"
                                class="logo-light">
                            <img src="{{ asset('images/logo-dark-mode.png copy.png') }}" alt="Tech Journey"
                                class="logo-dark">
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
                            <a href="{{ route('resources') }}"
                                class="{{ request()->routeIs('resources') ? 'active' : '' }}">
                                Resources
                            </a>
                        </li>



                        @php
                            $eventsLink = auth()->check() && auth()->user()->isInstructor()
                                ? route('instructor.events.create')
                                : route('student.events.index');
                        @endphp

                        <li>
                            <a href="{{ $eventsLink }}"
                                class="{{ request()->routeIs('student.events.*') || request()->routeIs('instructor.events.*') ? 'active' : '' }}">
                                Events
                            </a>
                        </li>

                        <li>
                            <a href="{{ route('index') }}#about">
                                About
                            </a>
                        </li>



                        <li id="navLoginItem" class="nav-right-group">
                            @unless (auth()->check() && in_array(auth()->user()->role, ['student', 'instructor'], true))
                                <button id="themeToggle" class="theme-toggle-pill" type="button"
                                    aria-label="Toggle dark mode">
                                    <span class="theme-toggle-thumb">
                                        <svg class="theme-icon-light" width="14" height="14" viewBox="0 0 24 24" fill="none"
                                            stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                            stroke-linejoin="round">
                                            <circle cx="12" cy="12" r="5"></circle>
                                            <line x1="12" y1="1" x2="12" y2="3"></line>
                                            <line x1="12" y1="21" x2="12" y2="23"></line>
                                            <line x1="4.22" y1="4.22" x2="5.64" y2="5.64"></line>
                                            <line x1="18.36" y1="18.36" x2="19.78" y2="19.78"></line>
                                            <line x1="1" y1="12" x2="3" y2="12"></line>
                                            <line x1="21" y1="12" x2="23" y2="12"></line>
                                            <line x1="4.22" y1="19.78" x2="5.64" y2="18.36"></line>
                                            <line x1="18.36" y1="5.64" x2="19.78" y2="4.22"></line>
                                        </svg>
                                        <svg class="theme-icon-dark" width="14" height="14" viewBox="0 0 24 24" fill="none"
                                            stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                            stroke-linejoin="round">
                                            <path d="M21 12.79A9 9 0 1111.21 3 7 7 0 0021 12.79z"></path>
                                        </svg>
                                    </span>
                                </button>
                                <a href="{{ route('login') }}" class="login-btn">Login</a>
                            @endunless
                        </li>

                        @if (auth()->check() && in_array(auth()->user()->role, ['student', 'instructor'], true))
                            <div class="student-nav-account student-nav-account-right">
                                <button id="themeToggleStudent" class="theme-toggle-pill" type="button"
                                    aria-label="Toggle dark mode">
                                    <span class="theme-toggle-thumb">
                                        <svg class="theme-icon-light" width="14" height="14" viewBox="0 0 24 24" fill="none"
                                            stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                            stroke-linejoin="round">
                                            <circle cx="12" cy="12" r="5"></circle>
                                            <line x1="12" y1="1" x2="12" y2="3"></line>
                                            <line x1="12" y1="21" x2="12" y2="23"></line>
                                            <line x1="4.22" y1="4.22" x2="5.64" y2="5.64"></line>
                                            <line x1="18.36" y1="18.36" x2="19.78" y2="19.78"></line>
                                            <line x1="1" y1="12" x2="3" y2="12"></line>
                                            <line x1="21" y1="12" x2="23" y2="12"></line>
                                            <line x1="4.22" y1="19.78" x2="5.64" y2="18.36"></line>
                                            <line x1="18.36" y1="5.64" x2="19.78" y2="4.22"></line>
                                        </svg>
                                        <svg class="theme-icon-dark" width="14" height="14" viewBox="0 0 24 24" fill="none"
                                            stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                            stroke-linejoin="round">
                                            <path d="M21 12.79A9 9 0 1111.21 3 7 7 0 0021 12.79z"></path>
                                        </svg>
                                    </span>
                                </button>

                                <a href="{{ route('profile') }}" class="student-nav-avatar" aria-label="My Profile">
                                    @if (auth()->user()->image)
                                        <img src="{{ asset('storage/' . auth()->user()->image) }}" alt="Profile">
                                    @else
                                        <span>{{ auth()->user()->initials() ?: 'U' }}</span>
                                    @endif
                                </a>
                                <form action="{{ route('logout') }}" method="post" class="d-inline">
                                    @csrf
                                    <button type="submit" class="student-logout">
                                        Logout
                                    </button>
                                </form>
                            </div>
                        @endif

                </div>
            </nav>
            </li>

            @if (auth()->check() && in_array(auth()->user()->role, ['student', 'instructor'], true))
                <div class="student-nav-account student-nav-account-right">
                    <button id="themeToggleStudent" class="theme-toggle-pill" type="button" aria-label="Toggle dark mode">
                        <span class="theme-toggle-thumb">
                            <svg class="theme-icon-light" width="14" height="14" viewBox="0 0 24 24" fill="none"
                                stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <circle cx="12" cy="12" r="5"></circle>
                                <line x1="12" y1="1" x2="12" y2="3"></line>
                                <line x1="12" y1="21" x2="12" y2="23"></line>
                                <line x1="4.22" y1="4.22" x2="5.64" y2="5.64"></line>
                                <line x1="18.36" y1="18.36" x2="19.78" y2="19.78"></line>
                                <line x1="1" y1="12" x2="3" y2="12"></line>
                                <line x1="21" y1="12" x2="23" y2="12"></line>
                                <line x1="4.22" y1="19.78" x2="5.64" y2="18.36"></line>
                                <line x1="18.36" y1="5.64" x2="19.78" y2="4.22"></line>
                            </svg>
                            <svg class="theme-icon-dark" width="14" height="14" viewBox="0 0 24 24" fill="none"
                                stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M21 12.79A9 9 0 1111.21 3 7 7 0 0021 12.79z"></path>
                            </svg>
                        </span>
                    </button>

                    <a href="{{ route('profile') }}" class="student-nav-avatar" aria-label="My Profile">
                        @if (auth()->user()->image)
                            <img src="{{ asset('storage/' . auth()->user()->image) }}" alt="Profile">
                        @else
                            <span>{{ auth()->user()->initials() ?: 'U' }}</span>
                        @endif
                    </a>
                    <form action="{{ route('logout') }}" method="post" class="d-inline">
                        @csrf
                        <button type="submit" class="student-logout">
                            Logout
                        </button>
                    </form>
                </div>
            @endif

    </div>
</nav>