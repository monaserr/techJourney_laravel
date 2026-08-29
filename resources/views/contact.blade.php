<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Contact Us | Tech Journey</title>
    <link rel="icon" type="image/png" href="{{ asset('images/Screenshot 2026-08-29 174721.png') }}">

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    <!-- Main CSS -->
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700;800&display=swap"
        rel="stylesheet">


    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background-color: var(--color-bg-white);
            margin: 0;
            color: var(--color-text-dark);
        }

        .contact-page {
            background-color: var(--color-bg-light);
            min-height: 60vh;
            padding: 110px 20px 70px;
        }

        .contact-container {
            max-width: 900px;
            margin: auto;
        }

        /* Title */
        .contact-title {
            text-align: center;
            margin-bottom: 40px;
        }

        .contact-title h1 {
            background: var(--gradient-title);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            font-size: 36px;
            font-weight: 800;
            margin-bottom: 8px;
        }

        .contact-title p {
            color: var(--color-text-gray);
            margin: 0;
        }

        /* Main Card */
        .contact-card {
            background: var(--color-bg-white);
            border: 1px solid var(--color-border);
            border-radius: 20px;
            padding: 35px;
            box-shadow: 0 15px 40px var(--shadow-purple-light);
        }

        /* Contact Info */
        .contact-info {
            background: var(--color-bg-light);
            border: 1px solid var(--color-border);
            border-radius: 18px;
            padding: 30px;
            height: 100%;
            transition: 0.3s ease;
        }

        .contact-info:hover {
            border-color: var(--color-border-hover);
            box-shadow: 0 10px 30px var(--shadow-purple-light);
        }

        .contact-info h3 {
            color: var(--color-text-dark);
            font-size: 22px;
            font-weight: 700;
            margin-bottom: 25px;
        }

        .contact-item {
            display: flex;
            align-items: flex-start;
            gap: 12px;
            margin-bottom: 22px;
        }

        .contact-item i {
            color: var(--color-primary);
            font-size: 21px;
        }

        .contact-item strong {
            display: block;
            color: var(--color-text-dark);
            margin-bottom: 3px;
        }

        .contact-item span {
            color: var(--color-text-gray);
            font-size: 14px;
        }

        /* Social Buttons */
        .contact-info .btn-light {
            width: 42px;
            height: 42px;
            display: flex;
            align-items: center;
            justify-content: center;

            background: var(--color-bg-white);
            color: var(--color-primary);

            border: 1px solid var(--color-border);
            border-radius: 10px;

            transition: 0.3s ease;
        }

        .contact-info .btn-light:hover {
            background: var(--gradient-primary);
            color: white;
            border-color: transparent;
            transform: translateY(-3px);
            box-shadow: 0 8px 18px var(--shadow-purple-medium);
        }

        /* Form */
        .contact-form {
            background: var(--color-bg-white);
            border: 1px solid var(--color-border);
            border-radius: 18px;
            padding: 30px;
            height: 100%;
        }

        .contact-form label {
            color: var(--color-text-dark);
            font-weight: 600;
            margin-bottom: 7px;
        }

        .contact-form .form-control {
            border: 1px solid var(--color-border);
            border-radius: 10px;
            padding: 11px 14px;
            color: var(--color-text-dark);
            transition: 0.3s ease;
        }

        .contact-form .form-control::placeholder {
            color: #94a3b8;
        }

        .contact-form .form-control:focus {
            border-color: var(--color-primary-light);
            box-shadow: 0 0 0 3px rgba(124, 58, 237, 0.12);
        }

        .contact-form textarea {
            min-height: 130px;
            resize: vertical;
        }

        /* Send Button */
        .send-btn {
            width: 100%;
            border: none;
            border-radius: 10px;
            padding: 13px;

            background: var(--gradient-primary);
            color: #ffffff;

            font-weight: 600;
            transition: 0.3s ease;
        }

        .send-btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 10px 25px var(--shadow-purple-medium);
        }

        /* Success Message */
        .success-message {
            background-color: #f0fdf4;
            border: 1px solid #bbf7d0;
            color: #15803d;

            padding: 12px 15px;
            border-radius: 10px;
            margin-bottom: 20px;
        }

        /* Error Message */
        .error-message {
            background-color: #fef2f2;
            border: 1px solid #fecaca;
            color: #b91c1c;

            padding: 12px 15px;
            border-radius: 10px;
            margin-bottom: 20px;
        }

        /* Responsive */
        @media (max-width: 768px) {

            .contact-page {
                padding: 100px 15px 50px;
            }

            .contact-card {
                padding: 20px;
            }

            .contact-info,
            .contact-form {
                padding: 22px;
            }

            .contact-title h1 {
                font-size: 30px;
            }
        }
    </style>

</head>


<body>


    {{-- Navbar --}}
    @include('includes.navbar')


    {{-- Contact Page --}}
    <main class="contact-page">

        <div class="contact-container">


            {{-- Title --}}
            <div class="contact-title">

                <h1>
                    Contact Us
                </h1>

                <p>
                    Tell us how we can help you
                </p>

            </div>


            {{-- Main Card --}}
            <div class="contact-card">

                <div class="row g-4">


                    {{-- Contact Information --}}
                    <div class="col-lg-5">

                        <div class="contact-info">

                            <h3>
                                Get In Touch
                            </h3>


                            <div class="contact-item">

                                <i class="bi bi-envelope"></i>

                                <div>

                                    <strong>
                                        Email
                                    </strong>

                                    <span>
                                        info@techjourney.com
                                    </span>

                                </div>

                            </div>


                            <div class="contact-item">

                                <i class="bi bi-telephone"></i>

                                <div>

                                    <strong>
                                        Phone
                                    </strong>

                                    <span>
                                        +20 123 456 7890
                                    </span>

                                </div>

                            </div>


                            <div class="contact-item">

                                <i class="bi bi-geo-alt"></i>

                                <div>

                                    <strong>
                                        Location
                                    </strong>

                                    <span>
                                        Egypt
                                    </span>

                                </div>

                            </div>


                            <h5 class="mt-4 mb-3">
                                Follow Us
                            </h5>


                            <div class="d-flex gap-2">

                                <a href="#" class="btn btn-light">
                                    <i class="bi bi-facebook"></i>
                                </a>


                                <a href="#" class="btn btn-light">
                                    <i class="bi bi-twitter-x"></i>
                                </a>


                                <a href="#" class="btn btn-light">
                                    <i class="bi bi-linkedin"></i>
                                </a>


                                <a href="#" class="btn btn-light">
                                    <i class="bi bi-instagram"></i>
                                </a>

                            </div>

                        </div>

                    </div>



                    {{-- Contact Form --}}
                    <div class="col-lg-7">

                        <div class="contact-form">


                            {{-- Success Message --}}
                            @if(session('success'))

                                <div class="success-message">

                                    {{ session('success') }}

                                </div>

                            @endif


                            {{-- Validation Errors --}}
                            @if($errors->any())

                                <div class="error-message">

                                    <ul class="mb-0">

                                        @foreach($errors->all() as $error)

                                            <li>
                                                {{ $error }}
                                            </li>

                                        @endforeach

                                    </ul>

                                </div>

                            @endif



                            <form method="POST" action="{{ route('contact.send') }}">

                                @csrf


                                {{-- Name --}}
                                <div class="mb-3">

                                    <label class="form-label">
                                        Your Name
                                    </label>

                                    <input type="text" name="name" class="form-control" placeholder="Your Name"
                                        value="{{ old('name') }}" required>

                                </div>



                                {{-- Email --}}
                                <div class="mb-3">

                                    <label class="form-label">
                                        Your Email
                                    </label>

                                    <input type="email" name="email" class="form-control" placeholder="Your Email"
                                        value="{{ old('email') }}" required>

                                </div>



                                {{-- Subject --}}
                                <div class="mb-3">

                                    <label class="form-label">
                                        Subject
                                    </label>

                                    <input type="text" name="subject" class="form-control" placeholder="Subject"
                                        value="{{ old('subject') }}" required>

                                </div>



                                {{-- Message --}}
                                <div class="mb-3">

                                    <label class="form-label">
                                        Your Message
                                    </label>

                                    <textarea name="message" class="form-control" placeholder="Your Message"
                                        required>{{ old('message') }}</textarea>

                                </div>



                                {{-- Submit --}}
                                <button type="submit" class="send-btn">
                                    Send Message
                                </button>


                            </form>


                        </div>

                    </div>


                </div>

            </div>

        </div>

    </main>


    {{-- Footer --}}
    @include('includes.footer')


    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js">
    </script>


    <!-- Main JS -->
    <script src="{{ asset('js/script.js') }}"></script>

</body>

</html>