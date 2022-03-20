<div>
    <section>
        <x-multi-stepper step="12" :cv="$cv" />
    </section>
    <section>
        <div class="" style="height: 340px">
            <form
                class="bg-white p-3 shadow rounded"
            >
                @csrf
                <div class="text-left mb-4">
                    <p class="font-bold text-dark m-0 p-0">Hobbies and Other Information</p>
                    <small class="font-bold text-warning">Please provide the following information</small>
                </div>

                <div class="form-group mb-3">
                    <label class="form-label" for="hobbies">Please list your hobbies in the text below</label>
                    <textarea name="hobbies" id="hobbies" class="form-control" rows="1" required>{{ old('hobbies', json_decode($cv->hobbies)) }}</textarea>
                    @error('hobbies')
                        <span class="invalid-feedback" role="alert">
                        <small>{{ $message }}</small>
                        </span>
                    @enderror
                </div>

                <div class="form-group mb-3">
                    <label class="form-label" for="additional_information">
                        Please enter any additional information you think is important for a potential employer to know?
                    </label>
                    <textarea name="additional_information" id="additional_information" class="form-control" rows="1">{{ old('additional_information', $cv->additional_information) }}</textarea>
                    @error('additional_information')
                        <span class="invalid-feedback" role="alert">
                        <small>{{ $message }}</small>
                        </span>
                    @enderror
                </div>


                <div class="d-flex mt-4" >
                    <a href="{{ route('cv.location_preference', $cv['uuid']) }}" id="previousBtn" class="submit__btn btn btn-light btn-outline-secondary px-4 font-bold mx-2">Prev</a>
                    <button class="btn btn-warning px-4 font-bold mx-2 submit__btn" type="submit">Next</button>
                </div>
            </form>
        </div>
    </section>
</div>