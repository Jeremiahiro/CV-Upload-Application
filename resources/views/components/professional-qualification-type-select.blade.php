@props([
    'selected' => null,
    'required' => false,
    'fieldName' => 'type_of_qualification',
    'disabled' => false,
])
<div class="form-control-wrap form-group">
    <label for="select-type_of_qualification" class="form-label">Type of Qualification</label>
    <select name="{{ $fieldName }}" class="form-select form-input"
            data-search="on" id="select-type_of_qualification" {{ $required ? 'required': '' }} {{ $disabled ? 'disabled' : '' }}>
        @if($selected !== null)
            <option value="{{ $selected->id }}">
                {{ $selected->name }}
            </option>
        @endif
    </select>
</div>

@push('javascript')
    <script>
        window.professionalQualificationTypeMap = [];
        @if($selected !== null)
            window.professionalQualificationTypeMap[{{ $selected->id }}] = @json($selected);
        @endif

        $('#select-type_of_qualification').select2({
            placeholder: 'Select and begin typing',
            ajax: {
                url: '{{ route('professional.qualification.type') }}',
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
                            window.professionalQualificationTypeMap[qualification.id] = qualification
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
