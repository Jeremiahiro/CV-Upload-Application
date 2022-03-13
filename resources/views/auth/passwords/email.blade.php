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
            <form method="POST" action="{{ route('password.email') }}">
                @csrf
                <div>
                    <small class="text-danger">
                        @foreach($errors->all() as $error)
                            {{ $error  }}
                        @endforeach
                    </small>
                </div>
                <div class="mb-3">
                    <input id="email" type="email" placeholder="Mail"
                        class="form-control input-round @error('email') is-invalid @enderror" name="email"
                        value="{{ old('email') }}" required autocomplete="email" autofocus>

                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <small>{{ $message }}</small>
                        </span>
                    @enderror
                </div>
                <div class="d-grid gap-2">
                    <button type="submit" class="btn btn-warning btn-custom">Send Password Reset Link</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
