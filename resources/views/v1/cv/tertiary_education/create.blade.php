@extends('v1.layouts.app')
@section('title')
Tertiary Institutions
@endsection
@section('main')

<div class="d-flex flex-column bg-light" id="content-wrapper">
    <div id="content">
        <x-top-nav title="Add CV" />
        <div class="container-fluid bg-light">
            <section>
                <x-multi-stepper step="4" :cv="$cv" />
            </section>
            <section>
                <div class="">
                    <form
                        action="{{ route('cv.tertiary-institution.create', $cv['uuid']) }}"
                        method="post"
                        class="col-12 col-lg-8 mx-auto my-4 bg-white p-5 shadow rounded"
                        onsubmit="$('.submit__btn').attr('disabled', true)"
                        id="tertiary_education_form"
                    >
                        @csrf
                        <div class="text-left mb-4">
                            <p class="font-bold text-dark m-0 p-0">Tertiary Institutions</p>
                            <small class="font-bold text-warning">Please provide the following information</small>
                        </div>

                        @if ($tertiary_educations->count())
                        <div class="d-flex flex-wrap mb-2">
                            @foreach ($tertiary_educations as $tertiary_education)
                                <div class="col col-lg-6 mb-2">
                                    <div class="w-100 data">
                                        <div class="m-2 d-flex justify-content-between p-2 bg-warning text-dark">
                                            <div class=" ">
                                                <span class="font-bold">
                                                    {{ Str::limit($tertiary_education->tertiary_institutions_id ? $tertiary_education->institution->name : $tertiary_education->other_tertiary_institution, 40) }} 
                                                    <br />
                                                    <small>({{ $tertiary_education->tertiary_types_id ? $tertiary_education->tertiary_type->name : $tertiary_education->other_tertiary_type }})</small>
                                                </span>
                                                <br>
                                                <small class="">
                                                    {{ date('M-Y', strtotime($tertiary_education->start_date)) }} to {{ date('M-Y', strtotime($tertiary_education->end_date)) }}
                                                </small>
                                            </div>
                                            <div class="data__action mx-3">
                                                <div class="d-flex flex-column">
                                                    <span class="cursor-pointer mx-2">
                                                        <a
                                                            href="{{ route('cv.tertiary-institution.edit', [$cv['uuid'], $tertiary_education['id']]) }}"
                                                            data-toggle="tooltip"
                                                            title="Edit Data"
                                                        >
                                                            <i class="fa fa-edit text-dark"></i>
                                                        </a>
                                                    </span>
                                                    <span class="cursor-pointer mx-2">
                                                        <a
                                                            href="{{ route('cv.tertiary-institution.delete', [$cv['uuid'], $tertiary_education['id']]) }}"
                                                            data-toggle="tooltip"
                                                            title="Delete Data"
                                                            class="text-danger"
                                                        >
                                                            <i class="fa fa-trash text-danger delete-tertiary-data"></i>
                                                        </a>
                                                    </span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                        @endif

                        <div class="form-group mb-3">
                            <x-tertiary-type-select-field :required="true" />
 
                             @error('type_of_institution')
                                 <span class="invalid-feedback" role="alert">
                                 <small>{{ $message }}</small>
                                 </span>
                             @enderror
                         </div>
 
                         <div class="form-group mb-3" id="other_tertiary_institution_type-container">
                             <label class="form-label" for="other_tertiary_institution_type">if others please specify</label>
                             <input
                                 id="other_tertiary_institution_type"
                                 type="text"
                                 class="form-control form-input input-round @error('other_tertiary_institution_type') is-invalid @enderror"
                                 name="other_tertiary_institution_type"
                                 value="{{ old('other_tertiary_institution_type') }}"
                                 placeholder="Other Institution Type"
                             >
                             @error('other_tertiary_institution_type')
                                 <span class="invalid-feedback" role="alert">
                                 <small>{{ $message }}</small>
                                 </span>
                             @enderror
                         </div>

                        <div class="form-group mb-3">
                           <x-tertiary-select-field :required="true" />

                            @error('name_of_institution')
                                <span class="invalid-feedback" role="alert">
                                <small>{{ $message }}</small>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group mb-3" id="other_tertiary_institution-container">
                            <label class="form-label" for="other_tertiary_institution">Please specify others</label>
                            <input
                                id="other_tertiary_institution"
                                type="text"
                                class="form-control form-input input-round @error('other_tertiary_institution') is-invalid @enderror"
                                name="other_tertiary_institution"
                                value="{{ old('other_tertiary_institution') }}"
                                placeholder="Other Institution"
                            >
                            @error('other_tertiary_institution')
                                <span class="invalid-feedback" role="alert">
                                <small>{{ $message }}</small>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group mb-3">
                            <x-tertiary-qualification-select-field :required="true" />
 
                             @error('qualification')
                                 <span class="invalid-feedback" role="alert">
                                 <small>{{ $message }}</small>
                                 </span>
                             @enderror
                        </div>
 
                        <div class="form-group mb-3" id="other_qualifiation_obtained-container">
                            <label class="form-label" for="other_qualifiation_obtained">Other Qualification Obtained</label>
                            <input
                                id="other_qualifiation_obtained"
                                type="text"
                                class="form-control form-input input-round @error('other_qualifiation_obtained') is-invalid @enderror"
                                name="other_qualifiation_obtained"
                                value="{{ old('other_qualifiation_obtained') }}"
                                placeholder="Other qualification"
                            >
                            @error('other_qualifiation_obtained')
                                <span class="invalid-feedback" role="alert">
                                <small>{{ $message }}</small>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group mb-3">
                            <x-tertiary-course-type-select-field :required="true" />
 
                             @error('course_type')
                                 <span class="invalid-feedback" role="alert">
                                 <small>{{ $message }}</small>
                                 </span>
                             @enderror
                        </div>
 
                        <div class="form-group mb-3" id="other_course_type-container">
                            <label class="form-label" for="other_course_type">Other Course Type</label>
                            <input
                                id="other_course_type"
                                type="text"
                                class="form-control form-input input-round @error('other_course_type') is-invalid @enderror"
                                name="other_course_type"
                                value="{{ old('other_course_type') }}"
                                placeholder="Other Course Type"
                            >
                            @error('other_course_type')
                                <span class="invalid-feedback" role="alert">
                                <small>{{ $message }}</small>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group mb-3">
                            <x-tertiary-course-select-field :required="true" />
 
                             @error('course')
                                 <span class="invalid-feedback" role="alert">
                                 <small>{{ $message }}</small>
                                 </span>
                             @enderror
                        </div>
 
                        <div class="form-group mb-3" id="other_course-container">
                            <label class="form-label" for="other_course">Other Course</label>
                            <input
                                id="other_course"
                                type="text"
                                class="form-control form-input input-round @error('other_course') is-invalid @enderror"
                                name="other_course"
                                value="{{ old('other_course') }}"
                                placeholder="Specify Other Course of Study"
                            >
                            @error('other_course')
                                <span class="invalid-feedback" role="alert">
                                <small>{{ $message }}</small>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group mb-3">
                            <x-tertiary-grade-select-field :required="true" />
 
                             @error('grade')
                                 <span class="invalid-feedback" role="alert">
                                 <small>{{ $message }}</small>
                                 </span>
                             @enderror
                        </div>
 
                        <div class="form-group mb-3" id="other_grade-container">
                            <label class="form-label" for="other_grade">Other Grade of Qualification</label>
                            <input
                                id="other_grade"
                                type="text"
                                class="form-control form-input input-round @error('other_grade') is-invalid @enderror"
                                name="other_grade"
                                value="{{ old('other_grade') }}"
                                placeholder="Specify Other Grade"
                            >
                            @error('other_grade')
                                <span class="invalid-feedback" role="alert">
                                <small>{{ $message }}</small>
                                </span>
                            @enderror
                        </div>

                        <div class="text-warning font-bold mb-3">
                            Dates Attended
                        </div>

                        <div class="form-group mb-3 row">
                            <div class="col">
                                <label class="form-label" for="start_date">Entry Date</label>
                                <input
                                    id="start_date"
                                    type="month"
                                    class="form-control form-input input-round @error('start_date') is-invalid @enderror"
                                    name="start_date"
                                    value="{{ old('start_date') }}"
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
                                <label class="form-label" for="end_date">Finish Date</label>
                                <input
                                    id="end_date"
                                    type="month"
                                    class="form-control form-input input-round @error('end_date') is-invalid @enderror"
                                    name="end_date"
                                    value="{{ old('end_date') }}"
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
                        
                        <div class="form-group mb-3" id="addMore">
                            <button type="submit" class="submit__btn text-warning font-bold btn btn-clear">
                                <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em"
                                    fill="currentColor" viewBox="0 0 16 16"
                                    class="bi bi-plus-circle fs-4"
                                    style="color: var(--bs-yellow);font-weight: bold;border-width: 2px;">
                                    <path
                                        d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z">
                                    </path>
                                    <path
                                        d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z">
                                    </path>
                                </svg>
                                Add
                            </button>
                        </div>

                        <div class="form-group mb-3" id="tertiary_institution-check">
                            <label class="form-label">Do you have any professional qualification?</label><br>
                            <div class="form-check form-check-inline">
                                <input
                                    class="form-check-input"
                                    type="radio"
                                    name="professional_qualification"
                                    id="yes"
                                    value="1"
                                    required
                                    @if ($cv)
                                        {{ $cv->professional_qualification == '1' ? 'checked' : '' }}   
                                    @else
                                        {{ old('professional_qualification') == '1' ? 'checked' : '' }}
                                    @endif
                                >
                                <label class="form-check-label" for="yes">Yes</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input
                                    class="form-check-input"
                                    type="radio"
                                    name="professional_qualification"
                                    id="no"
                                    value="0"
                                    required
                                    @if ($cv)
                                    {{ $cv->professional_qualification == '0' ? 'checked' : '' }}   
                                    @else
                                        {{ old('professional_qualification') == '0' ? 'checked' : '' }}
                                    @endif
                                >
                                <label class="form-check-label" for="no">no</label>
                            </div>
                        </div>
                     
                        <div class="d-flex mt-4" >
                            <a href="{{ route('cv.secondary-education', $cv['uuid']) }}" id="previousBtn" class="submit__btn btn btn-light btn-outline-secondary px-4 font-bold mx-2">Prev</a>
                            <a
                                href="{{ $cv->professional_qualification == 1 ? route('cv.professional-qualification', $cv['uuid']) : route('cv.employement_history', [$cv['uuid'], $cv->employment_status ? 'current' : 'previous']) }}"
                                id="nextForm"
                                class="submit__btn btn btn-warning px-4 font-bold mx-2 @if(!$cv->tertiary_educations->count())  disabled @endif"
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

        const tertiary_institution_check = $('#tertiary_institution-check');
        const other_tertiary_institution = $('#other_tertiary_institution-container');
        const other_tertiary_institution_type = $('#other_tertiary_institution_type-container');
        const other_qualifiation_obtained = $('#other_qualifiation_obtained-container');
        const other_course_type = $('#other_course_type-container');
        const other_course = $('#other_course-container');
        const other_grade = $('#other_grade-container');
        const start_date = $('#start_date');
        const end_date = $('#end_date'); 
        const updateData = $('#update');
        
        updateData.hide()
        other_tertiary_institution.hide()
        other_tertiary_institution_type.hide()
        other_qualifiation_obtained.hide();
        other_course_type.hide();
        other_course.hide();
        other_grade.hide();

        function fetchInstitutionsByType(type) {
            $('#select-name_of_institution').select2({
                placeholder: 'Select and begin typing',
                ajax: {
                    url: '/api/tertiray-institutions/' + type,
                    delay: 250,
                    cache: true,
                    data: function (params) {
                        return {
                            search: params.term,
                        }
                    },
                    processResults: function (result) {
                        return {
                            results: result.map(function (institution) {
                                window.institutionsMap[institution.id] = institution
                                return {
                                    id: institution.id,
                                    text: institution.name,
                                }
                            })
                        }
                    },
                }
            });
        }

        function fetchInstitutions() {
            $('#select-name_of_institution').select2({
                placeholder: 'Select and begin typing',
                ajax: {
                url: '{{ route('tertiray.list') }}',
                delay: 250,
                    cache: true,
                    data: function (params) {
                        return {
                            search: params.term,
                        }
                    },
                    processResults: function (result) {
                        return {
                            results: result.map(function (institution) {
                                window.institutionsMap[institution.id] = institution
                                return {
                                    id: institution.id,
                                    text: institution.name,
                                }
                            })
                        }
                    },
                }
            });
        }
            
        $('#select-type_of_institution').on('change', function () {
            if(this.value === 'others') {
                other_tertiary_institution_type.show(500);
                fetchInstitutions();
            } else {
                other_tertiary_institution_type.hide(500);
                fetchInstitutionsByType(this.value)
            }
        });

        $('#select-name_of_institution').on('change', function () {
            if(this.value === 'others') {
                other_tertiary_institution.show(500)
            } else {
                other_tertiary_institution.hide(500)
            }
        });

        $('#select-qualification').on('change', function () {
            if(this.value === 'others') {
                other_qualifiation_obtained.show(500)
            } else {
                other_qualifiation_obtained.hide(500)
            }
        });

        $('#select-course_type').on('change', function () {
            if(this.value === 'others') {
                other_course_type.show(500)
            } else {
                other_course_type.hide(500)
            }
        });

        $('#select-course').on('change', function () {
            if(this.value === 'others') {
                other_course.show(500)
            } else {
                other_course.hide(500)
            }
        });

        $('#select-grade').on('change', function () {
            if(this.value === 'others') {
                other_grade.show(500)
            } else {
                other_grade.hide(500)
            }
        });

        $('#nextForm').click(function(e) {
            confirmAction(e);
        });

        $('#previousBtn').click(function(e) {
            confirmAction(e);
        });

        function confirmAction(e) {
            if($('#select-name_of_institution').val() != 'null') {
                window.location = $(this).attr('href');
            } else {
                e.preventDefault();
                if(confirm('Changes you made may not be saved')) {
                    window.location = $(this).attr('href');
                }
            }
        }

        });
    </script>

@endpush
