@extends('v1.layouts.app')
@section('title')
Referee
@endsection
@section('main')

<div class="d-flex flex-column bg-light" id="content-wrapper">
    <div id="content">
        <x-top-nav title="Add CV" />

        <div class="container-fluid bg-light">
            <section>
                <x-multi-stepper step="12" title="Hobbies" />
            </section>
            <section>
                <div class="">
                    <form
                        action="{{ $cv ? route('cv.hobbies.update', $cv['uuid']) : route('cv.store') }}"
                        method="post"
                        class="col-12 col-lg-8 mx-auto my-4 bg-white p-5 shadow rounded"
                        onsubmit="$('.submit__btn').attr('disabled', true)"
                        id="referee_form"
                    >
                        @csrf
                        <div class="text-left mb-4">
                            <p class="font-bold text-dark m-0 p-0">Hobbies and Other Information</p>
                            <small class="font-bold text-warning">Please provide the following information</small>
                        </div>

                        <div class="form-group mb-3">
                            <label class="form-label" for="hobbies">Please list your hobbies in the text below</label>
                            <textarea name="hobbies" id="hobbies" class="form-control" rows="5" required>{{ old('hobbies', $cv->hobbies) }}</textarea>
                            @error('hobbies')
                                <span class="invalid-feedback" role="alert">
                                <small>{{ $message }}</small>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group mb-3">
                            <label class="form-label" for="additional_information">
                                Please enter any additional information you think is important for a potential employer to know?
                            </label>
                            <textarea name="additional_information" id="additional_information" class="form-control" rows="5">{{ old('additional_information', $cv->additional_information) }}</textarea>
                            @error('additional_information')
                                <span class="invalid-feedback" role="alert">
                                <small>{{ $message }}</small>
                                </span>
                            @enderror
                        </div>


                        <div class="d-flex mt-4" >
                            <a href="{{ route('cv.location_preference', $cv['uuid']) }}" id="previousBtn" class="submit__btn btn btn-light btn-outline-secondary px-4 font-bold mx-2">Prev</a>
                            <button class="btn btn-warning px-4 font-bold mx-2 submit__btn" type="submit">Next</button>
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

            const addMore = $('#addMore');
            const updateData = $('#update');

            updateData.hide()

            $('.edit-referee-data').click(function(e) {
                updateData.show(500)
                addMore.hide(500)
              
                const data = $(this).data('referee');
                const cv = $(this).data('cv');
                const form_action = '/cv/'+cv.uuid+'/referees/'+data.id

                if(confirm('Changes you made may not be saved')) {
                    handleUpdateData(data);
                }

                function handleUpdateData(data) {
                    $('#referee_form').attr('action', form_action);
                    $('#referee_name').val(data.name);
                    $('#referee_phone_number').val(data.phone);
                    $('#referee_address').val(data.address);
                    if(data.for_industry_type == 1) {
                        $('#for_industry_type').prop('checked', true);
                    } else {
                        $('#not_for_industry_type').prop('checked', true);
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

        });
    </script>

@endpush
