<div>
    <section>
        <x-multi-stepper step="3" :cv="$cv" />
    </section>
    <section>
        <div class="" style="height: 340px">
            <form
                class="bg-white p-3 shadow rounded"
            >
                @csrf
                <div class="text-left mb-3">
                    <p class="font-bold text-dark m-0 p-0">Secondary Education</p>
                    <small class="font-bold text-warning">Please provide the following information</small>
                </div>

                <div class="form-group mb-3">
                    <label class="form-label" for="no_of_secondary_school">How many secondary schools did you attend?</label>
                    <input
                        id="no_of_secondary_school"
                        type="number"
                        class="form-control  input-round @error('no_of_secondary_school') is-invalid @enderror"
                        name="no_of_secondary_school"
                        value="{{ old('no_of_secondary_school', $cv->no_of_secondary_school ?? '') }}"
                        placeholder="No of secondary school"
                        required
                        {{ $cv->no_of_secondary_school ? 'readonly' : '' }}
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
                        class="form-control  input-round @error('name') is-invalid @enderror"
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
                            type="date"
                            class="form-control  input-round @error('start_date') is-invalid @enderror"
                            name="start_date"
                            value="{{ old('start_date') }}"
                            max="{{ now()->toDateString('Y-m-d') }}"
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
                            type="date"
                            class="form-control  input-round @error('end_date') is-invalid @enderror"
                            name="end_date"
                            value="{{ old('end_date') }}"
                            max="{{ now()->toDateString('Y-m-d') }}"
                            format="d-m-y"
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
                    <label class="form-label" for="select-qualification">Qualification Obtained</label>
                    <select class="form-select " name="qualification" id="select-qualification" required data-live-search="true">
                        <option value="" selected disabled>Qualification</option>
                    </select>
                    
                    @error('qualification')
                        <span class="invalid-feedback" role="alert">
                        <small>{{ $message }}</small>
                        </span>
                    @enderror
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
                        href="{{ $cv->tertiary_institution == 1 ? route('cv.tertiary-institution', $cv['uuid']) : route('cv.employement_history', [$cv['uuid'], $cv->employment_status ? 'current' : 'previous']) }}"
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