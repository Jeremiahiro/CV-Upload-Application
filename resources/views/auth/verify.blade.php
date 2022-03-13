@extends('layouts.app')
@section('title')
    Verify
@endsection
@section('main')
<div class="back">
    <div class="div-center">
        <div class="content">

            <div class="text-center">
                <h5 class="head-text">{{ __('Verify Your Email Address') }}</h5>
            </div>

            <div>
                <div class="boxes">
                </div>
            </div>

            @if(session('resent'))
                <div class="alert alert-success" role="alert">
                    {{ __('A fresh verification link has been sent to your email address.') }}
                </div>
            @endif

            <div class="mt-4">
                {{ __('Before proceeding, please check your email for a verification link.') }}
                {{ __('If you did not receive the email') }},
                <form class="d-inline" method="POST" action="{{ route('verification.resend') }}">
                    @csrf
                    <button type="submit"
                        class="btn btn-link p-0 m-0 align-baseline">{{ __('click here to request another') }}</button>.
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
