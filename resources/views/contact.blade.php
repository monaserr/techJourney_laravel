<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Contact Us - Tech Journey</title>

    <!-- Bootstrap -->
    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css"
        rel="stylesheet"
    >

    <!-- Bootstrap Icons -->
    <link
        rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css"
    >

    <!-- Main CSS -->
    <link
        rel="stylesheet"
        href="{{ asset('css/style.css') }}"
    >

    <!-- Google Font -->
    <link
        href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700;800&display=swap"
        rel="stylesheet"
    >


    <style>

        body {
            font-family: 'Poppins', sans-serif;
            background-color: #ffffff;
            margin: 0;
        }


        .contact-page {

            background-color: #F8FAFC;

            min-height: 60vh;

            padding: 70px 20px;

        }


        .contact-container {

            max-width: 900px;

            margin: auto;

        }


        .contact-title {

            text-align: center;

            margin-bottom: 40px;

        }


        .contact-title h1 {

            color: #1E3A8A;

            font-size: 32px;

            font-weight: 700;

            margin-bottom: 8px;

        }


        .contact-title p {

            color: #64748B;

            margin: 0;

        }


        .contact-card {

            background: #FFFFFF;

            border-radius: 15px;

            padding: 35px;

            box-shadow: 0 8px 25px rgba(15, 23, 42, 0.08);

        }


        .contact-info {

            background: #FFFFFF;

            border-radius: 12px;

            padding: 25px;

            height: 100%;

            box-shadow: 0 5px 18px rgba(15, 23, 42, 0.06);

        }


        .contact-info h3 {

            color: #1E3A8A;

            font-size: 20px;

            font-weight: 700;

            margin-bottom: 25px;

        }


        .contact-item {

            display: flex;

            align-items: flex-start;

            gap: 12px;

            margin-bottom: 20px;

        }


        .contact-item i {

            color: #2563EB;

            font-size: 20px;

        }


        .contact-item strong {

            display: block;

            color: #0F172A;

            margin-bottom: 3px;

        }


        .contact-item span {

            color: #64748B;

            font-size: 14px;

        }


        .contact-form {

            background: #FFFFFF;

            border-radius: 12px;

            padding: 25px;

            height: 100%;

            box-shadow: 0 5px 18px rgba(15, 23, 42, 0.06);

        }


        .contact-form label {

            color: #0F172A;

            font-weight: 600;

            margin-bottom: 7px;

        }


        .contact-form .form-control {

            border: 1px solid #E2E8F0;

            border-radius: 8px;

            padding: 11px 14px;

        }


        .contact-form .form-control:focus {

            border-color: #2563EB;

            box-shadow: 0 0 0 3px rgba(37, 99, 235, 0.10);

        }


        .contact-form textarea {

            min-height: 130px;

            resize: vertical;

        }


        .send-btn {

            width: 100%;

            border: none;

            border-radius: 8px;

            padding: 12px;

            background-color: #2563EB;

            color: #FFFFFF;

            font-weight: 600;

            transition: 0.3s;

        }


        .send-btn:hover {

            background-color: #1E3A8A;

        }


        .success-message {

            background-color: #ECFDF5;

            border: 1px solid #A7F3D0;

            color: #047857;

            padding: 12px 15px;

            border-radius: 8px;

            margin-bottom: 20px;

        }


        .error-message {

            background-color: #FEF2F2;

            border: 1px solid #FECACA;

            color: #B91C1C;

            padding: 12px 15px;

            border-radius: 8px;

            margin-bottom: 20px;

        }


        @media (max-width: 768px) {

            .contact-page {

                padding: 40px 15px;

            }

            .contact-card {

                padding: 20px;

            }

            .contact-title h1 {

                font-size: 27px;

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

                                <a
                                    href="#"
                                    class="btn btn-light"
                                >
                                    <i class="bi bi-facebook"></i>
                                </a>


                                <a
                                    href="#"
                                    class="btn btn-light"
                                >
                                    <i class="bi bi-twitter-x"></i>
                                </a>


                                <a
                                    href="#"
                                    class="btn btn-light"
                                >
                                    <i class="bi bi-linkedin"></i>
                                </a>


                                <a
                                    href="#"
                                    class="btn btn-light"
                                >
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



                            <form
                                method="POST"
                                action="{{ route('contact.send') }}"
                            >

                                @csrf


                                {{-- Name --}}
                                <div class="mb-3">

                                    <label class="form-label">
                                        Your Name
                                    </label>

                                    <input
                                        type="text"
                                        name="name"
                                        class="form-control"
                                        placeholder="Your Name"
                                        value="{{ old('name') }}"
                                        required
                                    >

                                </div>



                                {{-- Email --}}
                                <div class="mb-3">

                                    <label class="form-label">
                                        Your Email
                                    </label>

                                    <input
                                        type="email"
                                        name="email"
                                        class="form-control"
                                        placeholder="Your Email"
                                        value="{{ old('email') }}"
                                        required
                                    >

                                </div>



                                {{-- Subject --}}
                                <div class="mb-3">

                                    <label class="form-label">
                                        Subject
                                    </label>

                                    <input
                                        type="text"
                                        name="subject"
                                        class="form-control"
                                        placeholder="Subject"
                                        value="{{ old('subject') }}"
                                        required
                                    >

                                </div>



                                {{-- Message --}}
                                <div class="mb-3">

                                    <label class="form-label">
                                        Your Message
                                    </label>

                                    <textarea
                                        name="message"
                                        class="form-control"
                                        placeholder="Your Message"
                                        required
                                    >{{ old('message') }}</textarea>

                                </div>



                                {{-- Submit --}}
                                <button
                                    type="submit"
                                    class="send-btn"
                                >
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
    <script
        src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js">
    </script>


    <!-- Main JS -->
    <script src="{{ asset('js/script.js') }}"></script>

</body>

</html>
