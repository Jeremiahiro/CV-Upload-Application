@extends('v1.layouts.app')


@section('main')
<div class="back">
    <div class="div-center">
        <form method="POST" class="content" action="{{ route('register') }}">
            @csrf
            <div class="text-center">
                <h5 class="head-text">Sign Up to <span class="fs-">Logo<span class="text-yellow">Name</span></span></h3>
                    <div class="container mt-4">
                        <div class="row mb-4">
                            <div class="col firstcol">
                                <span>
                                    <input type="radio" name="user_type" id="jobseeker" value="jobseeker">
                                    <label for="jobseeker">Jobseeker</label>
                                </span>
                            </div>
                            <div class="col">
                                <input type="radio" name="user_type" id="recruiter" value="recruiter">
                                <label for="recruiter">Recruitment</label>
                            </div>
                        </div>
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
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="mb-3">
                    <input id="password" type="password" placeholder="Password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                    @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="mb-3">
                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password" placeholder="Confirm Password">
                </div>
            </div>
            <div class="d-grid gap-2">
                <button type="submit" class="btn btn-primary btn-custom">Sign Up</button>
            </div>
        </form>
        <div class="text-center mt-2">
            <small>Already a member? <a class="text-yellow" href="/login">Log in</a></small>
        </div>
    </div>
</div>
@endsection
