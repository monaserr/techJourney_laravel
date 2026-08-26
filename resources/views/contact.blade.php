@extends('layouts.app')

@section('content')

<style>
    .contact-page {
        background: #f8fafc;
        min-height: 70vh;
        padding: 70px 20px;
    }

    .contact-container {
        max-width: 1000px;
        margin: 0 auto;
    }

    .contact-title {
        text-align: center;
        margin-bottom: 45px;
    }

    .contact-title h1 {
        color: #1e3a8a;
        font-size: 38px;
        font-weight: 800;
        margin-bottom: 10px;
    }

    .contact-title p {
        color: #64748b;
        font-size: 16px;
        margin: 0;
    }

    .contact-grid {
        display: grid;
        grid-template-columns: 1fr 1.3fr;
        gap: 25px;
    }

    .contact-card {
        background: #ffffff;
        border-radius: 14px;
        padding: 30px;
        box-shadow: 0 8px 25px rgba(15, 23, 42, 0.07);
    }

    .contact-info h2,
    .contact-form h2 {
        color: #0f172a;
        font-size: 22px;
        font-weight: 700;
        margin-bottom: 25px;
    }

    .contact-item {
        display: flex;
        align-items: flex-start;
        gap: 15px;
        margin-bottom: 22px;
    }

    .contact-icon {
        width: 42px;
        height: 42px;
        min-width: 42px;

        display: flex;
        align-items: center;
        justify-content: center;

        border-radius: 10px;

        background: #eef2ff;
        color: #2563eb;

        font-size: 18px;
        font-weight: 700;
    }

    .contact-item h5 {
        margin: 0 0 5px;

        color: #0f172a;
        font-size: 15px;
        font-weight: 700;
    }

    .contact-item p {
        margin: 0;

        color: #64748b;
        font-size: 14px;
        line-height: 1.6;
    }

    .contact-form .form-label {
        color: #0f172a;
        font-size: 14px;
        font-weight: 600;
        margin-bottom: 7px;
    }

    .contact-form .form-control {
        width: 100%;

        border: 1px solid #e2e8f0;
        border-radius: 8px;

        padding: 11px 13px;

        font-size: 14px;

        box-shadow: none;
    }

    .contact-form .form-control:focus {
        border-color: #2563eb;

        box-shadow:
            0 0 0 3px rgba(37, 99, 235, 0.10);
    }

    .contact-form textarea {
        min-height: 130px;
        resize: vertical;
    }

    .contact-submit {
        width: 100%;

        border: none;
        border-radius: 8px;

        padding: 12px;

        background: linear-gradient(
            135deg,
            #2563eb,
            #7c3aed
        );

        color: #ffffff;

        font-size: 15px;
        font-weight: 600;

        cursor: pointer;

        transition: 0.2s ease;
    }

    .contact-submit:hover {
        transform: translateY(-1px);

        box-shadow:
            0 7px 18px rgba(37, 99, 235, 0.22);
    }

    .contact-social {
        margin-top: 25px;
    }

    .contact-social h5 {
        color: #0f172a;
        font-size: 15px;
        font-weight: 700;
        margin-bottom: 12px;
    }

    .social-links {
        display: flex;
        gap: 8px;
    }

    .social-links a {
        width: 35px;
        height: 35px;

        display: flex;
        align-items: center;
        justify-content: center;

        border-radius: 8px;

        background: #eef2ff;
        color: #2563eb;

        text-decoration: none;

        font-size: 13px;
        font-weight: 700;
    }

    .social-links a:hover {
        background: #2563eb;
        color: #ffffff;
    }

    @media (max-width: 768px) {

        .contact-page {
            padding: 45px 15px;
        }

        .contact-title h1 {
            font-size: 30px;
        }

        .contact-grid {
            grid-template-columns: 1fr;
        }

        .contact-card {
            padding: 25px;
        }
    }
</style>


<main class="contact-page">

    <div class="contact-container">

        {{-- Page Title --}}
        <div class="contact-title">

            <h1>
                Contact Us
            </h1>

            <p>
                Tell us how we can help you.
            </p>

        </div>


        <div class="contact-grid">

            {{-- Contact Information --}}
            <div class="contact-card contact-info">

                <h2>
                    Get In Touch
                </h2>


                {{-- Email --}}
                <div class="contact-item">

                    <div class="contact-icon">
                        ✉
                    </div>

                    <div>

                        <h5>
                            Email
                        </h5>

                        <p>
                            info@techjourney.com
                        </p>

                    </div>

                </div>


                {{-- Phone --}}
                <div class="contact-item">

                    <div class="contact-icon">
                        ☎
                    </div>

                    <div>

                        <h5>
                            Phone
                        </h5>

                        <p>
                            +20 123 456 7890
                        </p>

                    </div>

                </div>


                {{-- Location --}}
                <div class="contact-item">

                    <div class="contact-icon">
                        📍
                    </div>

                    <div>

                        <h5>
                            Location
                        </h5>

                        <p>
                            Egypt
                        </p>

                    </div>

                </div>


                {{-- Social --}}
                <div class="contact-social">

                    <h5>
                        Follow Us
                    </h5>

                    <div class="social-links">

                        <a href="#" aria-label="Facebook">
                            f
                        </a>

                        <a href="#" aria-label="X">
                            X
                        </a>

                        <a href="#" aria-label="LinkedIn">
                            in
                        </a>

                        <a href="#" aria-label="Instagram">
                            ◎
                        </a>

                    </div>

                </div>

            </div>


            {{-- Contact Form --}}
            <div class="contact-card contact-form">

                <h2>
                    Send Us A Message
                </h2>


                <form method="POST" action="#">

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


                    {{-- Button --}}
                    <button
                        type="submit"
                        class="contact-submit"
                    >
                        Send Message
                    </button>

                </form>

            </div>

        </div>

    </div>

</main>

@endsection
