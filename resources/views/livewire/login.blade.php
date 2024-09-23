<div>
    {{-- Knowing others is intelligence; knowing yourself is true wisdom. --}}

    {{-- <canvas id="canvas" class="relative" style="width:100%; height:100%">
    </canvas> --}}
    <div class="hold-transition login-page"
        style="position:fixed; top:50%; left:50%; height:auto; background:transparent; max-width:400px;width:100%; transform:translate(-50%, -50%)">
        <div class="login-box">
            <div class="card card-outline shadow card-primary">
                <div class="card-header text-center">

                    <a wire:navigate href="/" class="h4">
                        <img src="{{ asset('media/studysync-hub.jpg') }}" width="100px" height="100px"
                            style="margin: 0 auto" alt="">
                    </a>
                    @if ($authMessage)
                        <div class="text-center text-light fw-bold bg-success p-2  mt-3 rounded">
                            <i class="fas fa-check-circle me-2"></i> {{ $authMessage }}
                        </div>
                    @else
                    @endif
                </div>
                <div class="card-body">
                    <form wire:submit.prevent="doLogin">
                        @csrf
                        <div>
                            <label for="email" class="form-label">Email</label>
                            <div class="input-group">
                                <input type="email" id="email" wire:model.live="email"
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
                        </div>

                        {{-- <div class="input-group mb-3"> --}}
                        <div class="my-3">
                            <label for="password" class="form-label">Password</label>
                            <div class="input-group">
                                <input type="password" id="password" wire:model.live="password"
                                    class="form-control @error('password') is-invalid @enderror" placeholder="Password">
                                <div class="input-group-append">
                                    <div class="input-group-text">
                                        <span class="fas fa-lock"></span>
                                    </div>
                                </div>
                            </div>
                            @error('password')
                                <strong class="text text-danger mb-2"> {{ $message }} </strong>
                            @enderror

                        </div>
                        <div class="row my-3">
                            <div class="col-8">
                                <div class="icheck-primary">
                                    <input type="checkbox" wire:model="remember" id="remember">
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
                    <hr>
                    <div class="social-auth-links text-center mt-2 mb-3">
                        <a href="#" class="btn btn-block btn-primary">
                            <i class="fab fa-facebook mr-2"></i> Sign in using Facebook
                        </a>
                        <a href="#" class="btn btn-block btn-danger">
                            <i class="fab fa-google-plus mr-2"></i> Sign in using Google+
                        </a>
                    </div>
                    <!-- /.social-auth-links -->
                    <hr>
                    <p class="mb-1 text-center">
                        <a wire:navigate href="#">I forgot my password</a>
                    </p>
                    <p class="mb-0 text-center">
                        <a wire:navigate href="{{ route('register') }}" class="text-center">Register as a new
                            membership</a>
                    </p>
                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->
        </div>
        <!-- /.login-box -->

    </div>
    
</div>
