@extends('layouts.app')
@section('title')
    Reset Password
@endsection
@section('main')
<div class="back">
    <div class="div-center">
        <div class="content">
            <div class="text-center">
                <h5 class="head-text">{{ __('Reset Password') }}</h5>
            </div>
            <div>
                <div class="boxes">
                </div>
            </div>
            <form method="POST" action="{{ route('password.update') }}">
                @csrf
                <div class="mb-3">
                    <input id="email" type="email" placeholder="Mail"
                        class="form-control input-round @error('email') is-invalid @enderror" name="email"
                        value="{{ $email ?? old('email') }}" required autocomplete="email"
                        autofocus>

                    @error('email')
                        <span class="invalid-feedback" role="alert">
                        <small>{{ $message }}</small>
                        </span>
                    @enderror
                </div>
                <div class="mb-3">
                    <input id="password" type="password" placeholder="Password"
                        class="form-control input-round @error('password') is-invalid @enderror" name="password"
                        required autocomplete="new-password">

                    @error('password')
                        <span class="invalid-feedback" role="alert">
                        <small>{{ $message }}</small>
                        </span>
                    @enderror
                </div>
                <div class="mb-3">
                    <input id="password-confirm" type="password" placeholder="Confirm Password"
                        class="form-control input-round" name="password_confirmation" required
                        autocomplete="new-password">
                </div>

                <div class="d-grid gap-2">
                    <button type="submit"
                        class="btn btn-warning btn-custom">{{ __('Reset Password') }}</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
