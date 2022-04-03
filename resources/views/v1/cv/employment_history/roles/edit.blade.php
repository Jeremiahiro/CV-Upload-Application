@extends('v1.layouts.app')
@section('title')
Employment Roles
@endsection
@section('main')

<div class="d-flex flex-column bg-light" id="content-wrapper">
    <div id="content">
        <x-top-nav title="Add CV" />

        <div class="container-fluid bg-light">
            <section>
                <x-multi-stepper step="9" :cv="$cv" />
            </section>
            <section>
                <div class="">
                    <form
                        action="{{ route('cv.employment_role.update', [$cv['uuid'], $employment['id'], $role['id']]) }}"
                        method="post"
                        class="col-12 col-lg-8 mx-auto my-4 bg-white p-5 shadow rounded"
                        onsubmit="$('.submit__btn').attr('disabled', true)"
                    >
                        @csrf
                        <div class="text-left mb-4">
                            <p class="font-bold text-dark m-0 p-0">Update Employment Roles</p>
                            <small class="font-bold text-warning">Please provide the following information</small>
                        </div>

                        <div class="form-group mb-3">
                            <x-employment-roles-select-field :required="true" :selected="$role->position" />
                        </div>

                        <div class="form-group mb-3" id="other_employment_role-container">
                            <label class="form-label" for="other_employment_role">If the position / role is unlisted, please enter it here</label>
                            <input
                                id="other_employment_role"
                                type="text"
                                class="form-control form-input input-round @error('other_employment_role') is-invalid @enderror"
                                name="other_employment_role"
                                value="{{ old('other_employment_role') }}"
                                placeholder="Other Position / Role"
                            >
                            @error('other_employment_role')
                                <span class="invalid-feedback" role="alert">
                                <small>{{ $message }}</small>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group mb-3 row">
                            <div class="col">
                                <label class="form-label" for="start_date">Date in Position / Role</label>
                                <input
                                    id="start_date"
                                    type="text"
                                    class="form-control form-input input-round @error('start_date') is-invalid @enderror"
                                    name="start_date"
                                    value="{{ old('start_date', date('F Y', strtotime($role->start_date)) ?: '') }}"
                                    max="{{ now()->toDateString('M-Y') }}"
                                    required
                                >

                                @error('start_date')
                                    <span class="invalid-feedback" role="alert">
                                        <small>{{ $message }}</small>
                                    </span>
                                @enderror
                            </div>
                            <div class="col">
                                <label class="form-label invisible" for="end_date">To Date</label>
                                <input
                                    id="end_date"
                                    type="text"
                                    class="form-control form-input input-round @error('end_date') is-invalid @enderror"
                                    name="end_date"
                                    value="{{ old('end_date', date('F Y', strtotime($role->end_date)) ?: '') }}"
                                    max="{{ now()->toDateString('M-Y') }}"
                                    format="d-m-y"
                                    required
                                >
                                
                                @error('end_date')
                                    <span class="invalid-feedback" role="alert">
                                        <small>{{ $message }}</small>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group mb-3">
                            <label class="form-label" for="job_description">What are your responsibilities in this role / position?</label>
                            <textarea name="job_description" id="job_description" class="form-control" rows="5">{{ old('job_description', $role->job_description) }}</textarea>
                            @error('job_description')
                                <span class="invalid-feedback" role="alert">
                                <small>{{ $message }}</small>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group mb-3" id="update">
                            <button type="submit" class="submit__btn text-warning font-bold btn btn-clear">
                                <i class="fa fa-check"></i>
                                <span class="update_text">Update</span>
                            </button>
                        </div>

                        <div class="form-group mb-3">
                            <label class="form-label">Do you want to provide any references that a potential employer may contact?</label><br>
                            <div class="form-check form-check-inline">
                                <input
                                    class="form-check-input"
                                    type="radio"
                                    name="referees"
                                    id="has_contact"
                                    value="1"
                                    required
                                    {{ old('referees', $role->referees) == '1' ? 'checked' : '' }}
                                >
                                <label class="form-check-label" for="has_contact">Yes</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input
                                    class="form-check-input"
                                    type="radio"
                                    name="referees"
                                    id="no_contact"
                                    value="0"
                                    required
                                    {{ old('referees', $role->referees) == '0' ? 'checked' : '' }}
                                >
                                <label class="form-check-label" for="no_contact">No</label>
                            </div>
                        </div>

                        <div class="d-flex mt-4" >
                            <a
                                href="{{ route('cv.employment_history', [$cv['uuid'], $role->job_experience->is_current ? 'current' : 'previous']) }}"
                                id="previousBtn"
                                class="submit__btn btn btn-light btn-outline-secondary px-4 font-bold mx-2"
                            >
                                Prev
                            </a>

                            <a
                                href="{{ $role->job_experience->is_current ? route('cv.employment_history', [$cv['uuid'], 'current']) : route('cv.referee', $cv['uuid']) }}"
                                id="nextForm"
                                class="submit__btn btn btn-warning px-4 font-bold mx-2"
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

            const other_employment_role = $('#other_employment_role-container');
            other_employment_role.hide()

            $('#previousBtn').click(function(e) {
                var href = $(this).attr('href');
                e.preventDefault();
                if(confirm('Changes you made may not be saved')) {
                    window.location = href;
                }
            });

            $('#start_date').focus(function(e) {
                $(this).attr('type','month');
            });

            $('#end_date').focus(function(e) {
                $(this).attr('type','month');
            });

            $('#select-role').on('change', function () {
                var sector = this.value;
                if(sector === 'others') {
                    other_employment_role.show(500)
                } else {
                    other_employment_role.hide(500)
                }
            });

        });
    </script>
@endpush
