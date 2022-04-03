@extends('v1.layouts.app')
@section('title')
Secondary Education
@endsection
@section('main')

<div class="d-flex flex-column bg-light" id="content-wrapper">
    <div id="content">
        <x-top-nav title="Add CV" />

        <div class="container-fluid bg-light">
            <section>
                <x-multi-stepper step="3" :cv="$cv" />
            </section>
            <section>
                <div class="">
                    <form
                        action="{{ route('cv.secondary-education.create', $cv['uuid']) }}"
                        method="post"
                        class="col-12 col-lg-8 mx-auto my-4 bg-white p-5 shadow rounded"
                        id="secondary_education_form"
                        onsubmit="$('.submit__btn').attr('disabled', true)"
                    >
                        @csrf
                        <div class="text-left mb-3">
                            <p class="font-bold text-dark m-0 p-0">Secondary Education</p>
                            <small class="font-bold text-warning">Please provide the following information</small>
                        </div>

                        <div class="d-flex flex-wrap mb-2">
                            @foreach ($cv->secondary_educations as $secondary_education)
                                <div class="col col-lg-6 mb-2">
                                    <div class="w-100 data">
                                        <div class="m-2 d-flex justify-content-between p-2 bg-warning text-dark">
                                            <div class=" ">
                                                <span class="font-bold">
                                                    {{ Str::limit($secondary_education->name, 30) }}
                                                    <small>({{ $secondary_education->secondary_qualifications_id ? $secondary_education->qualification->name : ($secondary_education->other_qualification ?: 'No Qualification') }})</small>
                                                </span>
                                                <br>
                                                <small class="">
                                                    {{ date('M-Y', strtotime($secondary_education->start_date)) }} to {{ date('M-Y', strtotime($secondary_education->end_date)) }}
                                                </small>
                                            </div>
                                            <div class="data__action mx-3">
                                                <div class="d-flex flex-column">
                                                    <span class="cursor-pointer mx-2">
                                                        <a
                                                            href="{{ route('cv.secondary-education.edit', [$cv['uuid'], $secondary_education['id']]) }}"
                                                            data-toggle="tooltip"
                                                            title="Edit Data"
                                                            class="text-dark"
                                                        >
                                                            <i class="fa fa-edit text-dark edit-secondary-data"></i>
                                                        </a>
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
                                class="form-control form-input input-round @error('no_of_secondary_school') is-invalid @enderror"
                                name="no_of_secondary_school"
                                value="{{ old('no_of_secondary_school', $cv->no_of_secondary_school ?? '') }}"
                                placeholder="No of secondary school"
                                required
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
                                class="form-control form-input input-round @error('name') is-invalid @enderror"
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
                                <label class="form-label" for="end_date">End Date</label>
                                <input
                                    id="end_date"
                                    type="month"
                                    class="form-control form-input input-round @error('end_date') is-invalid @enderror"
                                    name="end_date"
                                    value="{{ old('end_date') }}"
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

                        <div class="form-group mb-3">
                            <x-secondary-qualification-select-field :required="true" />
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

                        <div id="no_of_subjects-container">
                            <div class="form-group mb-3">
                                <label class="form-label" for="other_qualifiation_obtained">
                                    In how many subjects do you have this qualification
                                </label>
                                <input
                                    id="no_of_subjects"
                                    type="number"
                                    class="form-control form-input input-round @error('no_of_subjects') is-invalid @enderror"
                                    name="no_of_subjects"
                                    placeholder="No of Subject"
                                >
                                @error('no_of_subjects')
                                    <span class="invalid-feedback" role="alert">
                                    <small>{{ $message }}</small>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div id="secondary_subjects-container">
                            <div class="table-responsive mb-3">
                                <table class="table">
                                    <thead>
                                      <tr>
                                        <th scope="col">Subject</th>
                                        <th scope="col">Grade</th>
                                      </tr>
                                    </thead>
                                    <tbody>
                                        <x-secondary-subject-fields />
                                    </tbody>
                                  </table>
                            </div>
                        </div>

                        <div>
                            <div class="form-group mb-3" id="addMore">
                                <button
                                    type="submit"
                                    class="submit__btn text-warning font-bold btn btn-clear"
                                >
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

                        <div class="d-flex mt-4" >
                            <a href="{{ route('cv.contact-details', $cv['uuid']) }}" id="previousBtn" class="submit__btn btn btn-light btn-outline-secondary px-4 font-bold mx-2">Prev</a>
                            <a
                                href="{{ $cv->tertiary_institution == 1 ? route('cv.tertiary-institution', $cv['uuid']) : route('cv.employment_history', [$cv['uuid'], $cv->employment_status ? 'current' : 'previous']) }}"
                                id="nextForm"
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
<style>
 
  
</style>

@endsection
@push('javascript')
    <script>
        $(document).ready(function () {

            const name_of_secondary_school = $('#name_of_secondary_school');
            const other_qualifiation_obtained = $('#other_qualifiation_obtained-container');
            const tertiary_institution_check = $('#tertiary_institution-check');
            const no_of_subjects = $('#no_of_subjects-container');
            const secondary_subjects = $('#secondary_subjects-container');
            const addMore = $('#addMore');
            const updateData = $('#update');
            const start_date = $('#start_date');
            const end_date = $('#end_date');
            
            updateData.hide()
            no_of_subjects.hide()
            secondary_subjects.hide()
            other_qualifiation_obtained.hide();

            $('#select-secondary_qualification').on('change', function () {
                other_qualifiation_obtained.hide(500)
                no_of_subjects.hide(500)

                switch (this.value) {
                    case 'others':
                        other_qualifiation_obtained.show(500)
                        no_of_subjects.hide(500)
                        break;
                    case 'none':
                        other_qualifiation_obtained.hide(500)
                        no_of_subjects.hide(500)
                        break;
                    default:
                        other_qualifiation_obtained.hide(500)
                        no_of_subjects.show(500)
                        break;
                }
            });

            $('#no_of_subjects').keyup(function() {
                let length = 0;
                length = this.value;
                
                if(length > 0) {
                    secondary_subjects.show(500)
                    let subject_row = $('.subject-item-row');
                    if(subject_row.length > 0){
                        $('.subject-item-row:not([id*="subject-row-0"])').remove();
                    }

                    for (let index = 0; index < length-1; index++) {
                        add_new_subject_row($('#subject-row-' + index))
                    }
                } else {
                    secondary_subjects.hide(500)
                }
            });
            
            $('#start_date').change(function(e) {
                var date = new Date($(this).val());
                $('#end_date').attr('min', $(this).val())
            });

            $('#nextForm').click(function(e) {
                confirmAction(e);
            });

            $('#previousBtn').click(function(e) {
                confirmAction(e);
            });

            function confirmAction(e) {
                if($('#name_of_secondary_school').val().length < 1) {
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