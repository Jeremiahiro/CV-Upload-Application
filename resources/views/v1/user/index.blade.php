@extends('v1.user.layouts.app')
@section('title')
    Settings
@endsection
@section('main')

<div class="d-flex flex-column" id="content-wrapper">
    <div id="content" style="background: rgb(255,255,255);">
        <nav class="navbar navbar-light navbar-expand bg-white shadow mb-4 topbar static-top"
            style="border-bottom: 1px solid var(--bs-yellow);">
            <div class="container-fluid"><button class="btn btn-link d-md-none rounded-circle me-3"
                    id="sidebarToggleTop" type="button"><i class="fas fa-bars"></i></button>
                <h3 class="fw-bold" style="color: black;font-weight: bold;width: auto;">Settings</h3>
                <form class="d-none d-sm-inline-block me-auto ms-md-3 my-2 my-md-0 mw-100 navbar-search">
                    <div class="input-group"></div>
                </form>
            </div>
        </nav>
        <div class="container-fluid px-5 w-100">
            @if (!$user->name)
                <div class="alert alert-warning alert-dismissible fade show alert-fixed" role="alert">
                    <div class="mr-5 pr-5 f-14">
                        {{ __('Update your profile') }}
                    </div>
                </div>
            @endif
            <div class="row mb-3">
                <div class="col-lg-4">
                    <div style="text-align: left;">
                        <div class="row align-items-center">
                            <div class="col">
                                <img
                                    class="rounded-circle mb-3 mt-4"
                                    src="{{ $user->avatar_url ?? 'assets/img/avatars/avatar1.jpeg' }}"
                                    width="160"
                                    height="160"
                                >
                            </div>
                            <div class="col">
gi                                <h5 style="font-weight: 700;">{{ $user->full_name() }}</h5>
                                <a href="#" class="text-warning" style="color: var(--bs-yellow);"></a><svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" fill="currentColor" viewBox="0 0 16 16" class="bi bi-pencil-fill fs-4">
                                    <path d="M12.854.146a.5.5 0 0 0-.707 0L10.5 1.793 14.207 5.5l1.647-1.646a.5.5 0 0 0 0-.708l-3-3zm.646 6.061L9.793 2.5 3.293 9H3.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.207l6.5-6.5zm-7.468 7.468A.5.5 0 0 1 6 13.5V13h-.5a.5.5 0 0 1-.5-.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.5-.5V10h-.5a.499.499 0 0 1-.175-.032l-.179.178a.5.5 0 0 0-.11.168l-2 5a.5.5 0 0 0 .65.65l5-2a.5.5 0 0 0 .168-.11l.178-.178z"></path>
                                </svg>&nbsp;Edit</a>
                            </div>
                        </div>
                        <form method="POST" action="{{ route('update.password') }}" class="text-dark my-3">
                            @csrf
                            <h5 class="font-weight-bold">
                                Edit Password
                            </h5>

                            <div class="mb-3">
                                <input id="current_password" type="password" placeholder="Current Password"
                                    class="form-control input-round @error('current_password') is-invalid @enderror" name="current_password"
                                    required autocomplete="current_password">
            
                                @error('current_password')
                                    <span class="invalid-feedback" role="alert">
                                    <small>{{ $message }}</small>
                                    </span>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <input id="new_password" type="password" placeholder="New Password"
                                    class="form-control input-round @error('new_password') is-invalid @enderror" name="new_password"
                                    required autocomplete="new_password">
            
                                @error('new_password')
                                    <span class="invalid-feedback" role="alert">
                                        <small>{{ $message }}</small>
                                    </span>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <input id="password-confirm" type="password" placeholder="Confirm Password"
                                    class="form-control input-round" name="password_confirmation" required
                                    autocomplete="password_confirmation">
                            </div>

                            <button
                                class="btn btn btn-warning px-4"
                                type="submit"
                            >
                                Save
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
 
@endsection
