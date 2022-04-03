<div class="">
    <x-multi-stepper step="4" :cv="$cv" />
    <section>
        <div class="" style="height: 340px">
            <form
                class="bg-white p-3 shadow rounded"
            >
                @csrf
                <div class="text-left mb-4">
                    <p class="font-bold text-dark m-0 p-0">Tertiary Institutions</p>
                    <small class="font-bold text-warning">Please provide the following information</small>
                </div>

                <div class="form-group mb-3">
                    <label class="form-label" for="name_of_institution">Name of Tertiary Institution</label>
                    <select class="form-select " name="name_of_institution" id="select-name_of_institution" required data-live-search="true">
                        <option value="" selected disabled>Tertiary Institution</option>
                    </select>

                    @error('name_of_institution')
                        <span class="invalid-feedback" role="alert">
                        <small>{{ $message }}</small>
                        </span>
                    @enderror
                </div>

                <div class="form-group mb-3">
                    <label class="form-label" for="type_of_institution">Type of Tertiary Institution</label>
                    <select class="form-select " name="type_of_institution" id="select-type_of_institution" required data-live-search="true">
                        <option value="" selected disabled>Type of Institution</option>
                        <option value="others">Others</option>
                    </select>

                    @error('type_of_institution')
                        <span class="invalid-feedback" role="alert">
                        <small>{{ $message }}</small>
                        </span>
                    @enderror
                </div>

                <div class="form-group mb-3" id="other_tertiary_institution_type-container">
                    <label class="form-label" for="other_tertiary_institution_type">if others please specify</label>
                    <input
                        id="other_tertiary_institution_type"
                        type="text"
                        class="form-control  input-round @error('other_tertiary_institution_type') is-invalid @enderror"
                        name="other_tertiary_institution_type"
                        value="{{ old('other_tertiary_institution_type') }}"
                        placeholder="Other Institution Type"
                    >
                    @error('other_tertiary_institution_type')
                        <span class="invalid-feedback" role="alert">
                        <small>{{ $message }}</small>
                        </span>
                    @enderror
                </div>

                <div class="text-warning font-bold mb-3">
                    Dates Attended
                </div>

                <div class="form-group mb-3 row">
                    <div class="col">
                        <label class="form-label" for="start_date">Entry Date</label>
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
                        <label class="form-label" for="end_date">Finish Date</label>
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
                        <option value="null" selected disabled>Qualification</option>
                    </select>
                    
                    @error('qualification')
                        <span class="invalid-feedback" role="alert">
                        <small>{{ $message }}</small>
                        </span>
                    @enderror
                </div>

                <div class="form-group mb-3" id="tertiary_institution-check">
                    <label class="form-label">Do you have any professional qualification?</label><br>
                    <div class="form-check form-check-inline">
                        <input
                            class="form-check-input"
                            type="radio"
                            name="professional_qualification"
                            id="yes"
                            value="1"
                            required
                            @if ($cv)
                                {{ $cv->professional_qualification == '1' ? 'checked' : '' }}   
                            @else
                                {{ old('professional_qualification') == '1' ? 'checked' : '' }}
                            @endif
                        >
                        <label class="form-check-label" for="yes">Yes</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input
                            class="form-check-input"
                            type="radio"
                            name="professional_qualification"
                            id="no"
                            value="0"
                            required
                            @if ($cv)
                            {{ $cv->professional_qualification == '0' ? 'checked' : '' }}   
                            @else
                                {{ old('professional_qualification') == '0' ? 'checked' : '' }}
                            @endif
                        >
                        <label class="form-check-label" for="no">no</label>
                    </div>
                </div>

                <div class="d-flex mt-4" >
                    <a href="{{ route('cv.secondary-education', $cv['uuid']) }}" id="previousBtn" class="submit__btn btn btn-light btn-outline-secondary px-4 font-bold mx-2">Prev</a>
                    <a
                        href="{{ $cv->professional_qualification == 1 ? route('cv.professional-qualification', $cv['uuid']) : route('cv.employment_history', [$cv['uuid'], $cv->employment_status ? 'current' : 'previous']) }}"
                        id="nextForm"
                        class="submit__btn btn btn-warning px-4 font-bold mx-2 @if(!$cv->tertiary_educations->count()) disabled-link disabled @endif"
                    >
                        Next
                    </a>
                </div>
            </form>
        </div>
    </section>
</div>