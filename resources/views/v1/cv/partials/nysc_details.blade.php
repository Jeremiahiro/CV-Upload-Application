<div>
    <section>
        <x-multi-stepper step="6" :cv="$cv" />
    </section>
    <section>
        <div class="" style="height: 340px">
            <form
                class="bg-white p-3 shadow rounded"
            >
                @csrf
                <div class="text-left mb-4">
                    <p class="font-bold text-dark m-0 p-0">Your NYSC Service Year</p>
                    <small class="font-bold text-warning">Please provide the following information</small>
                </div>

                <div class="form-group mb-3">
                    <label class="form-label" for="select-state">What state did you serve for your National Service?</label>
                        <select class="form-select " name="nysc_state" id="select-state" required data-live-search="true">
                            <option value="" selected disabled>Select State</option>
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
                        type="date"
                        class="form-control  input-round @error('end_date') is-invalid @enderror"
                        name="comencement_date"
                        value="{{ old('comencement_date', $cv->nysc_detail->date ?? '') }}"
                        max="{{ now()->toDateString('Y-m-d') }}"
                        format="d-m-y"
                        required
                    >
                    
                    @error('comencement_date')
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