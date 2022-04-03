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

                        <div>
                            <div class="text-warning font-bold mb-3">
                                Most Prefered Preference
                            </div>

                            <div class="form-group mb-3">
                                <x-country-select-field
                                    :required="true"
                                    label="My Most Prefered Country for Employment"
                                    fieldName="most_preferred_country"
                                    class="preferred_country_first"
                                    index="1"
                                    :selected="$cv->most_preferred_country_id ? $cv->most_preferred_country : null"
                                />
                                    
                                @error('most_preferred_country')
                                    <span class="invalid-feedback" role="alert">
                                    <small>{{ $message }}</small>
                                    </span>
                                @enderror
                            </div>
    
                            <div class="form-group mb-3">
                                <label class="form-label" for="select-preferred_state_first">Most Preferred State</label>
                                <select
                                    class="form-select form-input preferred_state_first"
                                    name="most_preferred_state"
                                    id="select-preferred_state_first"
                                    required
                                >
                                    @if ($cv->most_preferred_state_id)
                                        <option value="{{ $cv->most_preferred_state->id }}" selected>{{ $cv->most_preferred_state->name }}</option>
                                    @endif
                                </select>
                                    
                                @error('most_preferred_state')
                                    <span class="invalid-feedback" role="alert">
                                        <small>{{ $message }}</small>
                                    </span>
                                @enderror
                            </div>
    
                            <div class="form-group mb-3">
                                <x-industry-sector-select-field
                                    :required="true"
                                    label="My Most Preferred Industry for Employment is"
                                    fieldName="most_preferred_industry"
                                    class="preferred_industry_first"
                                    index="1"
                                    :selected="$cv->most_preferred_industry_id ? $cv->most_preferred_industry : null"
                                />
    
                                @error('most_preferred_industry')
                                    <span class="invalid-feedback" role="alert">
                                    <small>{{ $message }}</small>
                                    </span>
                                @enderror
                            </div>
    
                            <div class="form-group mb-3" id="other_preferred_industry_first-container">
                                <label class="form-label" for="other_preferred_industry_first">Specify other most preferred industry</label>
                                <input
                                    id="other_preferred_industry_first"
                                    type="text"
                                    class="form-control form-input input-round @error('other_preferred_industry_first') is-invalid @enderror"
                                    name="other_preferred_industry_first"
                                    value="{{ old('other_preferred_industry_first', $cv->other_most_preferred_industry) }}"
                                    placeholder="Other Most Preferred Industry"
                                >
                                @error('other_preferred_industry_first')
                                    <span class="invalid-feedback" role="alert">
                                    <small>{{ $message }}</small>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <hr>
                        
                        <div class="text-warning font-bold mb-3">
                            Prefered Preference
                        </div>

                        <div class="form-group mb-3">
                            <x-country-select-field
                                :required="true"
                                label="My Prefered Country for Employment"
                                fieldName="preferred_country"
                                class="preferred_country_second"
                                index="2"
                                :selected="$cv->preferred_country_id ? $cv->preferred_country : null"

                            />
                                
                            @error('preferred_country')
                                <span class="invalid-feedback" role="alert">
                                <small>{{ $message }}</small>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group mb-3">
                            <label class="form-label" for="select-preferred_state_second">Prefereed State</label>
                            <select
                                class="form-select form-input preferred_state_second"
                                name="preferred_state"
                                id="select-preferred_state_second"
                                required
                            >
                                @if ($cv->preferred_state_id)
                                    <option value="{{ $cv->preferred_state->id }}" selected>{{ $cv->preferred_state->name }}</option>
                                @endif
                            </select>
                                
                            @error('preferred_state')
                                <span class="invalid-feedback" role="alert">
                                <small>{{ $message }}</small>
                                </span>
                            @enderror
                        </div>


                        <div class="form-group mb-3">
                            <x-industry-sector-select-field
                                :required="true"
                                label="My Preferred Industry for Employment is"
                                fieldName="preferred_industry"
                                class="preferred_industry_second"
                                index="2"
                                :selected="$cv->preferred_industry_id ? $cv->preferred_industry : null"
                            />


                            @error('preferred_industry')
                                <span class="invalid-feedback" role="alert">
                                <small>{{ $message }}</small>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group mb-3" id="other_preferred_industry_second-container">
                            <label class="form-label" for="other_preferred_industry_second">Specify other most preferred industry</label>
                            <input
                                id="other_preferred_industry_second"
                                type="text"
                                class="form-control form-input input-round @error('other_preferred_industry_second') is-invalid @enderror"
                                name="other_preferred_industry_second"
                                value="{{ old('other_preferred_industry_second', $cv->other_preferred_industry) }}"
                                placeholder="Other Preferred Industry"
                            >
                            @error('other_preferred_industry_second')
                                <span class="invalid-feedback" role="alert">
                                <small>{{ $message }}</small>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group mb-3">
                            <label class="form-label">Do you want to list any hobbies or provide any additional information?</label><br>
                            <div class="form-check form-check-inline">
                                <input
                                    class="form-check-input"
                                    type="radio"
                                    name="hobbies"
                                    id="has_hobbies"
                                    value="1"
                                    required
                                    {{ old('hobbies', $cv->has_hobbies) == true ? 'checked' : '' }}
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

            const other_preferred_industry_first = $('#other_preferred_industry_first-container');
            const other_preferred_industry_second = $('#other_preferred_industry_second-container');
            const addMore = $('#addMore');
            const updateData = $('#update');

            other_preferred_industry_first.hide()
            other_preferred_industry_second.hide()
            updateData.hide()

            var country_id_first = '';
            var country_id_second = '';

            $('.preferred_country_first').on('change', function () {
                country_id_first = this.value;
                $(".preferred_state_first").html('');
                fetchMostPreferedStates(country_id_first);
            });

            window.statesMap = [];

            function fetchMostPreferedStates(country) {
                $('.preferred_state_first').select2({
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

            $('.preferred_state_first').select2();

            $('.preferred_country_second').on('change', function () {
                country_id_first = this.value;
                $(".preferred_state_second").html('');
                fetchPreferedStates(country_id_first);
            });

            window.prefStatesMap = [];

            function fetchPreferedStates(country) {
                $('.preferred_state_second').select2({
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
                                    window.prefStatesMap[state.id] = state
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

            $('.preferred_state_second').select2();

            $('.preferred_industry_first').on('change', function () {
                var sector = this.value;
                if(sector === 'others') {
                    other_preferred_industry_first.show(500)
                } else {
                    other_preferred_industry_first.hide(500)
                }
            });

            const cv = {!! $cv !!};

            if(cv.most_preferred_industry_id == null) {
                var otherOption = new Option('Others', 'others', true, true);
                $('.preferred_industry_first').append(otherOption).trigger('change');
                other_preferred_industry_first.show(500)
            } else {
                other_preferred_industry_first.hide(500)
            }

            if(cv.preferred_industry_id == null) {
                var otherOption = new Option('Others', 'others', true, true);
                $('.preferred_industry_second').append(otherOption).trigger('change');
                other_preferred_industry_second.show(500)
            } else {
                other_preferred_industry_second.hide(500)
            }


            $('.preferred_industry_second').on('change', function () {
                var sector = this.value;
                if(sector === 'others') {
                    other_preferred_industry_second.show(500)
                } else {
                    other_preferred_industry_second.hide(500)
                }
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
