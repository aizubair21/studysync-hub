<div>
    {{-- If your happiness depends on money, you will never be happy with yourself. --}}
    <div class="hold-transition login-page">
        <div class="register-box">
            <div class="card card-outline card-primary">
              <div class="card-header text-center">
                <a href="" class="h1">StudySync-HUB</a>
              </div>
              <div class="card-body">
                <p class="login-box-msg">Register a new membership</p>
        
                <form wire:submit = "register">
                  {{-- @csrf --}}
                  <div class="input-group">
                    <input type="text" wire:model="name" autofocus autocomplete="additional-name" class="form-control @error("name") is-invalid  @enderror" placeholder="Full name">
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
                    <input type="email" wire:model="email" class="form-control @error("email") is-invalid  @enderror" placeholder="Email">
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
                    <input type="password" wire:model="password" class="form-control @error("password") is-invalid  @enderror" placeholder="Password">
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
                    <input type="password" wire:model="confirm-password" class="form-control" placeholder="Retype password">
                    <div class="input-group-append">
                      <div class="input-group-text">
                        <span class="fas fa-lock"></span>
                      </div>
                    </div>
                  </div>
                  @error('password-confirm')
                    <strong class="text text-danger">{{$message }}</strong>
                  @enderror

                  <div class="row mt-3">
                    <div class="col-8">
                      <div class="icheck-primary">
                        <input wire:click="makeAgree" type="checkbox" id="agreeTerms" wire:model="terms" value="agree">
                        <label for="agreeTerms">
                         I agree to the <a href="#">terms</a>
                        </label>
                      </div>
                    </div>
                    <!-- /.col -->
                    <div class="col-4">
                      <button type="submit" @if(!$is_agree) disabled  @endif  class="btn btn-primary btn-block">Register</button>
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
</div>
