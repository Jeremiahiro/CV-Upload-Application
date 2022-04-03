@props([
    'value' => null,
    'required' => false,
    'fieldName' => 'phone_number',
    'placeholder' => 'Enter Phone Number',
    'label' => null,
    'disabled' => false,
    'index' => 0,
])
<div class="form-control-wrap form-group">
    <input
        id="phone-{{ $index }}"
        type="tel"
        pattern="^\+(?:[0-9]?){6,14}[0-9]{10}$"
        title="Enter a valid number starting with country code"
        name="{{ $fieldName }}"
        class="form-control w-100 form-input input-round phone__input @error($fieldName) is-invalid @enderror"
        placeholder="{{ $placeholder }}"
        value="{{ old($fieldName, $value ?? '') }}"
        {{ $required ? 'required': '' }} 
        {{ $disabled ? 'disabled' : '' }}
    />
</div>

@push('javascript')
    <script>
        var phoneInputField = "#phone-"+{{ $index }};
        var phoneInputField = document.querySelector(phoneInputField);
        var phoneInput = window.intlTelInput(phoneInputField, {
            // initialCountry: "auto",
            preferredCountries: ["us", "co", "ng"],
            // geoIpLookup: getIp,
            utilsScript: "https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/js/utils.js",
        });

        // function getIp(callback) {
        //     fetch('https://ipinfo.io/json?token=<your token>', { headers: { 'Accept': 'application/json' }})
        //     .then((resp) => resp.json())
        //     .catch(() => {
        //         return {
        //             country: 'us',
        //         };
        //     })
        //     .then((resp) => callback(resp.country));
        // }
    </script>
@endpush
