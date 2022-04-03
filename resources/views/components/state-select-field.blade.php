@props([
    'selected' => null,
    'required' => false,
    'fieldName' => 'state_id',
    'country_id' => null,
    'disabled' => false,
    'class' => '.state_class'
])
<div class="form-control-wrap form-group">
    <label for="country-select" class="form-label">State</label>
    <select
        name="{{ $fieldName }}"
        class="form-select form-input {{ $class }}"
        data-search="on"
        id="state-select" {{ $required ? 'required': '' }} {{ $disabled ? 'disabled' : '' }}
    >
        @if($selected !== null)
            <option value="{{ $selected->id }}">
                {{ $selected->name }}
            </option>
        @endif
    </select>
</div>

@push('javascript')
    <script>
        window.statesMap = [];
        @if($selected !== null)
            window.statesMap[{{ $selected->id }}] = @json($selected);
        @endif
        // $('#country-select').select2({
        //     placeholder: 'Select and begin typing',
        //     ajax: {
        //         url: '{{ route('states.list', $country_id ) }}',
        //         delay: 250,
        //         cache: true,
        //         data: function (params) {
        //             return {
        //                 search: params.term,
        //             }
        //         },
        //         processResults: function (result) {
        //             return {
        //                 results: result.map(function (country) {
        //                     window.countriesMap[country.id] = country
        //                     return {
        //                         id: country.id,
        //                         text: country.name,
        //                     }
        //                 })
        //             }
        //         },
        //     }
        // });
    </script>
@endpush
