@props([
    'selected' => null,
    'required' => false,
    'fieldName' => 'country',
    'disabled' => false,
])
<div class="form-control-wrap form-group">
    <label for="country-select" class="form-label">Country</label>
    <select name="{{ $fieldName }}" class="form-select form-input"
            data-search="on" id="country-select" {{ $required ? 'required': '' }} {{ $disabled ? 'disabled' : '' }}>
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
        $('#country-select').select2({
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
