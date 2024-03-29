@extends('v1.layouts.app')
@section('title')
Contact Details
@endsection
@section('main')

<div class="d-flex flex-column bg-light" id="content-wrapper">
    <div id="content">
        <x-top-nav title="Add CV" />
        <div class="container-fluid bg-light">
            <section>
                <x-multi-stepper step="2" :cv="$cv" />
            </section>
            <section>
                <div class="">
                    <form
                        action="{{ route('cv.contact-details.update', $cv['uuid']) }}"
                        method="post"
                        class="col-12 col-lg-8 mx-auto my-4 bg-white p-5 shadow rounded"
                        onsubmit="$('.submit__btn').attr('disabled', true)"
                    >
                        @csrf
                        <div class="text-left mb-4">
                            <p class="font-bold text-dark m-0 p-0">Contact details</p>
                            <small class="font-bold text-warning">Please provide the following information</small>
                        </div>

                        <div class="form-group mb-3">
                            <label class="form-label" for="first_name">Town / Locality</label>
                            <input
                                id="town"
                                type="text"
                                class="form-control form-input input-round @error('town') is-invalid @enderror"
                                name="town"
                                value="{{ old('town', $cv->town ?? '') }}"
                                placeholder="Town / Locality"
                                required
                            >
                            @error('town')
                                <span class="invalid-feedback" role="alert">
                                <small>{{ $message }}</small>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group mb-3 row">
                            <div class="col">
                                <x-country-select-field
                                    :required="true"
                                    :selected="$cv->country"
                                    class="country"
                                    index="0"
                                />
                                
                                @error('country')
                                    <span class="invalid-feedback" role="alert">
                                    <small>{{ $message }}</small>
                                    </span>
                                @enderror
                            </div>
                            <div class="col">
                                <label class="form-label" for="select-state">State</label>
                                <select class="form-select form-input" name="state" id="select-state" required>
                                    @if ($cv->state)
                                        <option value="{{ $cv->state->id }}" selected>{{ $cv->state->name }}</option>
                                    @endif
                                </select>
                                
                                @error('state')
                                    <span class="invalid-feedback" role="alert">
                                    <small>{{ $message }}</small>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group mb-3">
                            <label class="form-label" for="street">Street</label>
                            <input
                                id="street"
                                type="text"
                                class="form-control form-input input-round @error('street') is-invalid @enderror"
                                name="street"
                                value="{{ old('street', $cv->street ?? '') }}"
                                placeholder="Street"
                                required
                            >
                            @error('street')
                                <span class="invalid-feedback" role="alert">
                                <small>{{ $message }}</small>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group mb-3">
                            {{$cv->mobile_phone}}
                            <label class="form-label" for="mobile_phone">Mobile Phone Number</label>
                            <x-phone-number-input
                                fieldName="mobile_phone"
                                placeholder="e.g +1 702 123 4567"
                                :value="$cv->mobile_phone"
                                index="1"
                            />
                            @error('mobile_phone')
                                <span class="invalid-feedback" role="alert">
                                <small>{{ $message }}</small>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group mb-3">
                            <label class="form-label" for="street">Home Phone Number</label>
                            <x-phone-number-input
                                fieldName="home_phone"
                                placeholder="e.g +1 702 123 4567"
                                :value="$cv->home_phone"
                                index="2"
                            />
                            @error('home_phone')
                                <span class="invalid-feedback" role="alert">
                                <small>{{ $message }}</small>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group mb-3">
                            <label class="form-label" for="street">Email</label>
                            <input
                                id="email"
                                type="email"
                                class="form-control form-input input-round @error('email') is-invalid @enderror"
                                name="email"
                                value="{{ old('email', $cv->email ?? auth()->user()->email) }}"
                                placeholder="me@domain.com"
                                readonly
                            >
                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                <small>{{ $message }}</small>
                                </span>
                            @enderror
                        </div>
                        <div class="d-flex mt-4" >
                            <a href="{{ route('cv.create') }}" id="previousBtn" class="submit__btn btn btn-light btn-outline-secondary px-4 font-bold mx-2">Prev</a>
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

            $('#previousBtn').click(function(e) {
                if($('#town').val().length > 0) {
                    window.location = $(this).attr('href');
                } else {
                    var href = $(this).attr('href');
                    e.preventDefault();
                    if(confirm('Changes you made may not be saved')) {
                        window.location = href;
                    }
                }
            });
        });
    </script>
@endpush
