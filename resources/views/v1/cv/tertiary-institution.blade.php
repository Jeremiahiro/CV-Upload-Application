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
                <x-multi-stepper step="4" />
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

                        <div class="d-flex flex-wrap mb-2">
                            @foreach ($tertiary_educations as $tertiary_education)
                                <div class="col col-lg-6">
                                    <div class="w-100 data m-2 p-2">
                                        <div class="d-flex justify-content-between p-2 bg-warning text-dark">
                                            <div class=" ">
                                                <span class="font-bold">
                                                    {{ Str::limit($tertiary_education->institution->name, 30) }} 
                                                    <br />
                                                    <small>({{ $tertiary_education->institution_type->name ?? $tertiary_education->other_type }})</small>
                                                </span>
                                                <br>
                                                <small class="">
                                                    {{ $tertiary_education->start_date }} to {{ $tertiary_education->end_date }}
                                                </small>
                                            </div>
                                            <div class="data__action mx-3">
                                                <div class="d-flex flex-column">
                                                    <span class="cursor-pointer mx-2">
                                                        <i
                                                            class="fa fa-edit text-dark edit-tertiary-data"
                                                            data-education="{{ $tertiary_education }}"
                                                            data-cv="{{ $cv }}"
                                                            data-toggle="tooltip"
                                                            title="Edit Data"></i>
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

                        <div class="form-group mb-3">
                            <label class="form-label" for="name_of_institution">Name of Tertiary Institution</label>
                            <select class="form-select form-input" name="name_of_institution" id="select-name_of_institution" required data-live-search="true">
                                <option value="" selected disabled>Tertiary Institution</option>
                                @foreach ($tertiary_types as $type)
                                    <option value="" class="font-bold text-uppercase" disabled>{{ $type->name }}</option>
                                    @foreach ($type->institutions as $institution)
                                        <option
                                            value="{{ $institution->id }}"
                                            data-type={{ $institution->type->id }}
                                            @if (old('name_of_institution') == $institution->id)
                                                selected
                                            @endif
                                        >
                                            {{ $institution->name }}
                                        </option>
                                    @endforeach
                                @endforeach
                            </select>

                            @error('name_of_institution')
                                <span class="invalid-feedback" role="alert">
                                <small>{{ $message }}</small>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group mb-3">
                            <label class="form-label" for="type_of_institution">Type of Tertiary Institution</label>
                            <select class="form-select form-input" name="type_of_institution" id="select-type_of_institution" required data-live-search="true">
                                <option value="" selected disabled>Type of Institution</option>
                                @foreach ($tertiary_types as $type)
                                    <option
                                        value="{{ $type->id }}"
                                        @if (old('type_of_institution') == $type->id)
                                            selected
                                        @endif
                                    >
                                        {{ $type->name }}
                                    </option>
                                @endforeach
                                <option value="others">Others</option>
                            </select>

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

                        <div class="text-warning font-bold mb-3">
                            Dates Attended
                        </div>

                        <div class="form-group mb-3 row">
                            <div class="col">
                                <label class="form-label" for="start_date">Entry Date</label>
                                <input
                                    id="start_date"
                                    type="date"
                                    class="form-control form-input input-round @error('start_date') is-invalid @enderror"
                                    name="start_date"
                                    value="{{ old('start_date') }}"
                                    max="{{ now()->toDateString('Y-m-d') }}"
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
                                    type="date"
                                    class="form-control form-input input-round @error('end_date') is-invalid @enderror"
                                    name="end_date"
                                    value="{{ old('end_date') }}"
                                    max="{{ now()->toDateString('Y-m-d') }}"
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
                            <label class="form-label" for="select-qualification">Qualification Obtained</label>
                            <select class="form-select form-input" name="qualification" id="select-qualification" required data-live-search="true">
                                <option value="" selected disabled>Qualification</option>
                                @foreach ($qualifications as $qualification)
                                    <option
                                        value="{{ $qualification->id }}"
                                        @if (old('qualification') == $qualification->id)
                                            selected
                                        @endif
                                    >
                                        {{ $qualification->name }}
                                    </option>
                                @endforeach
                            </select>
                            
                            @error('qualification')
                                <span class="invalid-feedback" role="alert">
                                <small>{{ $message }}</small>
                                </span>
                            @enderror
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
                            <a href="{{ route('cv.secondary-education', $cv['uuid']) }}" id="previousBtn" class="submit__btn btn btn-light btn-outline-secondary px-4 font-bold mx-2">Prev</a>
                            <a
                                href="{{ $cv->professional_qualification == 1 ? route('cv.professional-qualification', $cv['uuid']) : route('cv.employement_history', $cv['uuid']) }}"
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

            const tertiary_institution_check = $('#tertiary_institution-check');
            const other_tertiary_institution = $('#other_tertiary_institution_type-container');
            const start_date = $('#start_date');
            const end_date = $('#end_date'); 
            const addMore = $('#addMore');
            const updateData = $('#update');

            updateData.hide()
            other_tertiary_institution.hide()

            $('#select-name_of_institution').on('change', function () {
                var type = $(this).children('option:selected').data('type');
                $('#select-type_of_institution').val(type).change();
            });

            $('#select-type_of_institution').on('change', function () {
                var institution = this.value;
                if(institution === 'others') {
                    other_tertiary_institution.show(500)
                } else {
                    other_tertiary_institution.hide(500)
                }
            });

            $('.edit-tertiary-data').click(function(e) {
                updateData.show(500)
                addMore.hide(500)
                tertiary_institution_check.hide(500)
              
                const data = $(this).data('education');
                const cv = $(this).data('cv');
                const form_action = '/cv/'+cv.uuid+'/tertiary-institution/'+data.id

                if(confirm('Changes you made may not be saved')) {
                    handleUpdateData(data);
                }

                function handleUpdateData(data) {
                    var type = 'others';
                    if(data.institution_type != null) {
                        type = data.institution_type.id;
                    }
                    $('#tertiary_education_form').attr('action', form_action);
                    $('#select-name_of_institution').val(data.institution.id).change();
                    $('#select-type_of_institution').val(type).change();
                    $('#select-qualification').val(data.qualification.id).change();
                    start_date.val(data.start_date);
                    end_date.val(data.end_date);
                    if(type == 'others') {
                        $('#other_tertiary_institution_type').val(data.other_type);
                    }
                };
            });

            
            $('#nextForm').click(function(e) {
                var href = $(this).attr('href');
                e.preventDefault();
                if(confirm('Changes you made may not be saved')) {
                    window.location = href;
                }
            });

            $('#previousBtn').click(function(e) {
                var href = $(this).attr('href');
                e.preventDefault();
                if(confirm('Changes you made may not be saved')) {
                    window.location = href;
                }
            });

            function confirmAction(e) {
                var href = $(this).attr('href');
                e.preventDefault();
                if(confirm('Changes you made may not be saved')) {
                    window.location = href;
                }
            }

        });
    </script>

@endpush
