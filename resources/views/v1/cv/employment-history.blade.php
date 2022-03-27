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
                        action="{{ $cv ? route('cv.employement_history.create', $cv['uuid']) : route('cv.store') }}"
                        method="post"
                        class="col-12 col-lg-8 mx-auto my-4 bg-white p-5 shadow rounded"
                        onsubmit="$('.submit__btn').attr('disabled', true)"
                        id="employement_history_form"
                    >
                        @csrf
                        <div class="text-left mb-4">
                            <p class="font-bold text-dark m-0 p-0">Your {{ $type == 'current' ? 'Current' : 'Previous' }} employment history</p>
                            <small class="font-bold text-warning">Please provide the following information</small>
                        </div>

                        <div>
                            <input type="hidden" name="is_current" id="is_current" value="{{ $type == 'current' ? 'current' : 'previous' }}">
                        </div>

                        <div class="d-flex flex-wrap mb-2">
                            @foreach ($previous_experiecne as $experience)
                                @if ($type == 'current')
                                @if ($experience->is_current)
                                <div class="col col-lg-6">
                                    <div class="w-100 data m-2 p-2">
                                        <div class="d-flex justify-content-between p-2 bg-warning text-dark">
                                            <div class=" ">
                                                <span class="font-bold">
                                                    {{ Str::limit($experience->employer, 30) }}
                                                    <br>
                                                    <i>{{ $experience->employement_roles_id ? $experience->position->name : $experience->other_employement_role }}</i>
                                                </span>
                                                <br>
                                                <small class="">
                                                    {{ $experience->date }}
                                                </small>
                                                <br>
                                                <small>
                                                    Sector: {{ $experience->no_of_positions ?? $experience->other_industry }}
                                                </small>
                                            </div>
                                            <div class="data__action mx-3">
                                                <div class="d-flex flex-column align-items-end">
                                                    <span class="cursor-pointer mx-2">
                                                        <i
                                                            class="fa fa-edit text-dark edit-experience-data cursor-pointer"
                                                            data-education="{{ $experience }}"
                                                            data-cv="{{ $cv }}"
                                                            data-toggle="tooltip"
                                                            title="Edit Data"></i>
                                                    </span>
                                                    <span class="cursor-pointer mx-2">
                                                        <a
                                                            href="{{ route('cv.employement_history.delete', [$cv['uuid'], $experience['id']]) }}"
                                                            data-toggle="tooltip"
                                                            title="Delete Data"
                                                            class="text-danger"
                                                        >
                                                            <i class="fa fa-trash text-danger delete-experience-data"></i>
                                                        </a>
                                                    </span>
                                                    <span class="cursor-pointer mx-2">
                                                        <small>
                                                            <a
                                                                href="{{ route('cv.employement_role', [$cv['uuid'], $experience['id']]) }}"
                                                                data-toggle="tooltip"
                                                                title="Add Employment Roles"
                                                                class="text-primary"
                                                            >
                                                                Manage Roles
                                                            </a>
                                                        </small>
                                                    </span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @endif
                                @else
                                <div class="col col-lg-6">
                                    <div class="w-100 data m-2 p-2">
                                        <div class="d-flex justify-content-between p-2 bg-warning text-dark">
                                            <div class=" ">
                                                <span class="font-bold">
                                                    {{ Str::limit($experience->employer, 30) }}
                                                    <br>
                                                    <i>{{ $experience->employement_roles_id ? $experience->position->name : $experience->other_employement_role }}</i>
                                                </span>
                                                <br>
                                                <small class="">
                                                    {{ $experience->date }}
                                                </small>
                                                <br>
                                                <small>
                                                    Sector: {{ $experience->no_of_positions ?? $experience->other_industry }}
                                                </small>
                                            </div>
                                            <div class="data__action mx-3">
                                                <div class="d-flex flex-column align-items-end">
                                                    <span class="cursor-pointer mx-2">
                                                        <i
                                                            class="fa fa-edit text-dark edit-experience-data cursor-pointer"
                                                            data-education="{{ $experience }}"
                                                            data-cv="{{ $cv }}"
                                                            data-toggle="tooltip"
                                                            title="Edit Data"></i>
                                                    </span>
                                                    <span class="cursor-pointer mx-2">
                                                        <a
                                                            href="{{ route('cv.employement_history.delete', [$cv['uuid'], $experience['id']]) }}"
                                                            data-toggle="tooltip"
                                                            title="Delete Data"
                                                            class="text-danger"
                                                        >
                                                            <i class="fa fa-trash text-danger delete-experience-data"></i>
                                                        </a>
                                                    </span>
                                                    <span class="cursor-pointer mx-2">
                                                        <small>
                                                            <a
                                                                href="{{ route('cv.employement_role', [$cv['uuid'], $experience['id']]) }}"
                                                                data-toggle="tooltip"
                                                                title="Add Employment Roles"
                                                                class="text-primary"
                                                            >
                                                                Manage Roles
                                                            </a>
                                                        </small>
                                                    </span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @endif
                            @endforeach
                        </div>

                        <div class="form-group mb-3">
                            <label class="form-label" for="name_of_employer">Name of Employer</label>
                            <input
                                id="name_of_employer"
                                type="text"
                                class="form-control form-input input-round @error('name_of_employer') is-invalid @enderror"
                                name="name_of_employer"
                                value="{{ old('name_of_employer') }}"
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
                            <x-industry-sector-select-field :required="true" />
                            
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
                                value="{{ old('other_industry_sector') }}"
                                placeholder="Other Industry"
                            >
                            @error('other_industry_sector')
                                <span class="invalid-feedback" role="alert">
                                <small>{{ $message }}</small>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group mb-3">
                            <label class="form-label" for="employment_date">Employement Date</label>
                            <input
                                id="employment_date"
                                type="month"
                                class="form-control form-input input-round @error('employment_date') is-invalid @enderror"
                                name="employment_date"
                                value="{{ old('employment_date') }}"
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
                            <x-employment-roles-select-field :required="true" />

                            @error('role')
                                <span class="invalid-feedback" role="alert">
                                <small>{{ $message }}</small>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group mb-3" id="other_employement_role-container">
                            <label class="form-label" for="other_employement_role">If the position / role is unlisted, please enter it here</label>
                            <input
                                id="other_employement_role"
                                type="text"
                                class="form-control form-input input-round @error('other_employement_role') is-invalid @enderror"
                                name="other_employement_role"
                                value="{{ old('other_employement_role') }}"
                                placeholder="Other Position / Role"
                            >
                            @error('other_employement_role')
                                <span class="invalid-feedback" role="alert">
                                <small>{{ $message }}</small>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group mb-3">
                            <label class="form-label" for="job_description">What are your responsibilities in this role / position?</label>
                            <textarea name="job_description" id="job_description" class="form-control" rows="5">{{ old('job_description') }}</textarea>
                            @error('job_description')
                                <span class="invalid-feedback" role="alert">
                                <small>{{ $message }}</small>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group mb-3">
                            <label class="form-label" for="no_of_positions">How many positions did you hold with this employer?</label>
                            <input
                                id="no_of_positions"
                                type="number"
                                class="form-control form-input input-round @error('no_of_positions') is-invalid @enderror"
                                name="no_of_positions"
                                value="{{ old('no_of_positions',) }}"
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
                                class="submit__btn btn btn-light btn-outline-secondary px-4 font-bold mx-2 @if(!$cv->secondary_educations->count()) disabled @endif"
                            >
                                Prev
                            </a>
                            <a
                                href="{{ $type == 'current' ? route('cv.employement_history', [$cv['uuid'], 'previous']) : route('cv.employement_role', [$cv['uuid'], 1]) }}"
                                id="nextBtn"
                                class="submit__btn btn btn-warning px-4 font-bold mx-2 @if(!$cv->secondary_educations->count()) disabled @endif"
                            >
                                Next
                            </a>
                            <button class="submit__btn btn btn-warning px-4 font-bold" type="submit" id="submit_btn">Next</button>
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
            
            const other_employement_role = $('#other_employement_role-container');
            const other_industrial_sector = $('#other_industrial_sector');
            other_industrial_sector.hide()
            other_employement_role.hide()
            

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
                    other_employement_role.show(500)
                } else {
                    other_employement_role.hide(500)
                }
            });

            $('.edit-experience-data').click(function(e) {
                $('#submit_btn').text('Update');
              
                const data = $(this).data('education');
                const cv = $(this).data('cv');
                const form_action = '/cv/'+cv.uuid+'/employement-history/'+data.id

                if(confirm('Changes you made may not be saved')) {
                    handleUpdateData(data);
                }

                function handleUpdateData(data) {
                    var type = 'others';
                    if(data.sector != null) {
                        type = data.sector.id;
                    }
                    $('#employement_history_form').attr('action', form_action);
                    $('#select-industry_sector').val(type).change();
                    $('#name_of_employer').val(data.employer);
                    $('#employment_date').val(data.date);
                    $('#role').val(data.role);
                    $('#job_description').val(data.job_description);
                    $('#no_of_positions').val(data.no_of_positions);
                    start_date.val(data.start_date);
                    end_date.val(data.end_date);
                    if(type == 'others') {
                        $('#other_industry_sector').val(data.other_industry);
                    }
                };
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
