@extends('v1.layouts.app')
@section('title')
Add CV
@endsection
@section('main')

<div class="d-flex flex-column bg-light" id="content-wrapper">
    <div id="content">
        <x-top-nav title="Add CV" />

        <div class="container-fluid bg-light">
            <section>
                <x-multi-stepper step="1" cv="{{ $cv }}" />
            </section>
            <section>
                <div class="">
                    <form
                        action="{{ $cv ? route('cv.update', $cv['uuid']) : route('cv.store') }}"
                        method="post"
                        class="col-12 col-lg-8 mx-auto my-4 bg-white p-5 shadow rounded"
                        onsubmit="$('.submit__btn').attr('disabled', true)"
                    >
                        @if ($cv)
                            @method('PUT')
                        @endif
                        @csrf
                        <div class="text-left mb-4">
                            <p class="font-bold text-dark m-0 p-0">Personal details</p>
                            <small class="font-bold text-warning">Please provide the following information</small>
                        </div>

                        <div class="form-group mb-3">
                            <label class="form-label" for="first_name">First Name</label>
                            <input
                                id="first_name"
                                type="text"
                                class="form-control form-input input-round @error('first_name') is-invalid @enderror"
                                name="first_name"
                                value="{{ old('first_name', $cv->first_name ?? '') }}"
                                placeholder="First Name"
                                required
                            >
                            @error('first_name')
                                <span class="invalid-feedback" role="alert">
                                <small>{{ $message }}</small>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group mb-3">
                            <label class="form-label" for="middle_name">Middle Name</label>
                            <input
                                id="middle_name"
                                type="text"
                                class="form-control form-input input-round @error('middle_name') is-invalid @enderror"
                                name="middle_name"
                                value="{{ old('middle_name', $cv->middle_name ?? '') }}"
                                placeholder="Middle Name"
                            >
                            @error('middle_name')
                                <span class="invalid-feedback" role="alert">
                                <small>{{ $message }}</small>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group mb-3">
                            <label class="form-label" for="last_name">Surname / Last Name</label>
                            <input
                                id="last_name"
                                type="text"
                                class="form-control form-input input-round @error('last_name') is-invalid @enderror"
                                name="last_name"
                                value="{{ old('last_name', $cv->last_name ?? '') }}"
                                placeholder="Surname / Last Name"
                                required
                            >
                            @error('last_name')
                                <span class="invalid-feedback" role="alert">
                                <small>{{ $message }}</small>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group mb-3">
                            <label class="form-label" for="date_of_birth">Date of Birth</label>
                            <input
                                id="date_of_birth"
                                type="date"
                                class="form-control form-input input-round @error('date_of_birth') is-invalid @enderror"
                                name="date_of_birth"
                                value="{{ old('date_of_birth', $cv->dob ?? '') }}"
                                max="{{ now()->toDateString('Y-m-d') }}"
                                required
                            >
                            @error('date_of_birth')
                                <span class="invalid-feedback" role="alert">
                                <small>{{ $message }}</small>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group mb-3">
                            <label class="form-label">Sex</label><br>
                            <div class="form-check form-check-inline">
                                <input
                                    class="form-check-input"
                                    type="radio"
                                    name="sex"
                                    id="male"
                                    value="male"
                                    required
                                    @if ($cv)
                                        {{ $cv->sex === 'male' ? 'checked' : '' }}   
                                    @else
                                        {{ old('sex') === 'male' ? 'checked' : '' }}
                                    @endif
                                >
                                <label class="form-check-label" for="male">Male</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input
                                    class="form-check-input"
                                    type="radio"
                                    name="sex"
                                    id="female"
                                    value="female"
                                    required
                                    @if ($cv)
                                        {{ $cv->sex === 'female' ? 'checked' : '' }}   
                                    @else
                                        {{ old('sex') === 'female' ? 'checked' : '' }}
                                    @endif
                                >
                                <label class="form-check-label" for="female">Female</label>
                            </div>
                        </div>

                        <div class="d-flex mt-4" >
                            <button class="btn btn-warning px-4 font-bold submit__btn" type="submit">Next</button>
                        </div>
                    </form>
                </div>
            </section>
        </div>
    </div>
</div>

@endsection
