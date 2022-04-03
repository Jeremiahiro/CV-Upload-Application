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
                <x-multi-stepper step="10" :cv="$cv" />
            </section>
            <section>
                <div class="">
                    <form
                        action="{{ route('cv.referee.update', [$cv['uuid'], $referee['id']]) }}"
                        method="post"
                        class="col-12 col-lg-8 mx-auto my-4 bg-white p-5 shadow rounded"
                        onsubmit="$('.submit__btn').attr('disabled', true)"
                        id="referee_form"
                    >
                        @csrf
                        <div class="text-left mb-4">
                            <p class="font-bold text-dark m-0 p-0">Update Your Referees</p>
                            <small class="font-bold text-warning">Please provide the following information</small>
                        </div>

                        <div class="form-group mb-3">
                            <label class="form-label" for="referee_name">Name of Referee</label>
                            <input
                                id="referee_name"
                                type="text"
                                class="form-control form-input input-round @error('referee_name') is-invalid @enderror"
                                name="referee_name"
                                value="{{ old('referee_name', $referee->name) }}"
                                placeholder="Name of Referee"
                                required
                            >
                            @error('referee_name')
                                <span class="invalid-feedback" role="alert">
                                <small>{{ $message }}</small>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group mb-3">
                            <label class="form-label" for="referee_email">Referee Email</label>
                            <input
                                id="referee_email"
                                type="email"
                                class="form-control form-input input-round @error('referee_email') is-invalid @enderror"
                                name="referee_email"
                                value="{{ old('referee_email', $referee->email) }}"
                                placeholder="email@referee.com"
                            >
                            @error('referee_email')
                                <span class="invalid-feedback" role="alert">
                                <small>{{ $message }}</small>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group mb-3">
                            <label class="form-label" for="referee_phone_number">Referee Phone Number</label>
                            <x-phone-number-input
                                fieldName="referee_phone_number"
                                placeholder="e.g +1 702 123 4567"
                                index="3"
                                :value="$referee->phone"
                            />

                            @error('referee_phone_number')
                                <span class="invalid-feedback" role="alert">
                                <small>{{ $message }}</small>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group mb-3">
                            <x-country-select-field
                                :required="true"
                                label="Country "
                                fieldName="referee_country"
                                :selected="$referee->country"
                            />
                                
                            @error('referee_country')
                                <span class="invalid-feedback" role="alert">
                                <small>{{ $message }}</small>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group mb-3">
                            <label class="form-label" for="select-state">State</label>
                            <select class="form-select form-input" name="referee_state" id="select-state" required>
                                @if ($referee->state)
                                    <option value="{{ $referee->state->id }}" selected>{{ $referee->state->name }}</option>
                                @endif
                            </select>
                                
                            @error('referee_state')
                                <span class="invalid-feedback" role="alert">
                                <small>{{ $message }}</small>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group mb-3">
                            <label class="form-label" for="referee_address">Referee Address</label>
                            <textarea
                                name="referee_address"
                                id="referee_address"
                                class="form-control" 
                                rows="5"
                            >{{ old('referee_address', $referee->address) }}</textarea>
                            @error('referee_address')
                                <span class="invalid-feedback" role="alert">
                                <small>{{ $message }}</small>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group mb-3">
                            <label class="form-label">Do you have industry and location preferences for employment</label><br>
                            <div class="form-check form-check-inline">
                                <input
                                    class="form-check-input"
                                    type="radio"
                                    name="has_prefered_location"
                                    id="has_prefered_location"
                                    value="1"
                                    required
                                    {{ old('has_prefered_location', $cv->has_prefered_location) == '1' ? 'checked' : '' }}
                                >
                                <label class="form-check-label" for="has_prefered_location">Yes</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input
                                    class="form-check-input"
                                    type="radio"
                                    name="has_prefered_location"
                                    id="not_has_prefered_location"
                                    value="0"
                                    required
                                    {{ old('has_prefered_location', $cv->has_prefered_location) == '0' ? 'checked' : '' }}
                                >
                                <label class="form-check-label" for="not_has_prefered_location">No</label>
                            </div>
                        </div>

                        <div class="form-group mb-3" id="update">
                            <button type="submit" class="submit__btn text-warning font-bold btn btn-clear">
                                <i class="fa fa-check"></i>
                                Update
                            </button>
                        </div>

                        <div class="d-flex mt-4" >
                            <a href="{{ route('cv.referee', $cv['uuid']) }}" id="" class="submit__btn btn btn-light btn-outline-secondary px-4 font-bold mx-2">Prev</a>
                            <a
                                href="{{ $cv->has_prefered_location ? route('cv.location_preference', $cv['uuid']) : route('cv.hobbies', $cv['uuid']) }}"
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

            const addMore = $('#addMore');

            var country_id = '';
            $('.country-select').on('change', function () {
                country_id = this.value;
                $("#select-state").html('');
                fetchStates(country_id);
            });

            window.statesMap = [];

            function fetchStates(country) {
                $('#select-state').select2({
                    allowClear: true,
                    placeholder: 'Select and begin typing',
                    ajax: {
                        url: '/api/country/' + country + '/fetch-states',
                        delay: 250,
                        cache: true,
                        data: function (params) {
                            return {
                                search: params.term,
                            }
                        },
                        processResults: function (res) {
                            return {
                                results: res.map(function (state) {
                                    window.statesMap[state.id] = state
                                    return {
                                        id: state.id,
                                        text: state.name,
                                    }
                                })
                            }
                        },
                    }
                });
            }

            $('#select-state').select2();


            $('#nextForm').click(function(e) {
                confirmAction(e);
            });

            function confirmAction(e) {
                if($('#referee_name').val().length < 1) {
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
