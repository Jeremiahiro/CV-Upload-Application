@extends('v1.layouts.app')
@section('title')
Employment History
@endsection
@section('main')

<div class="d-flex flex-column bg-light" id="content-wrapper">
    <div id="content">
        <x-top-nav title="Add CV" />

        <div class="container-fluid bg-light">
            <section>
                <x-multi-stepper step="7" :cv="$cv" />
            </section>
            <section>
                <div class="">
                    <form
                        action="{{ route('cv.employment_history.update', [$cv['uuid'], $employment['id']]) }}"
                        method="post"
                        class="col-12 col-lg-8 mx-auto my-4 bg-white p-5 shadow rounded"
                        onsubmit="$('.submit__btn').attr('disabled', true)"
                        id="employment_history_form"
                    >
                        @csrf
                        <div class="text-left mb-4">
                            <p class="font-bold text-dark m-0 p-0">Update Your {{ $type == 'current' ? 'Current' : 'Previous' }} employment history</p>
                            <small class="font-bold text-warning">Please provide the following information</small>
                        </div>

                        <div>
                            <input type="hidden" name="is_current" id="is_current" value="{{ $type == 'current' ? 'current' : 'previous' }}">
                        </div>

                        <div class="form-group mb-3">
                            <label class="form-label" for="name_of_employer">Name of Employer</label>
                            <input
                                id="name_of_employer"
                                type="text"
                                class="form-control form-input input-round @error('name_of_employer') is-invalid @enderror"
                                name="name_of_employer"
                                value="{{ old('name_of_employer', $employment->employer) }}"
                                placeholder="Employer"
                                required
                            >
                            @error('name_of_employer')
                                <span class="invalid-feedback" role="alert">
                                <small>{{ $message }}</small>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group mb-3">
                            <x-industry-sector-select-field :required="true" :selected="$employment->sector" />
                            
                            @error('industry_sector')
                                <span class="invalid-feedback" role="alert">
                                <small>{{ $message }}</small>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group mb-3" id="other_industrial_sector">
                            <label class="form-label" for="other_industry_sector">If the industry sector is unlisted, please enter it here</label>
                            <input
                                id="other_industry_sector"
                                type="text"
                                class="form-control form-input input-round @error('other_industry_sector') is-invalid @enderror"
                                name="other_industry_sector"
                                value="{{ old('other_industry_sector', $employment->other_industry_sector) }}"
                                placeholder="Other Industry"
                            >
                            @error('other_industry_sector')
                                <span class="invalid-feedback" role="alert">
                                <small>{{ $message }}</small>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group mb-3">
                            <label class="form-label" for="employment_date">employment Date</label>
                            <input
                                id="employment_date"
                                type="text"
                                class="form-control form-input input-round @error('employment_date') is-invalid @enderror"
                                name="employment_date"
                                value="{{ old('employment_date', date('F Y', strtotime($employment->employment_date)) ?: '') }}"
                                max="{{ now()->toDateString('M-Y') }}"
                                required
                            >
                            @error('employment_date')
                                <span class="invalid-feedback" role="alert">
                                <small>{{ $message }}</small>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group mb-3">
                            <x-employment-roles-select-field :required="true" :selected="$employment->position" />

                            @error('role')
                                <span class="invalid-feedback" role="alert">
                                <small>{{ $message }}</small>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group mb-3" id="other_employment_role-container">
                            <label class="form-label" for="other_employment_role">If the position / role is unlisted, please enter it here</label>
                            <input
                                id="other_employment_role"
                                type="text"
                                class="form-control form-input input-round @error('other_employment_role') is-invalid @enderror"
                                name="other_employment_role"
                                value="{{ old('other_employment_role', $employment->other_employment_role) }}"
                                placeholder="Other Position / Role"
                            >
                            @error('other_employment_role')
                                <span class="invalid-feedback" role="alert">
                                <small>{{ $message }}</small>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group mb-3">
                            <label class="form-label" for="job_description">What are your responsibilities in this role / position?</label>
                            <textarea name="job_description" id="job_description" class="form-control" rows="5">{{ old('job_description', $employment->job_description) }}</textarea>
                            @error('job_description')
                                <span class="invalid-feedback" role="alert">
                                <small>{{ $message }}</small>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group mb-3" id="">
                            <label class="form-label">Have you held any prior roles with this employer?</label><br>
                            <div class="form-check form-check-inline">
                                <input
                                    class="form-check-input"
                                    type="radio"
                                    name="have_prior_role"
                                    id="yes"
                                    value="1"
                                    required
                                    {{ old('have_prior_role', $employment->have_prior_role) == '1' ? 'checked' : '' }}
                                >
                                <label class="form-check-label" for="yes">Yes</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input
                                    class="form-check-input"
                                    type="radio"
                                    name="have_prior_role"
                                    id="no"
                                    value="0"
                                    required
                                    {{ old('have_prior_role', $employment->have_prior_role) == '0' ? 'checked' : '' }}
                                >
                                <label class="form-check-label" for="no">no</label>
                            </div>
                        </div>

                        <div class="form-group mb-3" id="no_of_positions-container">
                            <label class="form-label" for="no_of_positions">List the number of prior roles with this employer</label>
                            <input
                                id="no_of_positions"
                                type="number"
                                class="form-control form-input input-round @error('no_of_positions') is-invalid @enderror"
                                name="no_of_positions"
                                value="{{ old('no_of_positions', $employment->no_of_positions) }}"
                                placeholder="No of Positions"
                            >
                            @error('no_of_positions')
                                <span class="invalid-feedback" role="alert">
                                    <small>{{ $message }}</small>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group mb-3" id="update">
                            <button type="submit" class="submit__btn text-warning font-bold btn btn-clear">
                                <i class="fa fa-check"></i>
                                Update
                            </button>
                        </div>

                        <div class="d-flex mt-4" >
                            <a
                                href="{{ route('cv.employment_history', [$cv['uuid'], $type]) }}"
                                id="previousBtn"
                                class="submit__btn btn btn-light btn-outline-secondary px-4 font-bold mx-2 @if(!$cv->secondary_educations->count()) disabled @endif"
                            >
                                Prev
                            </a>
                            <a
                                href="{{ route('cv.employment_history', [$cv['uuid'], $type]) }}"
                                id="nextBtn"
                                class="submit__btn btn btn-warning px-4 font-bold mx-2 @if(!$cv->secondary_educations->count()) disabled @endif"
                            >
                                Next
                            </a>
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

            const nextBtn = $('#nextBtn');
            const submitBtn = $('#submit_btn');
            submitBtn.hide();
            
            const other_employment_role = $('#other_employment_role-container');
            const no_of_positions = $('#no_of_positions-container');
            const other_industrial_sector = $('#other_industrial_sector');
            other_industrial_sector.hide()
            no_of_positions.hide()
            other_employment_role.hide()

            const employment = {!! $employment !!};

            if(employment.industrial_sectors_id == null) {
                var otherOption = new Option('Others', 'others', true, true);
                $('#select-industry_sector').append(otherOption).trigger('change');
                other_industrial_sector.show(500)
            } else {
                other_industrial_sector.hide(500)
            }

            if(employment.employment_roles_id == null) {
                var otherOption = new Option('Others', 'others', true, true);
                $('#select-role').append(otherOption).trigger('change');
                other_employment_role.show(500)
            } else {
                other_employment_role.hide(500)
            }

            if(employment.has_prior_role == 1) {
                no_of_positions.show(500)
            } else {
                no_of_positions.hide(500)
            }

            $('#employment_date').focus(function(e) {
                $(this).attr('type','month');
            });

            $('input[name="have_prior_role"]').on('input', function() {
                if(this.value == 1) {
                    no_of_positions.show(500)
                } else {
                    no_of_positions.hide(500)
                }
            });
            
            $('#name_of_employer').on('input', function () {
                nextBtn.hide(500);
                submitBtn.show(500);
            });

            $('#select-industry_sector').on('change', function () {
                var sector = this.value;
                if(sector === 'others') {
                    other_industrial_sector.show(500)
                } else {
                    other_industrial_sector.hide(500)
                }
            });

            $('#select-role').on('change', function () {
                var sector = this.value;
                if(sector === 'others') {
                    other_employment_role.show(500)
                } else {
                    other_employment_role.hide(500)
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
@endpush
