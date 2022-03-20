<div>
    <section>
        <x-multi-stepper step="10" :cv="$cv" />
    </section>
    <section>
        <div class="" style="height: 340px">
            <form
                class="bg-white p-3 shadow rounded"
            >
                @csrf
                <div class="text-left mb-4">
                    <p class="font-bold text-dark m-0 p-0">Your Referees</p>
                    <small class="font-bold text-warning">Please provide the following information</small>
                </div>

                <div class="form-group mb-3">
                    <label class="form-label" for="referee_name">Name of Referee</label>
                    <input
                        id="referee_name"
                        type="text"
                        class="form-control  input-round @error('referee_name') is-invalid @enderror"
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
                        class="form-control  input-round @error('referee_email') is-invalid @enderror"
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
                        type="text"
                        class="form-control  input-round @error('referee_phone_number') is-invalid @enderror"
                        name="referee_phone_number"
                        value="{{ old('referee_phone_number') }}"
                        placeholder="+234 812 3478 901"
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
                    <textarea name="referee_address" id="referee_address" class="form-control" rows="1">{{ old('referee_address') }}</textarea>
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

                <div class="d-flex mt-4" >
                    <a href="{{ url()->previous() }}" id="previousBtn" class="submit__btn btn btn-light btn-outline-secondary px-4 font-bold mx-2">Prev</a>
                    <a
                        href="{{ route('cv.location_preference', $cv['uuid']) }}"
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