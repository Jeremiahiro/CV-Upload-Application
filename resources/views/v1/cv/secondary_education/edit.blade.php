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
                        action="{{ route('cv.secondary-education.update', [$cv['uuid'], $secondary_education['id']]) }}"
                        method="post"
                        class="col-12 col-lg-8 mx-auto my-4 bg-white p-5 shadow rounded"
                        id="update_secondary_education_form"
                        onsubmit="$('.submit__btn').attr('disabled', true)"
                    >
                        @csrf
                        <div class="text-left mb-3">
                            <p class="font-bold text-dark m-0 p-0">Secondary Education</p>
                            <small class="font-bold text-warning">Please provide the following information</small>
                        </div>

                        <div class="form-group mb-3">
                            <label class="form-label" for="name_of_secondary_school">Name of Secondary School</label>
                            <input
                                id="update_name_of_secondary_school"
                                type="text"
                                class="form-control form-input input-round @error('name') is-invalid @enderror"
                                name="name"
                                value="{{ old('name', $secondary_education->name ?: '') }}"
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
                                    id="update_start_date"
                                    type="text"
                                    class="form-control form-input input-round @error('start_date') is-invalid @enderror"
                                    name="start_date"
                                    value="{{ old('start_date', date('F Y', strtotime($secondary_education->start_date)) ?: '') }}"
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
                                    id="update_end_date"
                                    type="text"
                                    class="form-control form-input input-round @error('end_date') is-invalid @enderror"
                                    name="end_date"
                                    value="{{ old('end_date', date('F Y', strtotime($secondary_education->end_date)) ?: '') }}"
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

                        @if ($secondary_education->secondary_qualifications_id)
                        <div class="form-group mb-3">
                            <x-secondary-qualification-select-field
                                :required="true"
                                :selected="$secondary_education->qualification"
                                :readonly="true"
                            />
                            @error('qualification')
                                <span class="invalid-feedback" role="alert">
                                <small>{{ $message }}</small>
                                </span>
                            @enderror
                        </div>
                        @else
                        <div class="form-control-wrap form-group">
                            <label for="select-secondary_qualification" class="form-label">Qualification Obtained</label>
                            <input
                                id="qualification"
                                type="text"
                                class="form-control form-input input-round @error('qualification') is-invalid @enderror"
                                value="{{ $secondary_education->other_qualification ? 'Others' : 'None' }}"
                                placeholder="Qualification Obtained"
                                readonly
                            >
                            <input type="hidden" name="qualification" value="{{ $secondary_education->other_qualification ? 'others' : 'none' }}" />
                        </div>
                        @endif

                        @if ($secondary_education->other_qualification)
                        <div class="form-group mb-3" id="update_other_qualifiation_obtained-container">
                            <label class="form-label" for="other_qualifiation_obtained">Other Qualification Obtained</label>
                            <input
                                id="update_other_qualifiation_obtained"
                                type="text"
                                class="form-control form-input input-round @error('other_qualifiation_obtained') is-invalid @enderror"
                                name="other_qualifiation_obtained"
                                value="{{ old('other_qualifiation_obtained', $secondary_education->other_qualification ?: '') }}"
                                placeholder="Other qualification"
                            >
                            @error('other_qualifiation_obtained')
                                <span class="invalid-feedback" role="alert">
                                <small>{{ $message }}</small>
                                </span>
                            @enderror
                        </div>
                        @endif

                        @if ($secondary_education->secondary_qualifications_id)
                        <div id="update_no_of_subjects-container">
                            <div class="form-group mb-3">
                                <label class="form-label" for="other_qualifiation_obtained">
                                    In how many subjects do you have this qualification
                                </label>
                                <input
                                    id="update_no_of_subjects"
                                    type="number"
                                    class="form-control form-input input-round @error('no_of_subjects') is-invalid @enderror"
                                    name="no_of_subjects"
                                    value="{{ old('no_of_subjects', $secondary_education->no_of_subjects ?? '') }}"
                                    placeholder="No of Subject"
                                >
                                @error('no_of_subjects')
                                    <span class="invalid-feedback" role="alert">
                                    <small>{{ $message }}</small>
                                    </span>
                                @enderror
                            </div>

                            <div class="table-responsive mb-3 w-100" id="secondary_subjects-container">
                                <table class="table">
                                    <thead>
                                      <tr>
                                        <th scope="col">Subject</th>
                                        <th scope="col">Grade</th>
                                        <th scope="col"></th>
                                      </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($secondary_education->qualifications as $qualification)
                                            <x-secondary-subject-fields
                                                :subject="$qualification->subject"
                                                :grade="$qualification->grade"
                                                :index="$loop->index"
                                                :last="$loop->last"
                                            />
                                        @endforeach
                                    </tbody>
                                  </table>
                            </div>
                        </div>
                        @endif

                        <div>
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

            const name_of_secondary_school = $('#update_name_of_secondary_school');
            const other_qualifiation_obtained = $('#update_other_qualifiation_obtained-container');
            const no_of_subjects = $('#update_no_of_subjects-container');
            const start_date = $('#update_start_date');
            const end_date = $('#update_end_date');
            const secondary_subjects = $('#secondary_subjects-container');

            const secondary_education = {!! $secondary_education !!};

            if(secondary_education.secondary_qualifications_id == null) {
                no_of_subjects.hide()
                other_qualifiation_obtained.show(500)
            } else {
                other_qualifiation_obtained.hide();
                no_of_subjects.show(500)
            }

            $('#select-qualification').on('change', function () {
                if(this.value == '6') {
                    other_qualifiation_obtained.show(500)
                    no_of_subjects.hide(500)
                } else {
                    other_qualifiation_obtained.hide(500)
                    no_of_subjects.show(500)
                }
            })

            $('#update_no_of_subjects').keyup(function() {
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

            $('#start_date').focus(function(e) {
                $(this).attr('type','month');
            });

            $('#end_date').focus(function(e) {
                $(this).attr('type','month');
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