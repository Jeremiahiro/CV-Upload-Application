@props([
    'selected' => null,
    'required' => false,
    'fieldName' => 'type_of_institution',
    'disabled' => false,
])
<div class="form-control-wrap form-group">
    <label for="select-type_of_institution" class="form-label">Type of Tertiary Institution</label>
    <select name="{{ $fieldName }}" class="form-select form-input"
            data-search="on" id="select-type_of_institution" {{ $required ? 'required': '' }} {{ $disabled ? 'disabled' : '' }}>
        @if($selected !== null)
            <option value="{{ $selected->id }}">
                {{ $selected->name }}
            </option>
            <option value="{{ 'others' }}">Others</option>

        @endif
    </select>
</div>

@push('javascript')
    <script>
        window.tertirayTypesMap = [];
        @if($selected !== null)
            window.tertirayTypesMap[{{ $selected->id }}] = @json($selected);
        @endif

        $('#select-type_of_institution').select2({
            placeholder: 'Select and begin typing',
            ajax: {
                url: '{{ route('tertiary.type') }}',
                delay: 250,
                cache: true,
                data: function (params) {
                    return {
                        search: params.term,
                    }
                },
                processResults: function (result) {
                    return {
                        results: result.map(function (type) {
                            window.tertirayTypesMap[type.id] = type
                            return {
                                id: type.id,
                                text: type.name,
                            }
                        })
                    }
                },
            }
        });
    </script>
@endpush
