<footer class="site-footer mt-5">
        <div class="container py-5">
            <div class="row">
                <!-- About Website -->
                <div class="col-lg-4 col-md-6 mb-4">
                    <img src="{{ asset('images/logo white.png') }}" alt="Tech-journey" width="135" class="wp-footer-logo">
                    <p class="text-white-50">
                        Your journey to learn, practice and discover technology.
                    </p>
                </div>

                <!-- Quick Links -->
                <div class="col-lg-4 col-md-6 mb-4">
                    <h5 class="mb-3">Quick Links</h5>
                    <ul class="list-unstyled">
                        <li class="mb-2"><a href="{{ route('home') }}" class="text-white text-decoration-none">Home</a></li>
                        <li class="mb-2"><a href="{{ route('tracks') }}" class="text-white text-decoration-none">Tracks</a></li>
                        <li class="mb-2"><a href="{{ route('resources') }}" class="text-white text-decoration-none">Resources</a></li>
                        <li class="mb-2"><a href="{{ route('students.events') }}" class="text-white text-decoration-none">Events</a></li>
                    </ul>
                </div>

                <!-- Contact -->
                <div class="col-lg-4 col-md-6 mb-4">
                    <h5 class="mb-3">Contact</h5>
                    <p class="mb-2 text-white-50">Have a question about Tech Journey?</p>
                    <a href="{{ route('contact') }}" class="btn btn-outline-light">Contact Us</a>
                </div>
            </div>
        </div>

        <div class="border-top border-secondary">
            <div class="container py-3 text-center">
                <p class="mb-0 text-white-50">© 2026 Tech Journey. All Rights Reserved.</p>
            </div>
        </div>
    </footer>