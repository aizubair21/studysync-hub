<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title')</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <!-- Styles -->
    @stack('style')
    @livewireStyles
</head>

<body>
    <div class="hold-transition login-page">
        <div class="login-box">
            <div class="card card-outline card-primary">
                <div class="card-header text-center">
                    <a wire:navigate href="/" class="h4">StudySync-HUBb</a>
                </div>
                <div class="card-body">
                    <form wire:navigate action="{{ route('login') }}" method="POST">
                        @csrf
                        <div class="input-group">
                            <input type="email" name="email"
                                class="form-control @error('email') is-invalid @enderror" placeholder="Email">
                            <div class="input-group-append">
                                <div class="input-group-text">
                                    <span class="fas fa-envelope"></span>
                                </div>
                            </div>
                        </div>
                        @error('email')
                            <strong class="text text-danger mb-2"> {{ $message }} </strong>
                        @enderror

                        {{-- <div class="input-group mb-3"> --}}
                        <div class="input-group mt-3">
                            <input type="password" name="password"
                                class="form-control @error('password') is-invalid @enderror" placeholder="Password">
                            <div class="input-group-append">
                                <div class="input-group-text">
                                    <span class="fas fa-lock"></span>
                                </div>
                            </div>
                        </div>
                        @error('email')
                            <strong class="text text-danger mb-2"> {{ $message }} </strong>
                        @enderror
                        <div class="row mt-2">
                            <div class="col-8">
                                <div class="icheck-primary">
                                    <input type="checkbox" name="remember-me" id="remember">
                                    <label for="remember">
                                        Remember Me
                                    </label>
                                </div>
                            </div>
                            <!-- /.col -->
                            <div class="col-4">
                                <button type="submit" class="btn btn-primary btn-block">Sign In</button>
                            </div>
                            <!-- /.col -->
                        </div>
                    </form>

                    {{-- <div class="social-auth-links text-center mt-2 mb-3">
                      <a href="#" class="btn btn-block btn-primary">
                        <i class="fab fa-facebook mr-2"></i> Sign in using Facebook
                      </a>
                      <a href="#" class="btn btn-block btn-danger">
                        <i class="fab fa-google-plus mr-2"></i> Sign in using Google+
                      </a>
                    </div> --}}
                    <!-- /.social-auth-links -->

                    <p class="mb-1">
                        <a wire:navigate href="#">I forgot my password</a>
                    </p>
                    <p class="mb-0">
                        <a wire:navigate href="{{ route('register') }}" class="text-center">Register a new
                            membership</a>
                    </p>
                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->
        </div>
        <!-- /.login-box -->

    </div>
</body>

</html>
