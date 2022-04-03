@props([
    'selected' => null,
    'required' => false,
    'fieldName' => 'country',
    'disabled' => false,
    'label' => 'Country',
    'class' => 'country_class',
    'index' => '0',
])
<div class="form-control-wrap form-group" id="{{ $index }}">
    <label for="country-select" class="form-label">{{ $label }}</label>
    <select
        name="{{ $fieldName }}"
        class="country-select form-select form-input {{ $class }}"
        data-search="on"
        id="country-select-{{ $index }}"
        id="country-select"
        {{ $required ? 'required': '' }}
        {{ $disabled ? 'disabled' : '' }}
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
        window.countriesMap = [];
        @if($selected !== null)
            window.countriesMap[{{ $selected->id }}] = @json($selected);
        @endif
        $('.country-select').select2({
            placeholder: 'Select and begin typing',
            ajax: {
                url: '{{ route('countries.list') }}',
                delay: 250,
                cache: true,
                data: function (params) {
                    return {
                        search: params.term,
                    }
                },
                processResults: function (result) {
                    return {
                        results: result.map(function (country) {
                            window.countriesMap[country.id] = country
                            return {
                                id: country.id,
                                text: country.name,
                            }
                        })
                    }
                },
            }
        });
    </script>
@endpush
