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
                <x-multi-stepper step="3" />
            </section>
            <section>
                <div class="">
                    <form
                        action="{{ route('cv.secondary-education.create', $cv['uuid']) }}"
                        method="post"
                        class="col-12 col-lg-8 mx-auto my-4 bg-white p-5 shadow rounded"
                        id="secondary_education_form"
                    >
                        @csrf
                        <div class="text-left mb-3">
                            <p class="font-bold text-dark m-0 p-0">Secondary Education</p>
                            <small class="font-bold text-warning">Please provide the following information</small>
                        </div>

                        <div class="d-flex flex-wrap mb-2">
                            @foreach ($cv->secondary_educations as $secondary_education)
                                <div class="col col-lg-6">
                                    <div class="w-100 secondary_data m-2 p-2">
                                        <div class="d-flex justify-content-between p-2 bg-warning text-dark">
                                            <div class=" ">
                                                <span class="font-bold">
                                                    {{ Str::limit($secondary_education->name, 30) }} <small>({{ $secondary_education->qualification->name }})</small>
                                                </span>
                                                <br>
                                                <small class="">
                                                    {{ $secondary_education->start_date }} to {{ $secondary_education->end_date }}
                                                </small>
                                            </div>
                                            <div class="secondary_data-action mx-3">
                                                <div class="d-flex flex-column">
                                                    <span class="cursor-pointer mx-2">
                                                        <i
                                                            class="fa fa-edit text-dark edit-secondary-data"
                                                            data-education="{{ $secondary_education }}"
                                                            data-cv="{{ $cv }}"
                                                            data-toggle="tooltip"
                                                            title="Edit Data"></i>
                                                    </span>
                                                    <span class="cursor-pointer mx-2">
                                                        <a
                                                            href="{{ route('cv.secondary-education.delete', [$cv['uuid'], $secondary_education['id']]) }}"
                                                            data-toggle="tooltip"
                                                            title="Delete Data"
                                                            class="text-danger"
                                                        >
                                                            <i class="fa fa-trash text-danger delete-secondary-data"></i>
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
                            <label class="form-label" for="no_of_secondary_school">How many secondary schools did you attend?</label>
                            <input
                                id="no_of_secondary_school"
                                type="number"
                                class="form-control input-round @error('no_of_secondary_school') is-invalid @enderror"
                                name="no_of_secondary_school"
                                value="{{ old('no_of_secondary_school', $cv->no_of_secondary_school ?? '') }}"
                                placeholder="No of secondary school"
                                required
                                {{ $cv->no_of_secondary_school ? 'readonly' : '' }}
                            >
                            @error('no_of_secondary_school')
                                <span class="invalid-feedback" role="alert">
                                    <small>{{ $message }}</small>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group mb-3">
                            <label class="form-label" for="name_of_secondary_school">Name of Secondary School</label>
                            <input
                                id="name_of_secondary_school"
                                type="text"
                                class="form-control input-round @error('name') is-invalid @enderror"
                                name="name"
                                value="{{ old('name') }}"
                                placeholder="Name of secondary school"
                                required
                            >
                            @error('name_of_secondary_school')
                                <span class="invalid-feedback" role="alert">
                                <small>{{ $message }}</small>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group mb-3 row">
                            <div class="col">
                                <label class="form-label" for="start_date">Start Date</label>
                                <input
                                    id="start_date"
                                    type="date"
                                    class="form-control input-round @error('start_date') is-invalid @enderror"
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
                                <label class="form-label" for="end_date">End Date</label>
                                <input
                                    id="end_date"
                                    type="date"
                                    class="form-control input-round @error('end_date') is-invalid @enderror"
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
                            <select class="form-select" name="qualification" id="select-qualification" required data-live-search="true">
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
                            <label class="form-label">Did you attend or are you attending a Tertiary Institution?</label><br>
                            <div class="form-check form-check-inline">
                                <input
                                    class="form-check-input @if($cv->tertiary_institution) disabled @endif"
                                    type="radio"
                                    name="tertiary_institution"
                                    id="yes"
                                    value="1"
                                    required
                                    @if ($cv)
                                        {{ $cv->tertiary_institution == '1' ? 'checked' : '' }}   
                                    @else
                                        {{ old('tertiary_institution') == '1' ? 'checked' : '' }}
                                    @endif
                                >
                                <label class="form-check-label" for="yes">Yes</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input
                                    class="form-check-input @if($cv->tertiary_institution) disabled @endif"
                                    type="radio"
                                    name="tertiary_institution"
                                    id="no"
                                    value="0"
                                    required
                                    @if ($cv)
                                        {{ $cv->tertiary_institution == '0' ? 'checked' : '' }}   
                                    @else
                                        {{ old('tertiary_institution') == '0' ? 'checked' : '' }}
                                    @endif
                                >
                                <label class="form-check-label" for="no">no</label>
                            </div>
                        </div>

                        <div>
                            <div class="form-group mb-3" id="addMore">
                                <button type="submit" class="text-warning font-bold btn btn-clear">
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
                                <button type="submit" class="text-warning font-bold btn btn-clear">
                                    <i class="fa fa-check"></i>
                                    Update
                                </button>
                            </div>
                        </div>

                        <div class="d-flex mt-4" >
                            <a href="{{ route('cv.contact-details', $cv['uuid']) }}" id="previousBtn" class="btn btn-light btn-outline-secondary px-4 font-bold mx-2">Prev</a>
                            <a
                                href="{{ $cv->tertiary_institution == 1 ? route('cv.tertiary-institution', $cv['uuid']) : route('cv.employment-history', $cv['uuid']) }}"
                                id="nextForm"
                                class="btn btn-warning px-4 font-bold mx-2 @if(!$cv->secondary_educations->count()) disabled-link disabled @endif"
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
<style>
    .secondary_data-action {
        display: none
    }
    .secondary_data:hover .secondary_data-action {
        display: block;
    }
  
</style>

@endsection
@push('javascript')
    <script>
        $(document).ready(function () {

            const name_of_secondary_school = $('#name_of_secondary_school');
            const addMore = $('#addMore');
            const updateData = $('#update');
            const tertiary_institution_check = $('#tertiary_institution-check');
            const start_date = $('#start_date');
            const end_date = $('#end_date');

            updateData.hide()
            
            $('#start_date').change(function(e) {
                var date = new Date($(this).val());
                $('#end_date').attr('min', $(this).val())
            });

            $('#nextForm').click(function(e) {
                var href = $(this).attr('href');
                e.preventDefault();
                if(name_of_secondary_school.val().length > 3) {
                    if(confirm('Changes you made may not be saved')) {
                        window.location = href;
                    }
                } else {
                    window.location = href;
                };
            });

            $('#previousBtn').click(function(e) {
                var href = $(this).attr('href');
                e.preventDefault();
                if(confirm('Changes you made may not be saved')) {
                    window.location = href;
                }
            });

            $('.edit-secondary-data').click(function(e) {
                updateData.show(500)
                addMore.hide(500)
                tertiary_institution_check.hide(500)
              
                const data = $(this).data('education');
                const cv = $(this).data('cv');
                const form_action = '/cv/'+cv.uuid+'/secondary-education/'+data.id

                if(name_of_secondary_school.val().length > 3) {
                    if(confirm('Changes you made may not be saved')) {
                        handleUpdateData(data);
                    }
                } else  {
                    handleUpdateData(data);
                };

                function handleUpdateData(data) {
                    $('#secondary_education_form').attr('action', form_action);
                    name_of_secondary_school.val(data.name);
                    start_date.val(data.start_date);
                    end_date.val(data.end_date);
                    $('#select-qualification').val(data.qualification.id).change();
                };
            });
        });
    </script>
@endpush