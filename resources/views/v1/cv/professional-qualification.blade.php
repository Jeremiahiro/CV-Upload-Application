@extends('v1.layouts.app')
@section('title')
Qualifications
@endsection
@section('main')

<div class="d-flex flex-column bg-light" id="content-wrapper">
    <div id="content">
        <x-top-nav title="Add CV" />

        <div class="container-fluid bg-light">
            <section>
                <x-multi-stepper step="5" :cv="$cv" />
            </section>
            <section>
                <div class="">
                    <form
                        action="{{ route('cv.professional-qualification.create', $cv['uuid']) }}"
                        method="post"
                        class="col-12 col-lg-8 mx-auto my-4 bg-white p-5 shadow rounded"
                        onsubmit="$('.submit__btn').attr('disabled', true)"
                        id="tertiary_education_form"
                    >
                        @csrf
                        <div class="text-left mb-4">
                            <p class="font-bold text-dark m-0 p-0">Professional Qualification</p>
                            <small class="font-bold text-warning">Please provide the following information</small>
                        </div>

                        <div class="d-flex flex-wrap mb-2">
                            @foreach ($professional_qualifications as $qualification)
                                <div class="col col-lg-6 mb-2">
                                    <div class="w-100 data">
                                        <div class="m-2 d-flex justify-content-between p-2 bg-warning text-dark">
                                            <div class=" ">
                                                <span class="font-bold">
                                                    {{ Str::limit($qualification->name, 30) }} 
                                                    <br />
                                                    <small>({{ $qualification->qualification->name ?? $qualification->other_qualification_type }})</small>
                                                </span>
                                                <br>
                                                <small class="">
                                                    {{ $qualification->date }}
                                                </small>
                                            </div>
                                            <div class="data__action mx-3">
                                                <div class="d-flex flex-column">
                                                    <span class="cursor-pointer mx-2">
                                                        <i
                                                            class="fa fa-edit text-dark edit-qualification-data"
                                                            data-education="{{ $qualification }}"
                                                            data-cv="{{ $cv }}"
                                                            data-toggle="tooltip"
                                                            title="Edit Data"></i>
                                                    </span>
                                                    <span class="cursor-pointer mx-2">
                                                        <a
                                                            href="{{ route('cv.professional-qualification.delete', [$cv['uuid'], $qualification['id']]) }}"
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

                        <div class="form-group mb-3">
                            <label class="form-label" for="name_of_qualification">Name of Qualification</label>
                            <input
                                id="name_of_qualification"
                                type="text"
                                class="form-control form-input input-round @error('name_of_qualification') is-invalid @enderror"
                                name="name_of_qualification"
                                value="{{ old('name_of_qualification') }}"
                                placeholder="Name of Qualification"
                                required
                            >

                            @error('name_of_qualification')
                                <span class="invalid-feedback" role="alert">
                                <small>{{ $message }}</small>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group mb-3">
                            <label class="form-label" for="type_of_qualification">Type of Qualification</label>
                            <select class="form-select form-input" name="type_of_qualification" id="select-type_of_qualification" required data-live-search="true">
                                <option value="" selected disabled>Type of Qualification</option>
                                @foreach ($qualification_types as $type)
                                    <option
                                        value="{{ $type->id }}"
                                        @if (old('type_of_qualification') == $type->id)
                                            selected
                                        @endif
                                    >
                                        {{ $type->name }}
                                    </option>
                                @endforeach
                                <option value="others">Others</option>
                            </select>

                            @error('type_of_qualification')
                                <span class="invalid-feedback" role="alert">
                                <small>{{ $message }}</small>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group mb-3" id="other_qualification_type-container">
                            <label class="form-label" for="other_qualification_type">If others please specify type of qualification here</label>
                            <input
                                id="other_qualification_type"
                                type="text"
                                class="form-control form-input input-round @error('other_qualification_type') is-invalid @enderror"
                                name="other_qualification_type"
                                value="{{ old('other_qualification_type') }}"
                                placeholder="Other Qualification Type"
                            >
                            @error('other_qualification_type')
                                <span class="invalid-feedback" role="alert">
                                <small>{{ $message }}</small>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group mb-3">
                            <label class="form-label" for="qualification_date">Date qualification obtained</label>
                            <input
                                id="qualification_date"
                                type="date"
                                class="form-control form-input input-round @error('qualification_date') is-invalid @enderror"
                                name="qualification_date"
                                value="{{ old('qualification_date') }}"
                                max="{{ now()->toDateString('Y-m-d') }}"
                                required
                            >
                            
                            @error('qualification_date')
                                <span class="invalid-feedback" role="alert">
                                    <small>{{ $message }}</small>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group mb-3">
                            <label class="form-label" for="awarding_institution">Awarding Institution</label>
                            <select class="form-select form-input" name="awarding_institution" id="select-awarding_institution" required data-live-search="true">
                                <option value="" selected disabled>Type of Qualification</option>
                                @foreach ($awarding_institutions as $institution)
                                    <option
                                        value="{{ $institution->id }}"
                                        @if (old('awarding_institution') == $institution->id)
                                            selected
                                        @endif
                                    >
                                        {{ $institution->name }}
                                    </option>
                                @endforeach
                                <option value="others">Others</option>
                            </select>

                            @error('awarding_institution')
                                <span class="invalid-feedback" role="alert">
                                <small>{{ $message }}</small>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group mb-3" id="other_awarding_institution-container">
                            <label class="form-label" for="other_awarding_institution">If others please specify awarding institution</label>
                            <input
                                id="other_awarding_institution"
                                type="text"
                                class="form-control form-input input-round @error('other_awarding_institution') is-invalid @enderror"
                                name="other_awarding_institution"
                                value="{{ old('other_awarding_institution') }}"
                                placeholder="Other Qualification Type"
                            >
                            @error('other_awarding_institution')
                                <span class="invalid-feedback" role="alert">
                                <small>{{ $message }}</small>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group mb-3" id="nysc-check">
                            <label class="form-label">Have you completed NYSC?</label><br>
                            <div class="form-check form-check-inline">
                                <input
                                    class="form-check-input"
                                    type="radio"
                                    name="nysc_check"
                                    id="yes"
                                    value="1"
                                    required
                                    @if ($cv)
                                        {{ $cv->professional_qualification == '1' ? 'checked' : '' }}   
                                    @else
                                        {{ old('nysc_check') == '1' ? 'checked' : '' }}
                                    @endif
                                >
                                <label class="form-check-label" for="yes">Yes</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input
                                    class="form-check-input"
                                    type="radio"
                                    name="nysc_check"
                                    id="no"
                                    value="0"
                                    required
                                    @if ($cv)
                                    {{ $cv->professional_qualification == '0' ? 'checked' : '' }}   
                                    @else
                                        {{ old('nysc_check') == '0' ? 'checked' : '' }}
                                    @endif
                                >
                                <label class="form-check-label" for="no">no</label>
                            </div>
                        </div>

                        <div>
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
                            <div class="form-group mb-3" id="update">
                                <button type="submit" class="submit__btn text-warning font-bold btn btn-clear">
                                    <i class="fa fa-check"></i>
                                    Update
                                </button>
                            </div>
                        </div>

                        <div class="d-flex mt-4" >
                            <a
                                href="{{ $cv->tertiary_institution ? route('cv.tertiary-institution', $cv['uuid']) : route('cv.secondary-education', $cv['uuid']) }}" id="previousBtn" class="submit__btn btn btn-light btn-outline-secondary px-4 font-bold mx-2">Prev</a>
                            <a
                                href="{{ $cv->completed_nysc == 1 ? route('cv.nysc_details', $cv['uuid']) : route('cv.employement_history', [$cv['uuid'], 'current']) }}"
                                id="nextForm"
                                class="submit__btn btn btn-warning px-4 font-bold mx-2 @if(!$professional_qualifications->count()) disabled @endif"
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

            const other_qualification_type = $('#other_qualification_type-container');
            const other_awarding_institution = $('#other_awarding_institution-container');
            const addMore = $('#addMore');
            const updateData = $('#update');

            updateData.hide()
            other_qualification_type.hide()
            other_awarding_institution.hide()

            $('#select-type_of_qualification').on('change', function () {
                if(this.value === 'others') {
                    other_qualification_type.show(500)
                } else {
                    other_qualification_type.hide(500)
                }
            });

            $('#select-awarding_institution').on('change', function () {
                if(this.value === 'others') {
                    other_awarding_institution.show(500)
                } else {
                    other_awarding_institution.hide(500)
                }
            });

            $('.edit-qualification-data').click(function(e) {
                updateData.show(500)
                addMore.hide(500)
                $('#nysc-check').hide(500)
              
                const data = $(this).data('education');
                const cv = $(this).data('cv');
                const form_action = '/cv/'+cv.uuid+'/professional-qualification/'+data.id

                if(confirm('Changes you made may not be saved')) {
                    handleUpdateData(data);
                }

                function handleUpdateData(data) {
                    var qualification_type = 'others';
                    if(data.professional_qualifications_id != null) {
                        qualification_type = data.qualification.id;
                    }

                    var institution_type = 'others';
                    if(data.professional_institutions_id != null) {
                        institution_type = data.awarding_institution.id;
                    }

                    $('#tertiary_education_form').attr('action', form_action);
                    $('#name_of_qualification').val(data.name);
                    $('#select-type_of_qualification').val(qualification_type).change();
                    $('#select-awarding_institution').val(institution_type).change();
                    $('#qualification_date').val(data.date);

                    start_date.val(data.start_date);
                    end_date.val(data.end_date);
                    if(qualification_type == 'others') {
                        $('#other_qualification_type').val(data.other_qualification_type);
                    }
                    if(institution_type == 'others') {
                        $('#other_awarding_institution').val(data.other_institutions_type);
                    }
                };
            });

            $('#nextForm').click(function(e) {
                confirmAction(e);
            });

            $('#previousBtn').click(function(e) {
                confirmAction(e);
            });

            function confirmAction(e) {
                if($('#name_of_qualification').val().length < 1) {
                    window.location = $(this).attr('href');
                } else {
                    var href = $(this).attr('href');
                    e.preventDefault();
                    if(confirm('Changes you made may not be saved')) {
                        window.location = href;
                    }
                }
            }

        });
    </script>

@endpush