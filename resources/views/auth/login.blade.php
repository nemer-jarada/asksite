<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Login</title>

    <!-- Custom fonts for this template-->
    {{-- <link href="{{ asset('adminassets/vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet" type="text/css"> --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" />
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="{{ asset('adminassets/css/sb-admin-2.min.css') }}" rel="stylesheet">
    <style>
        .eye-icon {
            position: relative;
        }

        .eye-open,
        .eye-close {
            position: absolute;
            top: 18px;
            right: 10px;
            cursor: pointer;
        }

        .eye-close {
            display: none;
        }
    </style>
</head>

<body class="bg-gradient-primary">

    <div class="container">

        <!-- Outer Row -->
        <div class="row justify-content-center">

            <div class="col-xl-10 col-lg-12 col-md-9">

                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                            <div class="col-lg-6 d-none d-lg-block"><img width="444px" height="578.400px"
                                    src="{{ asset('assetsweb/img/bg-login.jpg') }}" alt=""></div>
                            <div class="col-lg-6">
                                <div class="p-5 m-5">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4">Welcome Back!</h1>
                                    </div>
                                    <form class="user" method="POST" action="{{ route('login') }}">
                                        @csrf
                                        <div class="form-group">
                                            <input name="email" type="email"
                                                class="form-control form-control-user @error('email') is-invalid @enderror"
                                                id="email" aria-describedby="emailHelp"
                                                placeholder="Enter Email Address..." value="{{ old('email') }}"
                                                autocomplete="email" autofocus>
                                            @error('email')
                                                <small class="invalid-feedback" role="alert">
                                                    {{ $message }}
                                                </small>
                                            @enderror
                                        </div>
                                        <div class="form-group eye-icon">
                                            <input name="password" type="password"
                                                class="form-control form-control-user @error('password') is-invalid @enderror"
                                                id="password" placeholder="Password" autocomplete="current-password">
                                            <i class="fa-regular fa-eye eye-open"></i>
                                            <i class="fa-regular fa-eye-slash eye-close"></i>
                                            @error('password')
                                                <small class="invalid-feedback" role="alert">
                                                    {{ $message }}
                                                </small>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <div class="custom-control custom-checkbox small">
                                                <input type="checkbox" class="custom-control-input" id="customCheck">
                                                <label class="custom-control-label" for="customCheck">Remember
                                                    Me</label>
                                            </div>
                                        </div>
                                        <input type="submit" value="Login" class="btn btn-primary btn-user btn-block">
                                    </form>
                                    <hr>
                                    <div class="text-center">

                                        @if (Route::has('password.request'))
                                            <a class="small" href="{{ route('password.request') }}">Forgot
                                                Password?</a>
                                        @endif

                                    </div>
                                    <div class="text-center">
                                        <a class="small" href="{{ route('register') }}">Create an Account!</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>

    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="{{ asset('adminassets/vendor/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('adminassets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

    <!-- Core plugin JavaScript-->
    <script src="{{ asset('adminassets/vendor/jquery-easing/jquery.easing.min.js') }}"></script>

    <!-- Custom scripts for all pages-->
    <script src="{{ asset('adminassets/js/sb-admin-2.min.js') }}"></script>
    <script>
        let open = document.querySelector('.eye-open')
        let close = document.querySelector('.eye-close')
        let input = document.querySelector('#password')
        open.onclick = function() {
            input.type = 'text';
            open.style.display = 'none'
            close.style.display = 'block'
        }
        close.onclick = function() {
            input.type = 'password';
            open.style.display = 'block'
            close.style.display = 'none'
        }
    </script>
</body>

</html>
