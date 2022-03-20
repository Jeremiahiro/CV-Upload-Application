@extends('v1.layouts.app')
@section('title')
Location Preference
@endsection
@section('main')

<div class="d-flex flex-column bg-light" id="content-wrapper">
    <div id="content">
        <x-top-nav title="Add CV" />

        <div class="container-fluid bg-light">
            <section>
                <x-multi-stepper step="11" :cv="$cv" />
            </section>
            <section>
                <div class="">
                    <form
                        action="{{ $cv ? route('cv.location_preference.update', $cv['uuid']) : route('cv.store') }}"
                        method="post"
                        class="col-12 col-lg-8 mx-auto my-4 bg-white p-5 shadow rounded"
                        onsubmit="$('.submit__btn').attr('disabled', true)"
                        id="referee_form"
                    >
                        @csrf
                        <div class="text-left mb-4">
                            <p class="font-bold text-dark m-0 p-0">Your Location and Industry Employment Preference</p>
                            <small class="font-bold text-warning">Please provide the following information</small>
                        </div>

                        <div class="form-group mb-3">
                            <label class="form-label" for="select-preferred_state">My preferred location for employment is</label>
                            <select class="form-select" name="preferred_state" id="select-preferred_state" required data-live-search="true">
                                <option value="" selected disabled>Select Location</option>
                                @foreach ($states as $state)
                                    <option
                                        value="{{ $state->id }}"
                                        @if ($cv->preferred_state)
                                            {{ $cv->preferred_state->name == $state->name ? 'selected' : '' }}
                                        @else
                                            {{ old('preferred_state') == $state->id ? 'selected' : '' }}
                                        @endif
                                    >
                                        {{ $state->name }}
                                    </option>
                                @endforeach
                            </select>
                            
                            @error('preferred_state')
                                <span class="invalid-feedback" role="alert">
                                <small>{{ $message }}</small>
                                </span>
                            @enderror
                        </div>
                        
                        <div class="form-group mb-3">
                            <label class="form-label" for="select-preferred_industry">My preferred industry for employment is</label>
                            <select class="form-select form-input" name="preferred_industry" id="select-preferred_industry" required data-live-search="true">
                                <option value="" selected disabled>Select Industry</option>
                                @foreach ($industry_sector as $sector)
                                    <option
                                        value="{{ $sector->id }}"
                                        @if ($cv->preferred_industry)
                                            {{ $cv->preferred_industry->name == $sector->name ? 'selected' : '' }}
                                        @else
                                            {{ old('preferred_industry') == $sector->id ? 'selected' : '' }}
                                        @endif
                                    >
                                        {{ $sector->name }}
                                    </option>
                                @endforeach
                            </select>
                            
                            @error('preferred_industry')
                                <span class="invalid-feedback" role="alert">
                                <small>{{ $message }}</small>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group mb-3">
                            <label class="form-label">Do you have any hobbies?</label><br>
                            <div class="form-check form-check-inline">
                                <input
                                    class="form-check-input"
                                    type="radio"
                                    name="hobbies"
                                    id="has_hobbies"
                                    value="1"
                                    required
                                    {{ old('hobbies', $cv->has_hobbies) === true ? 'checked' : '' }}
                                >
                                <label class="form-check-label" for="has_hobbies">Yes</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input
                                    class="form-check-input"
                                    type="radio"
                                    name="hobbies"
                                    id="not_has_hobbies"
                                    value="0"
                                    required
                                    {{ old('hobbies', $cv->has_hobbies) == false ? 'checked' : '' }}
                                >
                                <label class="form-check-label" for="not_has_hobbies">No</label>
                            </div>
                        </div>

                        <div class="d-flex mt-4" >
                            <a href="{{ route('cv.referee', $cv['uuid']) }}" id="previousBtn" class="submit__btn btn btn-light btn-outline-secondary px-4 font-bold mx-2">Prev</a>
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
