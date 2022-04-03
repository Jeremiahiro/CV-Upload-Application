@extends('v1.layouts.app')
@section('title')
NYSC Details
@endsection
@section('main')

<div class="d-flex flex-column bg-light" id="content-wrapper">
    <div id="content">
        <x-top-nav title="Add CV" />

        <div class="container-fluid bg-light">
            <section>
                <x-multi-stepper step="6" :cv="$cv" />
            </section>
            <section>
                <div class="">
                    <form
                        action="{{ $cv ? route('cv.nysc_details.update', $cv['uuid']) : route('cv.store') }}"
                        method="post"
                        class="col-12 col-lg-8 mx-auto my-4 bg-white p-5 shadow rounded"
                        onsubmit="$('.submit__btn').attr('disabled', true)"
                    >
                        @csrf
                        <div class="text-left mb-4">
                            <p class="font-bold text-dark m-0 p-0">Your NYSC Service Year</p>
                            <small class="font-bold text-warning">Please provide the following information</small>
                        </div>

                        <div class="form-group mb-3">
                            <x-country-select-field
                                :required="true"
                                label="Country of National Service "
                                fieldName="nysc_country"
                                class="nysc_country"
                                index="3"
                                :selected="$cv->nysc_detail ? $cv->nysc_detail->country : null"
                            />
                                
                            @error('nysc_country')
                                <span class="invalid-feedback" role="alert">
                                <small>{{ $message }}</small>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group mb-3">
                            <label class="form-label" for="select-state">What state did you serve for your National Service?</label>
                            <select class="form-select form-input" name="nysc_state" id="select-state" required>
                                @if ($cv->nysc_detail)
                                    <option value="{{ $cv->nysc_detail->state->id }}" selected>{{ $cv->nysc_detail->state->name }}</option>
                                @endif
                            </select>
                                
                            @error('nysc_state')
                                <span class="invalid-feedback" role="alert">
                                <small>{{ $message }}</small>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group mb-3">
                            <label class="form-label" for="comencement_date">What date & year did you commence National Service?</label>
                            <input
                                id="comencement_date"
                                type="{{ $cv->nysc_detail ? 'text' : 'month' }}"
                                class="form-control form-input input-round @error('comencement_date') is-invalid @enderror"
                                name="comencement_date"
                                value="{{ old('comencement_date', date('F Y', strtotime($cv->nysc_detail ? $cv->nysc_detail->comencement_date : '')) ?: '') }}"
                                max="{{ now()->toDateString('M-Y') }}"
                                required
                            >
                            
                            @error('comencement_date')
                                <span class="invalid-feedback" role="alert">
                                    <small>{{ $message }}</small>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group mb-3">
                            <label class="form-label" for="completion_date">
                                Month and Year of Completion or Estimated Completion of National Service 
                            </label>
                            <input
                                id="completion_date"
                                type="{{ $cv->nysc_detail ? 'text' : 'month' }}"
                                class="form-control form-input input-round @error('completion_date') is-invalid @enderror"
                                name="completion_date"
                                value="{{ old('completion_date', date('F Y', strtotime($cv->nysc_detail ? $cv->nysc_detail->completion_date : '')) ?: '') }}"
                                max="{{ now()->toDateString('M-Y') }}"
                                required
                            >
                            
                            @error('completion_date')
                                <span class="invalid-feedback" role="alert">
                                    <small>{{ $message }}</small>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group mb-3" id="">
                            <label class="form-label">Do you have any preference for location and industry type for location?</label><br>
                            <div class="form-check form-check-inline">
                                <input
                                    class="form-check-input"
                                    type="radio"
                                    name="location_preference"
                                    id="yes"
                                    value="1"
                                    required
                                    @if ($cv)
                                        {{ $cv->location_preference == '1' ? 'checked' : '' }}   
                                    @else
                                        {{ old('location_preference') == '1' ? 'checked' : '' }}
                                    @endif
                                >
                                <label class="form-check-label" for="yes">Yes</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input
                                    class="form-check-input"
                                    type="radio"
                                    name="location_preference"
                                    id="no"
                                    value="0"
                                    required
                                    @if ($cv)
                                    {{ $cv->location_preference == '0' ? 'checked' : '' }}   
                                    @else
                                        {{ old('location_preference') == '0' ? 'checked' : '' }}
                                    @endif
                                >
                                <label class="form-check-label" for="no">no</label>
                            </div>
                        </div>

                        <div class="form-group mb-3" id="">
                            <label class="form-label">Are you currently employed?</label><br>
                            <div class="form-check form-check-inline">
                                <input
                                    class="form-check-input"
                                    type="radio"
                                    name="employment_status"
                                    id="yes"
                                    value="1"
                                    required
                                    @if ($cv)
                                        {{ $cv->employment_status == '1' ? 'checked' : '' }}   
                                    @else
                                        {{ old('employment_status') == '1' ? 'checked' : '' }}
                                    @endif
                                >
                                <label class="form-check-label" for="yes">Yes</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input
                                    class="form-check-input"
                                    type="radio"
                                    name="employment_status"
                                    id="no"
                                    value="0"
                                    required
                                    @if ($cv)
                                    {{ $cv->employment_status == '0' ? 'checked' : '' }}   
                                    @else
                                        {{ old('employment_status') == '0' ? 'checked' : '' }}
                                    @endif
                                >
                                <label class="form-check-label" for="no">no</label>
                            </div>
                        </div>

                        <div class="d-flex mt-4" >
                            <a
                                href="{{ url()->previous() }}" id="previousBtn" class="submit__btn btn btn-light btn-outline-secondary px-4 font-bold mx-2">Prev</a>
                            <button class="btn btn-warning px-4 font-bold submit__btn" type="submit">Next</button>
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

            $('#previousBtn').click(function(e) {
                confirmAction(e);
            });

            $('#comencement_date').focus(function(e) {
                $(this).attr('type','month');
            });

            $('#completion_date').focus(function(e) {
                $(this).attr('type','month');
            });

            function confirmAction(e) {
                if($('#nysc_state').val().length < 1) {
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
