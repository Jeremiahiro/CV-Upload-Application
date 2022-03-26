@props([
    'selected' => null,
    'required' => false,
    'fieldName' => 'awarding_institution',
    'disabled' => false,
])
<div class="form-control-wrap form-group">
    <label for="select-awarding_institution" class="form-label">Awarding Institution</label>
    <select name="{{ $fieldName }}" class="form-select form-input"
            data-search="on" id="select-awarding_institution" {{ $required ? 'required': '' }} {{ $disabled ? 'disabled' : '' }}>
        @if($selected !== null)
            <option value="{{ $selected->id }}">
                {{ $selected->name }}
            </option>
        @endif
    </select>
</div>

@push('javascript')
    <script>
        window.professionalInstitutionsMap = [];
        @if($selected !== null)
            window.professionalInstitutionsMap[{{ $selected->id }}] = @json($selected);
        @endif

        $('#select-awarding_institution').select2({
            placeholder: 'Select and begin typing',
            ajax: {
                url: '{{ route('professional.institutions') }}',
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
                            window.professionalInstitutionsMap[institution.id] = institution
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
