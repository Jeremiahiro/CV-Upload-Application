<div>
    <section>
        <x-multi-stepper step="7" :cv="$cv" />
    </section>
    <section>
        <div class="">
            <form
                class="bg-white p-3 shadow rounded"
            >
                @csrf
                <div class="text-left mb-4">
                    <p class="font-bold text-dark m-0 p-0">Your {{ $type == 'current' ? 'Current' : 'Previous' }} employment history</p>
                    <small class="font-bold text-warning">Please provide the following information</small>
                </div>

                <div>
                    <input type="hidden" name="is_current" id="is_current" value="{{ $type == 'current' ? 'current' : 'previous' }}">
                </div>

                <div class="form-group mb-3">
                    <label class="form-label" for="name_of_employer">Name of Employer</label>
                    <input
                        id="name_of_employer"
                        type="text"
                        class="form-control  input-round @error('name_of_employer') is-invalid @enderror"
                        name="name_of_employer"
                        value="{{ old('name_of_employer') }}"
                        placeholder="Employer"
                        required
                    >
                    @error('name_of_employer')
                        <span class="invalid-feedback" role="alert">
                        <small>{{ $message }}</small>
                        </span>
                    @enderror
                </div>

                <div class="form-group mb-3">
                    <label class="form-label" for="select-industry_sector">Industry Sector</label>
                    <select class="form-select " name="industry_sector" id="select-industry_sector" required data-live-search="true">
                        <option value="" selected disabled>Select Industry</option>
                    </select>
                    
                    @error('industry_sector')
                        <span class="invalid-feedback" role="alert">
                        <small>{{ $message }}</small>
                        </span>
                    @enderror
                </div>

                <div class="form-group mb-3" id="other_industrial_sector">
                    <label class="form-label" for="other_industry_sector">If the industry sector is unlisted, please enter it here</label>
                    <input
                        id="other_industry_sector"
                        type="text"
                        class="form-control  input-round @error('other_industry_sector') is-invalid @enderror"
                        name="other_industry_sector"
                        value="{{ old('other_industry_sector') }}"
                        placeholder="Other Industry"
                    >
                    @error('other_industry_sector')
                        <span class="invalid-feedback" role="alert">
                        <small>{{ $message }}</small>
                        </span>
                    @enderror
                </div>

                <div class="form-group mb-3">
                    <label class="form-label" for="employment_date">employment Date</label>
                    <input
                        id="employment_date"
                        type="date"
                        class="form-control  input-round @error('employment_date') is-invalid @enderror"
                        name="employment_date"
                        value="{{ old('employment_date') }}"
                        max="{{ now()->toDateString('Y-m-d') }}"
                        required
                    >
                    @error('employment_date')
                        <span class="invalid-feedback" role="alert">
                        <small>{{ $message }}</small>
                        </span>
                    @enderror
                </div>

                <div class="form-group mb-3">
                    <label class="form-label" for="role">Position / Role</label>
                    <input
                        id="role"
                        type="text"
                        class="form-control  input-round @error('role') is-invalid @enderror"
                        name="role"
                        value="{{ old('role') }}"
                        placeholder="Role"
                        required
                    >
                    @error('role')
                        <span class="invalid-feedback" role="alert">
                        <small>{{ $message }}</small>
                        </span>
                    @enderror
                </div>

                <div class="form-group mb-3">
                    <label class="form-label" for="job_description">What are your responsibilities in this role / position?</label>
                    <textarea name="job_description" id="job_description" class="form-control" rows="1">{{ old('job_description') }}</textarea>
                    @error('job_description')
                        <span class="invalid-feedback" role="alert">
                        <small>{{ $message }}</small>
                        </span>
                    @enderror
                </div>

                <div class="form-group mb-3">
                    <label class="form-label" for="no_of_positions">How many positions did you hold with this employer?</label>
                    <input
                        id="no_of_positions"
                        type="number"
                        class="form-control  input-round @error('no_of_positions') is-invalid @enderror"
                        name="no_of_positions"
                        value="{{ old('no_of_positions',) }}"
                        placeholder="No of Positions"
                        required
                    >
                    @error('no_of_positions')
                        <span class="invalid-feedback" role="alert">
                            <small>{{ $message }}</small>
                        </span>
                    @enderror
                </div>

                <div class="d-flex mt-4" >
                    <a
                        href="{{ $cv->tertiary_institution == 1 ? route('cv.tertiary-institution', $cv['uuid']) : route('cv.secondary-education', $cv['uuid']) }}"
                        id="previousBtn"
                        class="submit__btn btn btn-light btn-outline-secondary px-4 font-bold mx-2 @if(!$cv->secondary_educations->count()) disabled @endif"
                    >
                        Prev
                    </a>
                    <button class="submit__btn btn btn-warning px-4 font-bold" type="submit" id="submit_btn">Next</button>
                </div>
            </form>
        </div>
    </section>
</div>