<div>
    <section>
        <x-multi-stepper step="5" :cv="$cv" />
    </section>
    <section>
        <div class="" style="height: 340px">
            <form
                class="bg-white p-3 shadow rounded"
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
                        class="form-control  input-round @error('name_of_qualification') is-invalid @enderror"
                        name="name_of_qualification"
                        value="{{ old('name_of_qualification') }}"
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
                    <label class="form-label" for="type_of_qualification">Type of Qualification</label>
                    <select class="form-select " name="type_of_qualification" id="select-type_of_qualification" required data-live-search="true">
                        <option value="" selected disabled>Type of Qualification</option>
                        <option value="others">Others</option>
                    </select>

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
                        class="form-control  input-round @error('other_qualification_type') is-invalid @enderror"
                        name="other_qualification_type"
                        value="{{ old('other_qualification_type') }}"
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
                        type="date"
                        class="form-control  input-round @error('qualification_date') is-invalid @enderror"
                        name="qualification_date"
                        value="{{ old('qualification_date') }}"
                        max="{{ now()->toDateString('Y-m-d') }}"
                        required
                    >
                    
                    @error('qualification_date')
                        <span class="invalid-feedback" role="alert">
                            <small>{{ $message }}</small>
                        </span>
                    @enderror
                </div>

                <div class="form-group mb-3">
                    <label class="form-label" for="awarding_institution">Awarding Institution</label>
                    <select class="form-select " name="awarding_institution" id="select-awarding_institution" required data-live-search="true">
                        <option value="" selected disabled>Type of Qualification</option>
                        <option value="others">Others</option>
                    </select>

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
                        class="form-control  input-round @error('other_awarding_institution') is-invalid @enderror"
                        name="other_awarding_institution"
                        value="{{ old('other_awarding_institution') }}"
                        placeholder="Other Qualification Type"
                    >
                    @error('other_awarding_institution')
                        <span class="invalid-feedback" role="alert">
                        <small>{{ $message }}</small>
                        </span>
                    @enderror
                </div>

                <div class="form-group mb-3" id="nysc-check">
                    <label class="form-label">Have you completed NYSC?</label><br>
                    <div class="form-check form-check-inline">
                        <input
                            class="form-check-input"
                            type="radio"
                            name="nysc_check"
                            id="yes"
                            value="1"
                            required
                            @if ($cv)
                                {{ $cv->professional_qualification == '1' ? 'checked' : '' }}   
                            @else
                                {{ old('nysc_check') == '1' ? 'checked' : '' }}
                            @endif
                        >
                        <label class="form-check-label" for="yes">Yes</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input
                            class="form-check-input"
                            type="radio"
                            name="nysc_check"
                            id="no"
                            value="0"
                            required
                            @if ($cv)
                            {{ $cv->professional_qualification == '0' ? 'checked' : '' }}   
                            @else
                                {{ old('nysc_check') == '0' ? 'checked' : '' }}
                            @endif
                        >
                        <label class="form-check-label" for="no">no</label>
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
                    <a
                        href="{{ $cv->tertiary_institution ? route('cv.tertiary-institution', $cv['uuid']) : route('cv.secondary-education', $cv['uuid']) }}" id="previousBtn" class="submit__btn btn btn-light btn-outline-secondary px-4 font-bold mx-2">Prev</a>
                    <a
                        href="{{ $cv->completed_nysc == 1 ? route('cv.nysc_details', $cv['uuid']) : route('cv.employment_history', [$cv['uuid'], 'current']) }}"
                        id="nextForm"
                        class="submit__btn btn btn-warning px-4 font-bold mx-2 @if(!$cv->qualifications->count()) disabled @endif"
                    >
                        Next
                    </a>
                </div>
            </form>
        </div>
    </section>
</div>