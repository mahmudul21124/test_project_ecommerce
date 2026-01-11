<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <title>HRMS - Register</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" href="{{ asset('public/images/1.jpg') }}">

    <!-- Bootstrap CSS -->
    <link href="{{ asset('public/back/assets/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('public/back/assets/css/icons.css') }}" rel="stylesheet">
    <link href="{{ asset('public/back/assets/css/style.css') }}" rel="stylesheet">
</head>

<body>
    <div class="accountbg"></div>

    <div class="wrapper-page">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-5">
                    <div class="card card-pages mt-4">
                        <div class="card-body">
                            <div class="text-center mt-0 mb-3">
                                <a href="{{ route('home') }}" class="logo logo-admin">
                                    <img src="{{ asset('public/images/2.png') }}" class="mt-3"
                                        alt="Logo" height="26">
                                </a>
                                <p class="text-muted w-75 mx-auto mb-4 mt-4">
                                    Create your customer account, it takes less than a minute.
                                </p>
                            </div>

                            <!-- Laravel Register Form -->
                            <form class="form-horizontal mt-4" method="POST" action="{{ route('register') }}">
                                @csrf

                                <div class="form-group mb-3">
                                    <label for="name">Name</label>
                                    <input class="form-control" type="text" id="name" name="name"
                                        value="{{ old('name') }}" required placeholder="Full Name">
                                    @error('name')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>

                                <div class="form-group mb-3">
                                    <label for="email">Email</label>
                                    <input class="form-control" type="email" id="email" name="email"
                                        value="{{ old('email') }}" required placeholder="Email">
                                    @error('email')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>

                                <div class="form-group mb-3">
                                    <label for="password">Password</label>
                                    <input class="form-control" type="password" id="password" name="password" required
                                        placeholder="Password">
                                    @error('password')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>

                                <div class="form-group mb-3">
                                    <label for="password_confirmation">Confirm Password</label>
                                    <input class="form-control" type="password" id="password_confirmation"
                                        name="password_confirmation" required placeholder="Confirm Password">
                                </div>

                                {{-- Removed role dropdown, always Customer --}}

                                <div class="form-group mb-3">
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="terms" required>
                                        <label class="custom-control-label font-weight-normal" for="terms">
                                            I accept <a href="#" class="text-primary">Terms and Conditions</a>
                                        </label>
                                    </div>
                                </div>

                                <div class="form-group text-center mt-3">
                                    <button class="btn btn-success btn-block waves-effect waves-light" type="submit">
                                        Register
                                    </button>
                                </div>

                                <div class="form-group text-center mt-3 mb-2">
                                    <a href="{{ route('login') }}" class="text-muted">Already have an account?</a>
                                </div>
                            </form>
                            <!-- End Form -->

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Scripts -->
    <script src="{{ asset('public/back/assets/js/jquery.min.js') }}"></script>
    <script src="{{ asset('public/back/assets/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('public/back/assets/js/app.js') }}"></script>
</body>

</html>
