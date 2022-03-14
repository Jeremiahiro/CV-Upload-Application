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
                <x-multi-stepper step="1" />
            </section>
            <section>
                <div class="">
                    <form action="{{ $cv ? route('cv.update', $cv['uuid']) : route('cv.store') }}" method="post" class="col-12 col-lg-8 mx-auto my-4 bg-white p-5 shadow rounded">
                        @if ($cv)
                            @method('PUT')
                        @endif
                        @csrf
                        <div class="text-left mb-4">
                            <p class="font-bold text-dark m-0 p-0">Your previous employment history</p>
                            <small class="font-bold text-warning">Please provide the following information</small>
                        </div>

                        <div class="form-group mb-3">
                            <label class="form-label" for="first_name">Name of Employer</label>
                            <input
                                id="employer"
                                type="text"
                                class="form-control input-round @error('employer') is-invalid @enderror"
                                name="employer"
                                value="{{ old('employer') }}"
                                placeholder="Employer"
                                required
                            >
                            @error('employer')
                                <span class="invalid-feedback" role="alert">
                                <small>{{ $message }}</small>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group mb-3">
                            <label class="form-label" for="select-sector">Industry Sector</label>
                            <select class="form-select" name="sector" id="select-sector" required data-live-search="true">
                                <option value="" selected disabled>Select Industry</option>
                                @foreach ($sectors as $sector)
                                    <option
                                        value="{{ $sector->id }}"
                                        {{ old('sector') == $sector->id ? 'selected' : '' }}
                                    >
                                        {{ $country->name }}
                                    </option>
                                @endforeach
                                <option value="others">Others</option>
                            </select>
                            
                            @error('country')
                                <span class="invalid-feedback" role="alert">
                                <small>{{ $message }}</small>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group mb-3" id="other_industrial_sector">
                            <label class="form-label" for="other_industry">If the industry sector is unlisted, please enter it here</label>
                            <input
                                id="other_industry"
                                type="text"
                                class="form-control input-round @error('other_industry') is-invalid @enderror"
                                name="other_industry"
                                value="{{ old('other_industry', $cv->last_name ?? '') }}"
                                placeholder="Other Industry"
                                required
                            >
                            @error('Surname')
                                <span class="invalid-feedback" role="alert">
                                <small>{{ $message }}</small>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group mb-3">
                            <label class="form-label" for="employment_date">Employement Date</label>
                            <input
                                id="employment_date"
                                type="date"
                                class="form-control input-round @error('employment_date') is-invalid @enderror"
                                name="employment_date"
                                value="{{ old('employment_date', $cv->dob ?? '') }}"
                                max="{{ now()->toDateString('Y-m-d') }}"
                                required
                            >
                            @error('employment_date')
                                <span class="invalid-feedback" role="alert">
                                <small>{{ $message }}</small>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group mb-3">
                            <label class="form-label" for="role">Position / Role</label>
                            <input
                                id="role"
                                type="text"
                                class="form-control input-round @error('role') is-invalid @enderror"
                                name="role"
                                value="{{ old('role') }}"
                                placeholder="role"
                                required
                            >
                            @error('role')
                                <span class="invalid-feedback" role="alert">
                                <small>{{ $message }}</small>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group mb-3">
                            <label class="form-label" for="job_description">What are your responsibilities in this role / position?</label>
                            <textarea name="job_description" id="job_description" class="form-control" cols="30" rows="10">{{ old('job_description') }}</textarea>
                            @error('job_description')
                                <span class="invalid-feedback" role="alert">
                                <small>{{ $message }}</small>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group mb-3">
                            <label class="form-label" for="no_of_positions">How many secondary schools did you attend?</label>
                            <input
                                id="no_of_positions"
                                type="number"
                                class="form-control input-round @error('no_of_positions') is-invalid @enderror"
                                name="no_of_positions"
                                value="{{ old('no_of_positions', $cv->no_of_positions ?? '') }}"
                                placeholder="No of Positions"
                                required
                            >
                            @error('no_of_positions')
                                <span class="invalid-feedback" role="alert">
                                    <small>{{ $message }}</small>
                                </span>
                            @enderror
                        </div>


                        <div class="d-flex mt-4" >
                            <a
                                href="{{ $cv->tertiary_institution == 1 ? route('cv.tertiary-institution', $cv['uuid']) : route('cv.secondary-education', $cv['uuid']) }}"
                                id="previousBtn"
                                class="btn btn-light btn-outline-secondary px-4 font-bold mx-2 @if(!$cv->secondary_educations->count()) disabled-link disabled @endif"
                                @if (!$cv->secondary_educations)
                                style="pointer-events: none"
                                @endif
                            >
                                Prev
                            </a>

                            <button class="btn btn-warning px-4 font-bold" type="submit">Next</button>
                        </div>
                    </form>
                </div>
            </section>
        </div>
    </div>
</div>

@endsection
@push('javascript')
    <script>
        $(document).ready(function () {

            const other_industrial_sector = $('#other_industrial_sector-check');

            other_industrial_sector.hide()


            $('#select-sector').on('change', function () {
                var sector = this.value;
                if(sector === 'others') {
                    other_industrial_sector.show(500)
                } else {
                    other_industrial_sector.hide(500)
                }
            });

            $('#previousBtn').click(function(e) {
                var href = $(this).attr('href');
                e.preventDefault();
                if(confirm('Changes you made may not be saved')) {
                    window.location = href;
                }
            });
        });
    </script>

    <script>
        mdd = document.getElementById("country");
        mdd.selectpicker();

        // $(function () {
        //     $('.selectpicker').selectpicker();
        // });
        
    </script>
@endpush
