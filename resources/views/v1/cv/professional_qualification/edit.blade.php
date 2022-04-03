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
                        action="{{ route('cv.professional-qualification.update', [$cv['uuid'], $qualification['id']]) }}"
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

                        <div class="form-group mb-3">
                            <label class="form-label" for="name_of_qualification">Name of Qualification</label>
                            <input
                                id="name_of_qualification"
                                type="text"
                                class="form-control form-input input-round @error('name_of_qualification') is-invalid @enderror"
                                name="name_of_qualification"
                                value="{{ old('name_of_qualification', $qualification->name) }}"
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
                            <x-professional-qualification-type-select :selected="$qualification->qualification"  />

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
                                value="{{ old('other_qualification_type', $qualification->other_qualification_type) }}"
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
                                type="text"
                                class="form-control form-input input-round @error('qualification_date') is-invalid @enderror"
                                name="qualification_date"
                                value="{{ old('qualification_date', date('F Y', strtotime($qualification->qualification_date)) ?: '') }}"
                                max="{{ now()->toDateString('M-Y') }}"
                                required
                            >
                            
                            @error('qualification_date')
                                <span class="invalid-feedback" role="alert">
                                    <small>{{ $message }}</small>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group mb-3">
                            <x-professional-institutions-select :selected="$qualification->awarding_institution" />

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
                                class="form-control form-input input-round @error('other_qualification_type') is-invalid @enderror"
                                name="other_awarding_institution"
                                value="{{ old('other_awarding_institution', $qualification->other_institutions_type) }}"
                                required
                            >

                            @error('other_awarding_institution')
                                <span class="invalid-feedback" role="alert">
                                <small>{{ $message }}</small>
                                </span>
                            @enderror
                        </div>

                        <div>
                            <div class="form-group mb-3" id="update">
                                <button type="submit" class="submit__btn text-warning font-bold btn btn-clear">
                                    <i class="fa fa-check"></i>
                                    Update
                                </button>
                            </div>
                        </div>

                        <div class="d-flex mt-4" >
                            <a
                                href="{{ route('cv.professional-qualification', $cv['uuid']) }}" id="previousBtn" class="submit__btn btn btn-light btn-outline-secondary px-4 font-bold mx-2">Prev</a>
                            <a
                                href="{{ $cv->completed_nysc == 1 ? route('cv.nysc_details', $cv['uuid']) : route('cv.employment_history', [$cv['uuid'], 'current']) }}"
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

            const other_qualification_type = $('#other_qualification_type-container');
            const other_awarding_institution = $('#other_awarding_institution-container');

            other_qualification_type.hide()
            other_awarding_institution.hide()


            const qualification = {!! $qualification !!};

            if(qualification.professional_qualifications_id == null) {
                var otherOption = new Option('Others', 'others', true, true);
                other_qualification_type.show(500)
                $('#select-type_of_qualification').append(otherOption).trigger('change');
            } else {
                other_qualification_type.hide(500)
            }

            if(qualification.professional_institutions_id == null) {
                var otherOption = new Option('Others', 'others', true, true);
                other_awarding_institution.show(500)
                $('#select-awarding_institution').append(otherOption).trigger('change');
            } else {
                other_awarding_institution.hide(500)
            }

            $('#select-type_of_qualification').on('change', function () {
                if(this.value === 'others') {
                    other_qualification_type.show(500)
                } else {
                    other_qualification_type.hide(500)
                }
            });

            $('#qualification_date').focus(function(e) {
                $(this).attr('type','month');
            });

            $('#select-awarding_institution').on('change', function () {
                if(this.value === 'others') {
                    other_awarding_institution.show(500)
                } else {
                    other_awarding_institution.hide(500)
                }
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