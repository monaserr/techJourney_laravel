<!DOCTYPE html>

<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Login | Tech Journey</title>
        <link rel="icon" type="image/png" href="{{ asset('images/Screenshot 2026-08-29 174721.png') }}">


    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">


    <link rel="stylesheet" href="{{ asset('css/style.css') }}">


    {{-- Bootstrap --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">


    {{-- Google Font --}}

    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700;800&display=swap"
        rel="stylesheet">

    <style>
        /* =========================
       LOGIN PAGE
    ========================= */

        .login-page {
            background-color: var(--color-bg-light);
            color: var(--color-text-dark);
            padding: 110px 20px 70px;
            min-height: 80vh;
        }


        /* =========================
       LOGIN CARD
    ========================= */

        .login-page .login-card {
            width: 100%;
            max-width: 800px;
            margin: 5px auto 0;

            background-color: var(--color-bg-white);
            border: 1px solid var(--color-border);
            border-radius: 22px;
            overflow: hidden;

            box-shadow: 0 18px 45px var(--shadow-purple-light);
        }


        /* =========================
       LOGIN IMAGE
    ========================= */

        .login-page .login-image {
            min-height: 600px;

            display: flex;
            align-items: center;
            justify-content: center;

            background:
                linear-gradient(135deg,
                    rgba(124, 58, 237, 0.08),
                    rgba(79, 70, 229, 0.08));

            padding: 30px;
            overflow: hidden;
        }


        .login-page .login-image img {
            width: 85%;
            max-width: 380px;
            height: auto;
            object-fit: contain;

            transition: 0.4s ease;
        }


        .login-page .login-image:hover img {
            transform: scale(1.04);
        }


        /* =========================
       LOGIN FORM
    ========================= */

        .login-page .login-form {
            padding: 55px 45px;
        }


        .login-page .login-form h1 {
            font-size: 34px;
            font-weight: 800;
            margin: 0 0 8px;

            background: var(--gradient-title);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }


        .login-page .login-subtitle {
            color: var(--color-text-gray);
            font-size: 16px;
            margin: 0 0 32px;
        }


        /* =========================
       FORM
    ========================= */

        .login-page .form-label {
            color: var(--color-text-dark);
            font-weight: 600;
            margin-bottom: 8px;
        }


      .login-page .form-control {
    height: 50px;
    border: 1px solid var(--color-border);
    border-radius: 10px;
    padding: 10px 15px;
    font-size: 15px;
    color: var(--color-text-dark);
    background-color: var(--color-bg-white);   
    transition: all 0.3s ease;
}


        .login-page .form-control::placeholder {
            color: #94a3b8;
        }


        .login-page .form-control:focus {
            border-color: var(--color-primary-light);

            box-shadow:
                0 0 0 3px rgba(124, 58, 237, 0.12);
        }


        /* =========================
       LOGIN BUTTON
    ========================= */

        .login-page .login-btn {
            width: 100%;
            height: 50px;

            border: none;
            border-radius: 10px;

            background: var(--gradient-primary);

            color: #FFFFFF;

            font-size: 16px;
            font-weight: 600;

            cursor: pointer;

            transition: all 0.3s ease;
        }


        .login-page .login-btn:hover {
            transform: translateY(-2px);

            box-shadow:
                0 10px 25px var(--shadow-purple-medium);
        }


        /* =========================
       SIGN UP
    ========================= */

        .login-page .signup-text {
            text-align: center;

            color: var(--color-text-gray);

            margin: 24px 0 0;
        }


        .login-page .signup-text a {
            color: var(--color-primary);

            text-decoration: none;

            font-weight: 700;

            transition: 0.3s;
        }


        .login-page .signup-text a:hover {
            color: var(--color-primary-alt);
            text-decoration: underline;
        }


        /* =========================
       ERROR MESSAGE
    ========================= */

        .login-page .login-error {
            background-color: #FEF2F2;
            border: 1px solid #FECACA;

            color: #B91C1C;

            padding: 12px 15px;
            border-radius: 10px;

            margin-bottom: 20px;

            font-size: 14px;
        }


        /* =========================
       SUCCESS MESSAGE
    ========================= */

        .login-page .login-success {
            background-color: #F0FDF4;
            border: 1px solid #BBF7D0;

            color: #15803D;

            padding: 12px 15px;
            border-radius: 10px;

            margin-bottom: 20px;

            font-size: 14px;
        }


        /* =========================
       RESPONSIVE
    ========================= */

        @media (max-width: 768px) {

            .login-page {
                padding: 100px 15px 50px;
            }


            .login-page .login-card {
                margin-top: 0;
                border-radius: 18px;
            }


            .login-page .login-image {
                min-height: 280px;
                padding: 20px;
            }


            .login-page .login-image img {
                width: 65%;
                max-width: 260px;
            }


            .login-page .login-form {
                padding: 35px 25px;
            }


            .login-page .login-form h1 {
                font-size: 30px;
            }

        }
    </style>

</head>


<body>


    @include('includes.navbar')


    <main class="login-page">

        <div class="login-card">

            <div class="row g-0">


                {{-- Login Image --}}

                <div class="col-md-6">

                    <div class="login-image">

                        <img src="{{ asset('images/login-boy.png') }}" alt="Tech Journey Login">

                    </div>

                </div>


                {{-- Login Form --}}

                <div class="col-md-6">

                    <div class="login-form">

                        <h1>
                            Welcome Back
                        </h1>


                        <p class="login-subtitle">
                            Login to your account
                        </p>


                        {{-- Errors --}}

                        @if ($errors->any())

                            <div class="login-error">

                                {{ $errors->first() }}

                            </div>

                        @endif


                        {{-- Success --}}

                        @if (session('success'))

                            <div class="login-success">

                                {{ session('success') }}

                            </div>

                        @endif


                        <form method="POST" action="{{ route('login.submit') }}">

                            @csrf


                            {{-- Email --}}

                            <div class="mb-3">

                                <label for="email" class="form-label">
                                    Email
                                </label>

                                <input type="email" id="email" name="email" class="form-control"
                                    placeholder="Enter your email" value="{{ old('email') }}" autocomplete="email"
                                    required>

                            </div>


                            {{-- Password --}}

                            <div class="mb-4">

                                <label for="password" class="form-label">
                                    Password
                                </label>


                                <input type="password" id="password" name="password" class="form-control"
                                    placeholder="Enter your password" autocomplete="current-password" required>

                            </div>


                            {{-- Login Button --}}

                            <button type="submit" class="login-btn">
                                Login
                            </button>


                            {{-- Sign Up --}}

                            <p class="signup-text">

                                Don't have an account?

                                <a href="{{ route('register') }}">
                                    Sign Up
                                </a>

                            </p>

                        </form>

                    </div>

                </div>

            </div>

        </div>

    </main>


    @include('includes.footer')

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js">
    </script>


    <script src="{{ asset('js/script.js') }}"></script>

    <script src="{{ asset('js/tracks.js') }}"></script>

    <script src="{{ asset('js/scriptResourse.js') }}"></script>


</body>

</html>