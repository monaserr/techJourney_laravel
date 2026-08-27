<!DOCTYPE html>

<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Login - Tech Journey</title>


    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    
    
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">


    {{-- Bootstrap --}}
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">


    {{-- Google Font --}}

    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700;800&display=swap" rel="stylesheet">

    <style>
        .login-page {
            background-color: #F8FAFC;
            color: #0F172A;
            padding: 40px 20px 50px;
            min-height: 80vh;
        }


        .login-page .login-card {
            width: 100%;
            max-width: 850px;
            margin: 60px auto 0;
            background-color: #FFFFFF;
            border-radius: 18px;
            overflow: hidden;
            box-shadow: 0 8px 25px rgba(15, 23, 42, 0.08);
        }


        .login-page .login-image {
            min-height: 430px;
            display: flex;
            align-items: center;
            justify-content: center;
            background-color: #F8FAFC;
            padding: 20px;
            overflow: hidden;
        }


        .login-page .login-image img {
            width: 85%;
            max-width: 350px;
            height: auto;
            object-fit: contain;
        }


        .login-page .login-form {
            padding: 45px;
        }


        .login-page .login-form h1 {
            color: #1E3A8A;
            font-size: 30px;
            font-weight: 700;
            margin: 0 0 8px;
        }


        .login-page .login-subtitle {
            color: #64748B;
            font-size: 16px;
            margin: 0 0 30px;
        }


        .login-page .form-label {
            color: #0F172A;
            font-weight: 600;
            margin-bottom: 7px;
        }


        .login-page .form-control {
            height: 48px;
            border: 1px solid #E2E8F0;
            border-radius: 8px;
            padding: 10px 14px;
            font-size: 15px;
        }


        .login-page .form-control:focus {
            border-color: #2563EB;
            box-shadow: 0 0 0 3px rgba(37, 99, 235, 0.10);
        }


        .login-page .login-btn {
            width: 100%;
            height: 48px;
            border: none;
            border-radius: 8px;
            background-color: #2563EB;
            color: #FFFFFF;
            font-size: 16px;
            font-weight: 600;
            cursor: pointer;
            transition: 0.3s;
        }


        .login-page .login-btn:hover {
            background-color: #1E3A8A;
        }


        .login-page .signup-text {
            text-align: center;
            color: #64748B;
            margin: 22px 0 0;
        }


        .login-page .signup-text a {
            color: #2563EB;
            text-decoration: none;
            font-weight: 600;
        }


        .login-page .signup-text a:hover {
            color: #1E3A8A;
        }


        .login-page .login-error {
            background-color: #FEF2F2;
            border: 1px solid #FECACA;
            color: #B91C1C;
            padding: 12px 15px;
            border-radius: 8px;
            margin-bottom: 20px;
            font-size: 14px;
        }


        .login-page .login-success {
            background-color: #F0FDF4;
            border: 1px solid #BBF7D0;
            color: #15803D;
            padding: 12px 15px;
            border-radius: 8px;
            margin-bottom: 20px;
            font-size: 14px;
        }


        @media (max-width: 768px) {

            .login-page {
                padding: 25px 15px 40px;
            }


            .login-page .login-card {
                margin-top: 30px;
            }


            .login-page .login-image {
                min-height: 250px;
                padding: 15px;
            }


            .login-page .login-image img {
                width: 70%;
                max-width: 260px;
            }


            .login-page .login-form {
                padding: 30px 25px;
            }


            .login-page .login-form h1 {
                font-size: 27px;
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

<input type="email" id="email" name="email" class="form-control" placeholder="Enter your email"
    value="{{ old('email') }}" autocomplete="email" required>

                            </div>


                            {{-- Password --}}

                            <div class="mb-4">

                                <label for="password" class="form-label">
                                    Password
                                </label>


                                <input type="password" id="password" name="password" class="form-control" placeholder="Enter your password"
                                    autocomplete="current-password" required>

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