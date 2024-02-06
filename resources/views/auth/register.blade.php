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
        <div class="register-box">
            <div class="card card-outline card-primary">
              <div class="card-header text-center">
                <a href="" class="h1">StudySync-HUB</a>
              </div>
              <div class="card-body">
                <p class="login-box-msg">Register a new membership</p>
        
                <form action="{{route('register')}}" method="POST">
                  @csrf
                  <div class="input-group">
                    <input type="text" name="name" autofocus autocomplete="additional-name" class="form-control @error("name") is-invalid  @enderror" placeholder="Full name" value="{{old("name")}}">
                    <div class="input-group-append">
                      <div class="input-group-text">
                        <span class="fas fa-user"></span>
                      </div>
                    </div>
                  </div>
                  @error('name')
                    <strong class="text text-danger">{{$message }}</strong>
                  @enderror

                  <div class="input-group mt-3">
                    <input type="email" name="email" class="form-control @error("email") is-invalid  @enderror" placeholder="Email" value="{{old("email")}}">
                    <div class="input-group-append">
                      <div class="input-group-text">
                        <span class="fas fa-envelope"></span>
                      </div>
                    </div>
                  </div>
                  @error('email')
                    <strong class="text text-danger">{{$message }}</strong>
                  @enderror

                  <div class="input-group mt-3">
                    <input type="password" name="password" class="form-control @error("password") is-invalid  @enderror" placeholder="Password">
                    <div class="input-group-append">
                      <div class="input-group-text">
                        <span class="fas fa-lock"></span>
                      </div>
                    </div>
                  </div>
                  @error('password')
                    <strong class="text text-danger">{{$message }}</strong>
                  @enderror

                  <div class="input-group mt-3">
                    <input type="password" name="password_confirmation" class="form-control" placeholder="Retype password">
                    <div class="input-group-append">
                      <div class="input-group-text">
                        <span class="fas fa-lock"></span>
                      </div>
                    </div>
                  </div>
                  @error('password_confirmation')
                    <strong class="text text-danger">{{$message }}</strong>
                  @enderror

                  <div class="row mt-3">
                    <div class="col-8">
                      <div class="icheck-primary">
                        <input wire:click="makeAgree" type="checkbox" id="agreeTerms" name="terms" value="agree">
                        <label for="agreeTerms">
                         I agree to the <a href="#">terms</a>
                        </label>
                      </div>
                    </div>
                    <!-- /.col -->
                    <div class="col-4">
                      <button type="submit"  class="btn btn-primary btn-block">Register</button>
                    </div>
                    <!-- /.col -->
                  </div>

                </form>
          
                {{-- <div class="social-auth-links text-center">
                  <a href="#" class="btn btn-block btn-primary">
                    <i class="fab fa-facebook mr-2"></i>
                    Sign up using Facebook
                  </a>
                  <a href="#" class="btn btn-block btn-danger">
                    <i class="fab fa-google-plus mr-2"></i>
                    Sign up using Google+
                  </a>
                </div> --}}
          
                <a wire:navigate href="{{route('login')}}" class="text-center">I already have a membership</a>
              </div>
              <!-- /.form-box -->
            </div><!-- /.card -->
          </div>
        </div>
    </div>
    </body>
</html>