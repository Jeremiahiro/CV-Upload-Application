@props([
    'selected' => null,
    'required' => false,
    'fieldName' => 'qualification',
    'disabled' => false,
])
<div class="form-control-wrap form-group">
    <label for="select-qualification" class="form-label">Type of Qualification</label>
    <select name="{{ $fieldName }}" class="form-select form-input"
            data-search="on" id="select-qualification" {{ $required ? 'required': '' }} {{ $disabled ? 'disabled' : '' }}>
        @if($selected !== null)
            <option value="{{ $selected->id }}">
                {{ $selected->name }}
            </option>
        @endif
    </select>
</div>

@push('javascript')
    <script>
        window.tertirayQualificationMap = [];
        @if($selected !== null)
            window.tertirayQualificationMap[{{ $selected->id }}] = @json($selected);
        @endif

        $('#select-qualification').select2({
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
                        results: result.map(function (qualification) {
                            window.tertirayQualificationMap[qualification.id] = qualification
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
