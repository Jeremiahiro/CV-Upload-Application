<div>
    <section>
        <x-multi-stepper step="2" :cv="$cv" />
    </section>
    <section>
        <div class="" style="height: 340px">
            <form
                class="bg-white p-3 shadow rounded"
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
                        class="form-control  input-round @error('town') is-invalid @enderror"
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
                        <label class="form-label" for="select-country">Country</label>
                        <select class="form-select" name="country" id="select-country" required data-live-search="true">
                            <option value="" selected disabled>Select Country</option>
                        </select>
                        
                        @error('country')
                            <span class="invalid-feedback" role="alert">
                            <small>{{ $message }}</small>
                            </span>
                        @enderror
                    </div>
                    <div class="col">
                        <label class="form-label" for="select-state">State</label>
                        <select class="form-select" name="state" id="select-state" required>
                            @if ($cv->state)
                                <option value="{{ $cv->state->id }}" selected>{{ $cv->state->name }}</option>
                            @else
                            <option value="" selected disabled>Select State</option>
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
                        class="form-control  input-round @error('street') is-invalid @enderror"
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
                    <label class="form-label" for="street">Mobile Phone Number</label>
                    <input
                        id="mobile_phone"
                        type="tel"
                        class="form-control  input-round @error('mobile_phone') is-invalid @enderror"
                        name="mobile_phone"
                        value="{{ old('mobile_phone', $cv->mobile_phone ?? '') }}"
                        placeholder="+234 812 345 678"
                    >
                    @error('mobile_phone')
                        <span class="invalid-feedback" role="alert">
                        <small>{{ $message }}</small>
                        </span>
                    @enderror
                </div>

                <div class="form-group mb-3">
                    <label class="form-label" for="street">Home Phone Number</label>
                    <input
                        id="home_phone"
                        type="tel"
                        class="form-control  input-round @error('home_phone') is-invalid @enderror"
                        name="home_phone"
                        value="{{ old('home_phone', $cv->home_phone ?? '') }}"
                        placeholder="+234 812 345 678"
                    >
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
                        class="form-control  input-round @error('email') is-invalid @enderror"
                        name="email"
                        value="{{ old('email', $cv->email ?? '') }}"
                        placeholder="me@domain.com"
                        required
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