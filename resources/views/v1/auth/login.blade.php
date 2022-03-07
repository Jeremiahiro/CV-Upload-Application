@extends('v1.layouts.app')



@section('main')
<div class="back">
    <div class="div-center">
        <div class="content">

            <div class="text-center">
                <h5 class="head-text">Sign In to <span class="fs-">Logo<span class="text-yellow">Name</span></span></h5>
            </div>

            <div>
                <div class="boxes">
                </div>
            </div>

            <form method="POST" class="mt-4" action="{{ route('login') }}">
              @csrf
                <div class="mb-3">
                  <input id="email" type="email" class="form-control input-round @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus placeholder="Mail">

                  @error('email')
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                      </span>
                  @enderror
                </div>
                <div class="mb-3">
                  <input id="password" type="password" class="form-control input-round @error('password') is-invalid @enderror" name="password" placeholder="Password" required autocomplete="current-password">

                  @error('password')
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                      </span>
                  @enderror
                </div>
                <div class="d-grid gap-2">
                    <button type="submit" class="btn btn-primary btn-custom">{{ __('Log In') }}</button>
                </div>
            </form>

            @if (Route::has('password.request'))
            <div class="text-center mt-4">
                <small>{{ __('Forgot Password?') }}
                  <a class="text-yellow" href="{{ route('password.request') }}">Check</a>
                </small>
            </div>
            @endif

        </div>
    </div>
</div>
@endsection
