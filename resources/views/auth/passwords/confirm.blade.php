@extends('layouts.app')
@section('title')
    Confirm Password
@endsection
@section('main')
<div class="back">
    <div class="div-center">
        <div class="content">
            <div class="text-center">
                <h5 class="head-text">{{ __('Confirm Password') }}</h5>
            </div>
            <div>
                <div class="boxes">
                </div>
            </div>
            <form method="POST" action="{{ route('password.confirm') }}">
                @csrf
                <div>
                    <small class="text-danger">
                        @foreach($errors->all() as $error)
                            {{ $error  }}
                        @endforeach
                    </small>
                </div>
                <div class="mb-3">
                    <input id="password" type="password" placeholder="Password"
                        class="form-control input-round @error('password') is-invalid @enderror" name="password"
                        required autocomplete="current-password">

                    @error('password')
                        <span class="invalid-feedback" role="alert">
                            <small>{{ $message }}</small>
                        </span>
                    @enderror
                </div>
                <div class="d-grid gap-2">
                    <button type="submit"
                        class="btn btn-warning btn-custom">{{ __('Confirm Password') }}</button>
                </div>
                <div class="text-center mt-2">
                    @if(Route::has('password.request'))
                        <a class="btn btn-link" href="{{ route('password.request') }}">
                            {{ __('Forgot Your Password?') }}
                        </a>
                    @endif
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
