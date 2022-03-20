<div>
    <section>
        <x-multi-stepper step="9" :cv="$cv" />
    </section>
    <section>
        <div class="">
            <form
                class="bg-white p-3 shadow rounded"
            >
                @csrf
                <div class="text-left mb-4">
                    <p class="font-bold text-dark m-0 p-0">Employement Roles</p>
                    <small class="font-bold text-warning">Please provide the following information</small>
                </div>

                <div class="form-group mb-3">
                    <label class="form-label" for="position">Position / Role</label>
                    <input
                        id="position"
                        type="text"
                        class="form-control  input-round @error('position') is-invalid @enderror"
                        name="position"
                        value="{{ old('position') }}"
                        placeholder="Position / Role"
                        required
                    >
                    @error('ropositionle')
                        <span class="invalid-feedback" role="alert">
                        <small>{{ $message }}</small>
                        </span>
                    @enderror
                </div>

                <div class="form-group mb-3 row">
                    <div class="col">
                        <label class="form-label" for="from_date">Date in Position / Role</label>
                        <input
                            id="from_date"
                            type="date"
                            class="form-control  input-round @error('from_date') is-invalid @enderror"
                            name="from_date"
                            value="{{ old('from_date') }}"
                            max="{{ now()->toDateString('Y-m-d') }}"
                            required
                        >
                        
                        @error('from_date')
                            <span class="invalid-feedback" role="alert">
                                <small>{{ $message }}</small>
                            </span>
                        @enderror
                    </div>
                    <div class="col">
                        <label class="form-label invisible" for="role">Position / Role</label>
                        <input
                            id="to_date"
                            type="date"
                            class="form-control  input-round @error('to_date') is-invalid @enderror"
                            name="to_date"
                            value="{{ old('to_date') }}"
                            max="{{ now()->toDateString('Y-m-d') }}"
                            format="d-m-y"
                            required
                        >
                        
                        @error('to_date')
                            <span class="invalid-feedback" role="alert">
                                <small>{{ $message }}</small>
                            </span>
                        @enderror
                    </div>
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
                    <label class="form-label">Do you have any referees that an employer may contact?</label><br>
                    <div class="form-check form-check-inline">
                        <input
                            class="form-check-input"
                            type="radio"
                            name="referees"
                            id="has_contact"
                            value="1"
                            required
                            {{ old('referees') === '1' ? 'checked' : '' }}
                        >
                        <label class="form-check-label" for="has_contact">Yes</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input
                            class="form-check-input"
                            type="radio"
                            name="referees"
                            id="no_contact"
                            value="0"
                            required
                            {{ old('referees') === '0' ? 'checked' : '' }}
                        >
                        <label class="form-check-label" for="no_contact">No</label>
                    </div>
                </div>

                <div class="d-flex mt-4" >
                    <a
                        href="{{ route('cv.employement_history', [$cv['uuid'], $cv->employment_status ? 'current' : 'previous']) }}"
                        id="previousBtn"
                        class="submit__btn btn btn-light btn-outline-secondary px-4 font-bold mx-2"
                    >
                        Prev
                    </a>

                    <a
                        href="{{ route('cv.referee', $cv['uuid']) }}"
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