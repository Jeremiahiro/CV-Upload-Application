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
                        action="{{ $cv ? route('cv.referee.create', $cv['uuid']) : route('cv.store') }}"
                        method="post"
                        class="col-12 col-lg-8 mx-auto my-4 bg-white p-5 shadow rounded"
                        onsubmit="$('.submit__btn').attr('disabled', true)"
                        id="referee_form"
                    >
                        @csrf
                        <div class="text-left mb-4">
                            <p class="font-bold text-dark m-0 p-0">Your Referees</p>
                            <small class="font-bold text-warning">Please provide the following information</small>
                        </div>

                        <div class="d-flex flex-wrap mb-2">
                            @foreach ($referees as $referee)
                                <div class="col col-lg-6 mb-2">
                                    <div class="w-100 data">
                                        <div class="m-2 d-flex justify-content-between p-2 bg-warning text-dark">
                                            <div class=" ">
                                                <span class="font-bold">
                                                    {{ Str::limit($referee->name, 40) }} 
                                                    <br />
                                                    <small>({{ $referee->email }})</small>
                                                </span>
                                            </div>
                                            <div class="data__action mx-3">
                                                <div class="d-flex flex-column">
                                                    <span class="cursor-pointer mx-2">
                                                        <i
                                                            class="fa fa-edit text-dark edit-referee-data"
                                                            data-referee="{{ $referee }}"
                                                            data-cv="{{ $cv }}"
                                                            data-toggle="tooltip"
                                                            title="Edit Data"></i>
                                                    </span>
                                                    <span class="cursor-pointer mx-2">
                                                        <a
                                                            href="{{ route('cv.referee.delete', [$cv['uuid'], $referee['id']]) }}"
                                                            data-toggle="tooltip"
                                                            title="Delete Data"
                                                            class="text-danger"
                                                        >
                                                            <i class="fa fa-trash text-danger delete-referee-data"></i>
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
                            <label class="form-label" for="referee_name">Name of Referee</label>
                            <input
                                id="referee_name"
                                type="text"
                                class="form-control form-input input-round @error('referee_name') is-invalid @enderror"
                                name="referee_name"
                                value="{{ old('referee_name') }}"
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
                                value="{{ old('referee_email') }}"
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
                            <input
                                id="referee_phone_number"
                                type="tel"
                                class="form-control form-input input-round @error('referee_phone_number') is-invalid @enderror"
                                name="referee_phone_number"
                                value="{{ old('referee_phone_number') }}"
                                placeholder="Input Referees Phone Number"
                                required
                            >
                            @error('referee_phone_number')
                                <span class="invalid-feedback" role="alert">
                                <small>{{ $message }}</small>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group mb-3">
                            <label class="form-label" for="referee_address">Referee Address</label>
                            <textarea name="referee_address" id="referee_address" class="form-control" rows="5">{{ old('referee_address') }}</textarea>
                            @error('referee_address')
                                <span class="invalid-feedback" role="alert">
                                <small>{{ $message }}</small>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group mb-3">
                            <label class="form-label">For Industry Type</label><br>
                            <div class="form-check form-check-inline">
                                <input
                                    class="form-check-input"
                                    type="radio"
                                    name="for_industry_type"
                                    id="for_industry_type"
                                    value="1"
                                    required
                                    {{ old('for_industry_type') === '1' ? 'checked' : '' }}
                                >
                                <label class="form-check-label" for="for_industry_type">Yes</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input
                                    class="form-check-input"
                                    type="radio"
                                    name="for_industry_type"
                                    id="not_for_industry_type"
                                    value="0"
                                    required
                                    {{ old('for_industry_type') === '0' ? 'checked' : '' }}
                                >
                                <label class="form-check-label" for="not_for_industry_type">No</label>
                            </div>
                        </div>

                        <div>
                            <div class="form-group mb-3" id="addMore">
                                <button type="submit" class="submit__btn text-warning font-bold btn btn-clear">
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

                        <div class="d-flex mt-4" >
                            <a href="{{ url()->previous() }}" id="previousBtn" class="submit__btn btn btn-light btn-outline-secondary px-4 font-bold mx-2">Prev</a>
                            <a
                                href="{{ route('cv.location_preference', $cv['uuid']) }}"
                                id="nextForm"
                                class="submit__btn btn btn-warning px-4 font-bold mx-2 @if(!$referees->count()) disabled-link disabled @endif"
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
            const updateData = $('#update');

            updateData.hide()

            $('.edit-referee-data').click(function(e) {
                updateData.show(500)
                addMore.hide(500)
              
                const data = $(this).data('referee');
                const cv = $(this).data('cv');
                const form_action = '/cv/'+cv.uuid+'/referees/'+data.id

                if($('#referee_name').val().length < 2) {
                    if(confirm('Changes you made may not be saved')) {
                        handleUpdateData(data);
                    }
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
                confirmAction(e);
            });

            $('#previousBtn').click(function(e) {
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
