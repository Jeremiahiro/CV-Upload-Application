<div>
    <section>
        <x-multi-stepper step="11" :cv="$cv" />
    </section>
    <section>
        <div class="" style="height: 340px">
            <form
                class="bg-white p-3 shadow rounded"
            >
                @csrf
                <div class="text-left mb-4">
                    <p class="font-bold text-dark m-0 p-0">Your Location and Industry Employment Preference</p>
                    <small class="font-bold text-warning">Please provide the following information</small>
                </div>

                <div class="form-group mb-3">
                    <label class="form-label" for="select-preferred_state">My preferred location for employment is</label>
                    <select class="form-select" name="preferred_state" id="select-preferred_state" required data-live-search="true">
                        <option value="" selected disabled>Select Location</option>
                    </select>
                    
                    @error('preferred_state')
                        <span class="invalid-feedback" role="alert">
                        <small>{{ $message }}</small>
                        </span>
                    @enderror
                </div>
                
                <div class="form-group mb-3">
                    <label class="form-label" for="select-preferred_industry">My preferred industry for employment is</label>
                    <select class="form-select " name="preferred_industry" id="select-preferred_industry" required data-live-search="true">
                        <option value="" selected disabled>Select Industry</option>
                    </select>
                    
                    @error('preferred_industry')
                        <span class="invalid-feedback" role="alert">
                        <small>{{ $message }}</small>
                        </span>
                    @enderror
                </div>

                <div class="form-group mb-3">
                    <label class="form-label">Do you have any hobbies?</label><br>
                    <div class="form-check form-check-inline">
                        <input
                            class="form-check-input"
                            type="radio"
                            name="hobbies"
                            id="has_hobbies"
                            value="1"
                            required
                            {{ old('hobbies', $cv->has_hobbies) === true ? 'checked' : '' }}
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
                            required
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
