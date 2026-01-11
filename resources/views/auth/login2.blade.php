<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <title>Login</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" href="{{ asset('public/images/1.jpg') }}">

    <!-- Bootstrap CSS -->
    <link href="{{ asset('public/back/assets/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('public/back/assets/css/icons.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('public/back/assets/css/style.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('public/back/plugins/bootstrap-datepicker/css/bootstrap-datepicker.min.css') }}" rel="stylesheet">
    <link href="{{ asset('public/back/assets/css/metismenu.min.css') }}" rel="stylesheet" type="text/css">
</head>

<body>
    <div class="accountbg"></div>

    <!-- Home button -->
    <div class="home-btn d-none d-sm-block">
        {{-- <a href="{{ route('dashboard') }}" class="text-white"><i class="mdi mdi-home h1"></i></a> --}}
    </div>

    <div class="d-flex align-items-center justify-content-center min-vh-100 bg-gradient-primary">
        <div class="col-md-6 col-lg-4">
            <div class="card shadow-lg border-0 rounded-lg">
                <div class="card-body p-4">
                    <!-- Logo + Intro -->
                    <div class="text-center mb-4">
                        <a href="{{ route('home') }}" class="logo logo-admin d-inline-block mb-2">
                            <img src="{{ asset('public/images/2.png') }}" alt="Logo" height="40">
                        </a>
                        <h5 class="fw-bold">Welcome Back</h5>
                        <p class="text-muted small">Enter your credentials to access the admin panel</p>
                    </div>

                    <!-- Laravel Login Form -->
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <!-- Email -->
                        <div class="mb-3">
                            <label for="email" class="form-label fw-semibold">Email</label>
                            <input type="email" id="email" name="email" value="{{ old('email') }}"
                                class="form-control form-control-lg" placeholder="Enter email" required autofocus>
                            @error('email')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        <!-- Password -->
                        <div class="mb-3">
                            <label for="password" class="form-label fw-semibold">Password</label>
                            <div class="input-group input-group-lg">
                                <input type="password" id="password" name="password" class="form-control"
                                    placeholder="Enter password" required>
                                <button class="btn btn-outline-primary" type="button" id="togglePassword">
                                    <i class="fa fa-eye"></i>
                                </button>
                            </div>
                            @error('password')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>


                        <!-- Remember Me -->
                        <div class="form-check mb-3">
                            <input type="checkbox" class="form-check-input" id="remember" name="remember">
                            <label class="form-check-label" for="remember">Remember me</label>
                        </div>

                        <!-- Submit -->
                        <div class="d-grid mb-3">
                            <button type="submit" class="btn btn-primary btn-lg">
                                <i class="mdi mdi-login me-1"></i> Log In
                            </button>
                        </div>

                        <!-- Links -->
                        <div class="d-flex justify-content-between">
                            <a href="{{ route('password.request') }}" class="text-decoration-none small">
                                <i class="fa fa-lock me-1"></i> Forgot password?
                            </a>
                            {{-- <a href="{{ route('register') }}" class="text-decoration-none small">Create an account</a> --}}
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Scripts -->
    <script src="{{ asset('public/back/assets/js/jquery.min.js') }}"></script>
    <script src="{{ asset('public/back/assets/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('public/back/assets/js/metismenu.min.js') }}"></script>
    <script src="{{ asset('public/back/assets/js/jquery.slimscroll.js') }}"></script>
    <script src="{{ asset('public/back/assets/js/waves.min.js') }}"></script>
    <script src="{{ asset('public/back/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js') }}"></script>
    <script src="{{ asset('public/back/assets/js/app.js') }}"></script>

    <script>
        const togglePassword = document.querySelector('#togglePassword');
        const password = document.querySelector('#password');

        togglePassword.addEventListener('click', function() {
            // Toggle input type
            const type = password.getAttribute('type') === 'password' ? 'text' : 'password';
            password.setAttribute('type', type);

            // Toggle icon
            this.querySelector('i').classList.toggle('fa-eye');
            this.querySelector('i').classList.toggle('fa-eye-slash');
        });
    </script>


</body>

</html>
