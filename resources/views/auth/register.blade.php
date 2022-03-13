@extends('layouts.app')
@section('title')
    Register
@endsection
@section('main')
<div class="back">
    <div class="div-center register-page">
        <form method="POST" class="content" action="{{ route('register') }}">
            @csrf
            <div class="text-center">
                <h5 class="head-text">Sign Up to <span class="fs-">Logo<span class="text-yellow">Name</span></span></h5>
                <div>
                    <small class="text-danger">
                        @foreach($errors->all() as $error)
                            {{ $error  }}
                        @endforeach
                    </small>
                </div>
                    <div class="container mt-4">
                        <div class="row mb-4">
                            <div class="col firstcol">
                                <span>
                                    <input
                                        class="form-control"
                                        type="radio"
                                        name="user_type"
                                        id="jobseeker"
                                        value="{{ \App\Enums\UserType::Jobseeker }}"
                                        {{ old("user_type") == \App\Enums\UserType::Jobseeker ? "checked" : "" }}
                                        required
                                    >
                                    <label for="jobseeker">Jobseeker</label>
                                </span>
                            </div>
                            <div class="col">
                                <input
                                    class="form-control"
                                    type="radio"
                                    name="user_type"
                                    id="recruiter"
                                    value="{{ \App\Enums\UserType::Recruiter }}"
                                    {{ old("user_type") == \App\Enums\UserType::Recruiter ? "checked" : "" }}
                                >
                                <label for="recruiter">Recruiter</label>
                            </div>
                        </div>
                        @error('user_type')
                            <span class="invalid-feedback" role="alert">
                                <small>{{ $message }}</small>
                            </span>
                        @enderror
                    </div>

            </div>
            <div>
                <div class="boxes">
                </div>
            </div>
            <div>
                <div class="mb-3">
                    <input id="email" type="email" class="form-control input-round @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" placeholder="Mail">

                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <small>{{ $message }}</small>
                        </span>
                    @enderror
                </div>
                <div class="mb-3">
                    <input id="password" type="password" placeholder="Password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                    @error('password')
                        <span class="invalid-feedback" role="alert">
                        <small>{{ $message }}</small>
                        </span>
                    @enderror
                </div>
                <div class="mb-3">
                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password" placeholder="Confirm Password">
                </div>
            </div>
            <div class="d-grid gap-2">
                <button type="submit" class="btn btn-warning btn-custom">Sign Up</button>
            </div>
        </form>
        <div class="text-center mt-2">
            <small>Already a member? <a class="text-yellow" href="/login">Log in</a></small>
        </div>
    </div>
</div>
@endsection
