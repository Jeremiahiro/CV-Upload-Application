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
                        action="{{ route('cv.tertiary-institution.update', [$cv['uuid'], $tertiary_education['id']]) }}"
                        method="post"
                        class="col-12 col-lg-8 mx-auto my-4 bg-white p-5 shadow rounded"
                        onsubmit="$('.submit__btn').attr('disabled', true)"
                        id="tertiary_education_form"
                    >
                        @csrf
                        <div class="text-left mb-4">
                            <p class="font-bold text-dark m-0 p-0">Tertiary Institutions</p>
                            <small class="font-bold text-warning">Please update the following information</small>
                        </div>

                        @if ($tertiary_education->tertiary_types_id)
                        <div class="form-group mb-3">
                            <x-tertiary-type-select-field
                                :required="true"
                                :selected="$tertiary_education->tertiary_type"
                            />
 
                             @error('type_of_institution')
                                 <span class="invalid-feedback" role="alert">
                                 <small>{{ $message }}</small>
                                 </span>
                             @enderror
                        </div>
                        @else
                        <div class="form-group mb-3" id="other_tertiary_institution_type-container">
                             <label class="form-label" for="other_tertiary_institution_type">Type of Tertiary Institution</label>
                             <input
                                 id="other_tertiary_institution_type"
                                 type="text"
                                 class="form-control form-input input-round @error('other_tertiary_institution_type') is-invalid @enderror"
                                 name="other_tertiary_institution_type"
                                 value="{{ old('other_tertiary_institution_type', $tertiary_education->other_tertiary_type ?: '') }}"
                                 placeholder="Other Institution Type"
                             >
                             @error('other_tertiary_institution_type')
                                 <span class="invalid-feedback" role="alert">
                                 <small>{{ $message }}</small>
                                 </span>
                             @enderror
                        </div>
                        @endif

                        @if ($tertiary_education->tertiary_institutions_id)
                        <div class="form-group mb-3">
                            <x-tertiary-select-field
                                 :required="true"
                                 :selected="$tertiary_education->institution"
                                 :typeid="$tertiary_education->tertiary_types_id"
                             />
 
                             @error('name_of_institution')
                                 <span class="invalid-feedback" role="alert">
                                 <small>{{ $message }}</small>
                                 </span>
                             @enderror
                         </div>
                        @else
                        <div class="form-group mb-3" id="other_tertiary_institution-container">
                            <label class="form-label" for="other_tertiary_institution">Name of Tertiary Institution</label>
                            <input
                                id="other_tertiary_institution"
                                type="text"
                                class="form-control form-input input-round @error('other_tertiary_institution') is-invalid @enderror"
                                name="other_tertiary_institution"
                                value="{{ old('other_tertiary_institution', $tertiary_education->other_tertiary_institution ?: '') }}"
                                placeholder="Other Institution"
                            >
                            @error('other_tertiary_institution')
                                <span class="invalid-feedback" role="alert">
                                <small>{{ $message }}</small>
                                </span>
                            @enderror
                        </div>
                        @endif

                        @if ($tertiary_education->tertiary_qualification_types_id)
                        <div class="form-group mb-3">
                            <x-tertiary-qualification-select-field :required="true" :selected="$tertiary_education->qualification_type" />
 
                             @error('qualification')
                                 <span class="invalid-feedback" role="alert">
                                 <small>{{ $message }}</small>
                                 </span>
                             @enderror
                        </div>
                        @else
                        <div class="form-group mb-3" id="other_qualifiation_obtained-container">
                            <label class="form-label" for="other_qualifiation_obtained">Type of Qualification</label>
                            <input
                                id="other_qualifiation_obtained"
                                type="text"
                                class="form-control form-input input-round @error('other_qualifiation_obtained') is-invalid @enderror"
                                name="other_qualifiation_obtained"
                                value="{{ old('other_qualifiation_obtained', $tertiary_education->other_tertiary_qualification_type ?: '') }}"
                                placeholder="Other qualification"
                            >
                            @error('other_qualifiation_obtained')
                                <span class="invalid-feedback" role="alert">
                                <small>{{ $message }}</small>
                                </span>
                            @enderror
                        </div>
                        @endif

                        @if ($tertiary_education->tertiary_course_types_id)
                        <div class="form-group mb-3">
                            <x-tertiary-course-type-select-field :required="true" :selected="$tertiary_education->tertiary_course_type"/>
 
                             @error('course_type')
                                 <span class="invalid-feedback" role="alert">
                                 <small>{{ $message }}</small>
                                 </span>
                             @enderror
                        </div>
                        @else
                        <div class="form-group mb-3" id="other_course_type-container">
                            <label class="form-label" for="other_course_type">Course Type</label>
                            <input
                                id="other_course_type"
                                type="text"
                                class="form-control form-input input-round @error('other_course_type') is-invalid @enderror"
                                name="other_course_type"
                                value="{{ old('other_course_type', $tertiary_education->other_tertiary_course_type ?: '') }}"
                                placeholder="Other Course Type"
                            >
                            @error('other_course_type')
                                <span class="invalid-feedback" role="alert">
                                <small>{{ $message }}</small>
                                </span>
                            @enderror
                        </div>
                        @endif

                        @if ($tertiary_education->tertiary_courses_id)
                        <div class="form-group mb-3">
                            <x-tertiary-course-select-field :required="true" :selecte="$tertiary_education->tertiary_course" />
 
                             @error('course')
                                 <span class="invalid-feedback" role="alert">
                                 <small>{{ $message }}</small>
                                 </span>
                             @enderror
                        </div>
                        @else
                        <div class="form-group mb-3" id="other_course-container">
                            <label class="form-label" for="other_course">Course of Study</label>
                            <input
                                id="other_course"
                                type="text"
                                class="form-control form-input input-round @error('other_course') is-invalid @enderror"
                                name="other_course"
                                value="{{ old('other_course', $tertiary_education->other_tertiary_course_type ?: '') }}"
                                placeholder="Specify Other Course of Study"
                            >
                            @error('other_course')
                                <span class="invalid-feedback" role="alert">
                                <small>{{ $message }}</small>
                                </span>
                            @enderror
                        </div>
                        @endif

                        @if ($tertiary_education->tertiary_courses_id)
                        <div class="form-group mb-3">
                            <x-tertiary-grade-select-field :required="true" :selected="$tertiary_education->qualification" />
 
                             @error('grade')
                                 <span class="invalid-feedback" role="alert">
                                 <small>{{ $message }}</small>
                                 </span>
                             @enderror
                        </div>
                        @else
                        <div class="form-group mb-3" id="other_grade-container">
                            <label class="form-label" for="other_grade">Grade of Qualification</label>
                            <input
                                id="other_grade"
                                type="text"
                                class="form-control form-input input-round @error('other_grade') is-invalid @enderror"
                                name="other_grade"
                                value="{{ old('other_grade', $tertiary_education->other_tertiary_qualification ?: '') }}"
                                placeholder="Specify Other Grade"
                            >
                            @error('other_grade')
                                <span class="invalid-feedback" role="alert">
                                <small>{{ $message }}</small>
                                </span>
                            @enderror
                        </div>
                        @endif
                        

                        <div class="text-warning font-bold mb-3">
                            Dates Attended
                        </div>

                        <div class="form-group mb-3 row">
                            <div class="col">
                                <label class="form-label" for="start_date">Entry Date</label>
                                <input
                                    id="start_date"
                                    type="text"
                                    class="form-control form-input input-round @error('start_date') is-invalid @enderror"
                                    name="start_date"
                                    value="{{ old('start_date', date('F Y', strtotime($tertiary_education->start_date)) ?: '') }}"
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
                                    type="text"
                                    class="form-control form-input input-round @error('end_date') is-invalid @enderror"
                                    name="end_date"
                                    value="{{ old('end_date', date('F Y', strtotime($tertiary_education->end_date)) ?: '') }}"
                                    max="{{ now()->toDateString('M-Y') }}"
                                    required
                                >
                                
                                @error('end_date')
                                    <span class="invalid-feedback" role="alert">
                                        <small>{{ $message }}</small>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group mb-3" id="update">
                            <button type="submit" class="submit__btn text-warning font-bold btn btn-clear">
                                <i class="fa fa-check"></i>
                                Update
                            </button>
                        </div>

                        <div class="d-flex mt-4" >
                            <a href="{{ route('cv.tertiary-institution', $cv['uuid']) }}" id="previousBtn" class="submit__btn btn btn-light btn-outline-secondary px-4 font-bold mx-2">Prev</a>
                            <a
                                href="{{ $cv->professional_qualification == 1 ? route('cv.professional-qualification', $cv['uuid']) : route('cv.employement_history', [$cv['uuid'], $cv->employment_status ? 'current' : 'previous']) }}"
                                id="nextForm"
                                class="submit__btn btn btn-warning px-4 font-bold mx-2 @if(!$cv->tertiary_educations->count()) disabled-link disabled @endif"
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

            const other_tertiary_institution = $('#other_tertiary_institution-container');
            const other_tertiary_institution_type = $('#other_tertiary_institution_type-container');
            const other_qualifiation_obtained = $('#other_qualifiation_obtained-container');
            const other_course_type = $('#other_course_type-container');
            const other_course = $('#other_course-container');
            const other_grade = $('#other_grade-container');
            const start_date = $('#start_date');
            const end_date = $('#end_date'); 
            const addMore = $('#addMore');
            
            other_tertiary_institution.hide()
            other_tertiary_institution_type.hide()
            other_qualifiation_obtained.hide();
            other_course_type.hide();
            other_course.hide();
            other_grade.hide();

            const tertiary_education = {!! $tertiary_education !!};

            if(tertiary_education.tertiary_institutions_id == null) {
                other_tertiary_institution.show(500)
                $('#select-type_of_institution').val('others').change();
            } else {
                other_tertiary_institution.hide(500)
            }

            if(tertiary_education.tertiary_types_id == null) {
                other_tertiary_institution_type.show(500)
                $("#select-name_of_institution").select2("val", "others");
                // $('#select-name_of_institution').val('others').change();
            } else {
                other_tertiary_institution_type.hide(500)
            }

            if(tertiary_education.tertiary_qualification_types_id == null) {
                $('#select-qualification').val('others').change();
                other_qualifiation_obtained.show(500)
            } else {
                other_qualifiation_obtained.hide(500)
            }

            if(tertiary_education.tertiary_course_types_id == null) {
                $('#select-course_type').val('others').change();
                other_course_type.show(500)
            } else {
                other_course_type.hide(500)
            }

            if(tertiary_education.tertiary_courses_id == null) {
                $('#select-course').val('others').change();
                other_course.show(500)
            } else {
                other_course.hide(500)
            }

            if(tertiary_education.tertiary_qualifications_id == null) {
                $('#select-grade').val('others').change();
                other_grade.show(500)
            } else {
                other_grade.hide(500)
            }

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

            $('#start_date').focus(function(e) {
                $(this).attr('type','month');
            });

            $('#end_date').focus(function(e) {
                $(this).attr('type','month');
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
