@props([
    'selected' => null,
    'required' => false,
    'fieldName' => 'name_of_institution',
    'disabled' => false,
])
<div class="form-control-wrap form-group">
    <label for="select-name_of_institution" class="form-label">Name of Tertiary Institution</label>
    <select name="{{ $fieldName }}" class="form-select form-input"
            data-search="on" id="select-name_of_institution" {{ $required ? 'required': '' }} {{ $disabled ? 'disabled' : '' }}>
        @if($selected !== null)
            <option value="{{ $selected->id }}">
                {{ $selected->name }}
            </option>
        @endif
    </select>
</div>

@push('javascript')
    <script>
        window.institutionsMap = [];
        @if($selected !== null)
            window.institutionsMap[{{ $selected->id }}] = @json($selected);
        @endif

        $('#select-name_of_institution').select2({
            placeholder: 'Select and begin typing',
            ajax: {
                url: '{{ route('tertiray.list') }}',
                delay: 250,
                cache: true,
                data: function (params) {
                    return {
                        search: params.term,
                    }
                },
                processResults: function (result) {
                    return {
                        results: result.map(function (institution) {
                            window.institutionsMap[institution.id] = institution
                            return {
                                id: institution.id,
                                text: institution.name,
                            }
                        })
                    }
                },
            }
        });
    </script>
@endpush
