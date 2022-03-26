@props([
    'selected' => null,
    'required' => false,
    'fieldName' => 'qualification',
    'disabled' => false,
])
<div class="form-control-wrap form-group">
    <label for="select-secondary_qualification" class="form-label">Qualification Obtained</label>
    <select name="{{ $fieldName }}" class="form-select form-input"
            data-search="on" id="select-secondary_qualification" {{ $required ? 'required': '' }} {{ $disabled ? 'disabled' : '' }}>
        @if($selected !== null)
            <option value="{{ $selected->id }}">
                {{ $selected->name }}
            </option>
        @endif
    </select>
</div>

@push('javascript')
    <script>
        window.qualificationsMap = [];
        @if($selected !== null)
            window.qualificationsMap[{{ $selected->id }}] = @json($selected);
        @endif
        $('#select-secondary_qualification').select2({
            placeholder: 'Select and begin typing',
            ajax: {
                url: '{{ route('secondary.qualification.list') }}',
                delay: 250,
                cache: true,
                data: function (params) {
                    return {
                        search: params.term,
                    }
                },
                processResults: function (result) {
                    return {
                        results: result.map(function (qualification) {
                            window.qualificationsMap[qualification.id] = qualification
                            return {
                                id: qualification.id,
                                text: qualification.name,
                            }
                        })
                    }
                },
            }
        });
    </script>
@endpush
