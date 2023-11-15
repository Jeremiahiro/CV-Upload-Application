@extends('v1.layouts.app')
@section('title')
    Settings
@endsection
@section('main')

<div class="d-flex flex-column" id="content-wrapper">
    <div id="content">
        <x-top-nav title="Settings" />
        <div class="container-fluid px-5 w-100">
            @if (!$user->full_name())
                <div class="alert alert-warning alert-dismissible fade show alert-fixed" role="alert">
                    <div class="mr-5 pr-5 f-14">
                        {{ __('Update your profile') }}
                    </div>
                </div>
            @endif
            <div class="row mb-3">
                <div class="col-lg-5">
                    <div style="text-align: left;">
                        <div class="row align-items-center">
                            <div class="col col-4">
                                <form
                                    class="position-relative text-center"
                                    method="POST"
                                    action="{{ route('update.image') }}" 
                                    enctype="multipart/form-data"
                                    onsubmit="$('#profile_photo-btn').attr('disabled', true)"
                                >
                                    @csrf
                                    <div class="position-relative">
                                        <label for="profile_photo">
                                            <img
                                                class="profile_picture img-fluid img-thumbnail"
                                                id="profile_picture"
                                                src="{{ $user->avatar_url ?? 'assets/img/avatar.png' }}"
                                                alt="{{ $user->full_name() }}"
                                                data-image="{{ $user->avatar_url ?? 'assets/img/avatar.png' }}"
                                            >
                                            <i class="fa fa-camera profile_picture-icon"></i>
                                        </label>
                                        <input type="File" name="photo_url" id="profile_photo">
                                    </div>
                                    <div class="profile_photo-action" id="profile_photo-action">
                                        <span id="profile_photo-close" class="cursor-pointer"><i class="fa fa-times text-danger"></i> </span>
                                        <button
                                            class="btn btn-sm btn-warning px-4 mt-2"
                                            type="submit"
                                            id="profile_photo-btn"
                                        >
                                            Upload
                                        </button>
                                    </div>
                                </form>
                            </div>
                            <div class="col">
                                <div id="profile_info">
                                    <h5 style="font-weight: 700;">{{ $user->full_name() }}</h5>
                                    <a href="#" class="text-warning" style="color: var(--bs-yellow);" id="update_profile_button">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" fill="currentColor" viewBox="0 0 16 16" class="bi bi-pencil-fill fs-4">
                                        <path d="M12.854.146a.5.5 0 0 0-.707 0L10.5 1.793 14.207 5.5l1.647-1.646a.5.5 0 0 0 0-.708l-3-3zm.646 6.061L9.793 2.5 3.293 9H3.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.207l6.5-6.5zm-7.468 7.468A.5.5 0 0 1 6 13.5V13h-.5a.5.5 0 0 1-.5-.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.5-.5V10h-.5a.499.499 0 0 1-.175-.032l-.179.178a.5.5 0 0 0-.11.168l-2 5a.5.5 0 0 0 .65.65l5-2a.5.5 0 0 0 .168-.11l.178-.178z"></path>
                                        </svg>&nbsp;Edit
                                    </a>
                                </div>
                                <form
                                    method="POST"
                                    action="{{ route('user.update', $user->id) }}"
                                    class="text-dark my-3"
                                    id="update_profile_form"
                                    onsubmit="$('#info_submit-btn').attr('disabled', true)"
                                >
                                    @csrf
                                    @method('PUT')
                                    <div class="d-flex justify-content-between align-items-start">
                                        <h5 class="font-weight-bold">
                                            Update Profile
                                        </h5>
                                        <span id="update_profile_form-close" class="cursor-pointer"><i class="fa fa-times text-danger"></i> </span>
                                    </div>
        
                                    <div class="mb-3">
                                        <input id="first_name" type="text" placeholder="First Name"
                                            class="form-control input-round @error('first_name') is-invalid @enderror" name="first_name"
                                            required autocomplete="first_name" value="{{ old('first_name', $user->first_name) }}">
                    
                                        @error('first_name')
                                            <span class="invalid-feedback" role="alert">
                                                <small>{{ $message }}</small>
                                            </span>
                                        @enderror
                                    </div>
        
                                    <div class="mb-3">
                                        <input id="last_name" type="text" placeholder="Last Name"
                                            class="form-control input-round @error('last_name') is-invalid @enderror" name="last_name"
                                            required autocomplete="last_name" value="{{ old('last_name', $user->last_name) }}">
                    
                                        @error('last_name')
                                            <span class="invalid-feedback" role="alert">
                                                <small>{{ $message }}</small>
                                            </span>
                                        @enderror
                                    </div>
        
                                    <button
                                        class="btn btn btn-warning px-4"
                                        type="submit"
                                        id="info_submit-btn"
                                    >
                                        Save
                                    </button>
                                </form>
                            </div>
                        </div>
                        <form
                            method="POST"
                            action="{{ route('update.password') }}"
                            class="text-dark my-3"
                            onsubmit="$('#update_password-btn').attr('disabled', true)"
                        >
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
                                id="update_password-btn"
                            >
                                Save
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
 <style>
    .profile_picture {
        border-radius: 50%;
        height: 150px;
        width: 150px;
        vertical-align: bottom;
        position: relative;
    }
    .profile_picture:hover {
        opacity: 0.8;
    }
    .profile_picture-icon {
        display: inline-block;
        position: absolute;
        right: 45%;
        bottom: 10px;
        color: #fff;
    }

    #profile_photo {
        display: none;
        cursor: pointer;
    }

    #profile_photo-close {
        position: absolute;
        top: 2px;
        right: 0;
    }

 </style>
@endsection
@push('javascript')
    <script>

        function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    $('#profile_picture').attr('src', e.target.result);
                };
                reader.readAsDataURL(input.files[0]);
            }
        }

        $(function () {
            $("#update_profile_form").hide();
            $("#profile_photo-action").hide();

            $("#update_profile_button").click(function(){
                $("#update_profile_form").toggle(1000);
                $("#profile_info").toggle(1000);
            });

            $("#update_profile_form-close").click(function(){
                $("#update_profile_form").toggle(1000);
                $("#profile_info").toggle(1000);
            });

            $('#profile_photo').change(function () {
                $("#profile_photo-action").toggle(1000);
                readURL(this);
            });

            $('#profile_photo-close').click(function() {
                $("#profile_photo-action").toggle(1000);
                $('#profile_picture').attr('src', $('#profile_picture').data('image'));
            })
        });
    </script>
@endpush
